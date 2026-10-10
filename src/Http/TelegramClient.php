<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Http;

use Bazzastyle\BazzaBot\Exception\RateLimitExceededException;
use Bazzastyle\BazzaBot\RateLimit\RateLimiterInterface;
use Psr\Log\{LoggerInterface, NullLogger};

/**
 * Telegram Bot API client. GeneratedMethods provides one fully-typed method
 * per official Bot API method (see tools/generate-methods.php to refresh it
 * against a new API release); call()/__call() remain available as a
 * fallback for methods Telegram adds before the trait is regenerated. Object
 * parameters (reply_markup, entities, ...) accept either a Bazzastyle\
 * Telegram\Types\* value object (see tools/generate-types.php) or a plain
 * array — normalizeParams() JSON-encodes both the same way. Every outgoing
 * request goes through the injected RateLimiterInterface, and errors/
 * retries are logged via PSR-3. Concurrency for bulk operations is
 * delegated to CurlMultiPool.
 *
 * Never logs the full request URL: it contains the bot token.
 */
final class TelegramClient
{
    use GeneratedMethods;

    public function __construct(
        private readonly string $token,
        private readonly RateLimiterInterface $rateLimiter,
        private readonly ?LoggerInterface $logger = null,
        private readonly string $apiEndpoint = 'https://api.telegram.org/bot',
        private readonly int $timeoutSeconds = 30,
        private readonly int $connectTimeoutSeconds = 10,
        private readonly int $maxRetries = 2,
        private readonly CurlMultiPool $pool = new CurlMultiPool(),
    ) {
    }

    private function logger(): LoggerInterface
    {
        return $this->logger ?? new NullLogger();
    }

    // -- Generic API coverage -------------------------------------------------

    /**
     * Calls any Telegram Bot API method by name. GeneratedMethods' typed
     * methods delegate here; use this directly for methods Telegram has
     * added since the trait was last regenerated.
     *
     * @param array<string, mixed> $params
     */
    public function call(string $method, array $params = []): TelegramResponse
    {
        $chatId = $this->extractChatId($params);
        $isGroup = $this->isGroupChat($chatId);

        $attempt = 0;
        while (true) {
            $attempt++;
            $this->rateLimiter->acquire($chatId, $isGroup);

            [$body, , $curlError] = $this->executeRequest($method, $params);

            if ($curlError !== null) {
                $this->logger()->error('Telegram HTTP request failed', [
                    'method' => $method,
                    'error' => $curlError,
                    'attempt' => $attempt,
                ]);

                if ($attempt > $this->maxRetries) {
                    return new TelegramResponse(false, null, null, $curlError);
                }

                usleep(200_000 * $attempt);
                continue;
            }

            $response = TelegramResponse::fromJson($body);
            $this->rateLimiter->onResponse($chatId, $response);

            if ($response->isRateLimited()) {
                if ($attempt > $this->maxRetries) {
                    throw new RateLimitExceededException($chatId ?? 'n/a', $attempt, $response->getRetryAfter() ?? 0);
                }

                $this->logger()->warning('Telegram rate limit hit, retrying', [
                    'method' => $method,
                    'retry_after' => $response->getRetryAfter(),
                    'attempt' => $attempt,
                ]);

                if ($chatId === null) {
                    // No chat-scoped bucket will pace the retry for us; wait explicitly.
                    usleep((int) (($response->getRetryAfter() ?? 1) * 1_000_000));
                }

                continue;
            }

            if (!$response->ok) {
                $this->logger()->warning('Telegram API returned an error', [
                    'method' => $method,
                    'error_code' => $response->errorCode,
                    'description' => $response->description,
                ]);
            }

            return $response;
        }
    }

    /**
     * Magic sugar for `call()`. PHP does NOT forward named-argument names
     * through __call (only positional values), so this only supports being
     * invoked with a single associative array argument, e.g.:
     *   $client->promoteChatMember(['chat_id' => $id, 'user_id' => $uid]);
     * For any other calling convention, use call() explicitly.
     *
     * @param array<int, mixed> $arguments
     */
    public function __call(string $name, array $arguments): TelegramResponse
    {
        if (count($arguments) === 0) {
            return $this->call($name, []);
        }

        if (count($arguments) === 1 && is_array($arguments[0])) {
            return $this->call($name, $arguments[0]);
        }

        throw new \BadMethodCallException(sprintf(
            'Cannot resolve arguments for magic call to "%s()": PHP does not forward named-argument '
            . 'names through __call(). Use $client->call(\'%s\', [...]) with an explicit associative array instead.',
            $name,
            $name,
        ));
    }

    /**
     * Fires many requests concurrently via CurlMultiPool. Each entry's
     * chat_id (if present) is still paced through the rate limiter before
     * being enqueued, so the sliding admission respects Telegram's limits.
     *
     * @param array<string, array{method: string, params?: array<string, mixed>}> $requests
     * @return array<string, TelegramResponse>
     */
    public function callMany(array $requests): array
    {
        $factories = (function () use ($requests) {
            foreach ($requests as $id => $request) {
                $method = $request['method'];
                $params = $request['params'] ?? [];
                $chatId = $this->extractChatId($params);
                $isGroup = $this->isGroupChat($chatId);
                $this->rateLimiter->acquire($chatId, $isGroup);

                yield (string) $id => fn (): \CurlHandle => $this->createHandle($method, $params);
            }
        })();

        $raw = $this->pool->execute($factories);

        $responses = [];
        foreach ($requests as $id => $request) {
            $id = (string) $id;
            $entry = $raw[$id] ?? null;

            if ($entry === null || $entry['error'] !== null || $entry['response'] === null) {
                $responses[$id] = new TelegramResponse(false, null, null, $entry['error'] ?? 'No response received');
                continue;
            }

            $response = TelegramResponse::fromJson($entry['response']);
            $chatId = $this->extractChatId($request['params'] ?? []);
            $this->rateLimiter->onResponse($chatId, $response);

            if (!$response->ok) {
                $this->logger()->warning('Telegram API returned an error (bulk)', [
                    'method' => $request['method'],
                    'error_code' => $response->errorCode,
                    'description' => $response->description,
                ]);
            }

            $responses[$id] = $response;
        }

        return $responses;
    }

    /**
     * Sends the same method/params to many chats concurrently. Yields
     * chat_id => TelegramResponse as results become available.
     *
     * @param array<int, int|string> $chatIds
     * @param array<string, mixed> $paramsTemplate
     * @return iterable<string, TelegramResponse>
     */
    public function broadcast(string $method, array $chatIds, array $paramsTemplate = []): iterable
    {
        $requests = [];
        foreach ($chatIds as $chatId) {
            $requests[(string) $chatId] = [
                'method' => $method,
                'params' => array_merge(['chat_id' => $chatId], $paramsTemplate),
            ];
        }

        foreach ($this->callMany($requests) as $chatId => $response) {
            yield $chatId => $response;
        }
    }

    // -- Internals -------------------------------------------------------------

    /** @param array<string, mixed> $params */
    private function executeRequest(string $method, array $params): array
    {
        $handle = $this->createHandle($method, $params);
        $body = curl_exec($handle);
        $error = curl_error($handle) ?: null;
        $httpCode = (int) curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);

        return [$body !== false ? $body : '', $httpCode, $error];
    }

    /** @param array<string, mixed> $params */
    private function createHandle(string $method, array $params): \CurlHandle
    {
        $handle = curl_init();
        curl_setopt_array($handle, [
            CURLOPT_URL => $this->buildUrl($method),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $this->normalizeParams($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => $this->connectTimeoutSeconds,
            CURLOPT_TIMEOUT => $this->timeoutSeconds,
        ]);

        return $handle;
    }

    private function buildUrl(string $method): string
    {
        return rtrim($this->apiEndpoint, '/') . $this->token . '/' . $method;
    }

    /**
     * Always builds a multipart/form-data field array: Telegram accepts this
     * for every method (with or without file uploads), so a single code path
     * covers both, with no risk of forgetting Content-Type handling.
     *
     * @param array<string, mixed> $params
     * @return array<string, mixed>
     */
    private function normalizeParams(array $params): array
    {
        $out = [];
        foreach ($params as $key => $value) {
            if ($value === null) {
                continue;
            }

            if ($value instanceof InputFile) {
                $out[$key] = $value->toCurlFile();
            } elseif (is_array($value) || $value instanceof \JsonSerializable) {
                // Types\* objects implement JsonSerializable: json_encode() calls
                // jsonSerialize() automatically, recursively for nested Types objects.
                $out[$key] = json_encode($value, JSON_THROW_ON_ERROR);
            } elseif (is_bool($value)) {
                $out[$key] = $value ? '1' : '0';
            } else {
                $out[$key] = (string) $value;
            }
        }

        return $out;
    }

    /** @param array<string, mixed> $params */
    private function extractChatId(array $params): int|string|null
    {
        return $params['chat_id'] ?? null;
    }

    private function isGroupChat(int|string|null $chatId): bool
    {
        if ($chatId === null || (is_string($chatId) && !is_numeric($chatId))) {
            return false;
        }

        return (int) $chatId < 0;
    }
}
