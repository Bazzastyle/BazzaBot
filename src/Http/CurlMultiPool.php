<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Http;

/**
 * Native concurrency engine for bulk HTTP calls (e.g. broadcasting a message
 * to thousands of chats) built on curl_multi — no event loop dependency.
 *
 * Handles are created lazily from factories (not all at once) and kept in a
 * sliding window of at most $maxConcurrent in-flight requests, so memory use
 * stays bounded regardless of how many requests are queued.
 */
final class CurlMultiPool
{
    public function __construct(
        private readonly int $maxConcurrent = 20,
        private readonly int $timeoutMs = 30000,
    ) {
    }

    /**
     * @param iterable<string, callable(): \CurlHandle> $handleFactories keyed by a caller-chosen
     *        logical id (e.g. chat_id) used to correlate results back to requests
     * @return array<string, array{response: string|null, error: string|null, httpCode: int}>
     */
    public function execute(iterable $handleFactories): array
    {
        $queue = [];
        foreach ($handleFactories as $id => $factory) {
            $queue[$id] = $factory;
        }

        $results = [];
        $active = []; // resource-id-of-handle => [id, handle]

        $multiHandle = curl_multi_init();

        try {
            $this->fillWindow($multiHandle, $queue, $active);

            $running = null;
            do {
                $status = curl_multi_exec($multiHandle, $running);

                if ($running > 0) {
                    curl_multi_select($multiHandle, $this->timeoutMs / 1000);
                }

                while (($info = curl_multi_info_read($multiHandle)) !== false) {
                    $handle = $info['handle'];
                    $key = spl_object_id($handle);
                    if (!isset($active[$key])) {
                        continue;
                    }

                    [$id, ] = $active[$key];
                    $response = curl_multi_getcontent($handle);
                    $error = curl_error($handle) ?: null;
                    $httpCode = (int) curl_getinfo($handle, CURLINFO_HTTP_CODE);

                    $results[$id] = [
                        'response' => $response !== '' ? $response : null,
                        'error' => $error,
                        'httpCode' => $httpCode,
                    ];

                    curl_multi_remove_handle($multiHandle, $handle);
                    curl_close($handle);
                    unset($active[$key]);

                    $this->fillWindow($multiHandle, $queue, $active);
                }
            } while ($running > 0 || count($active) > 0);
        } finally {
            curl_multi_close($multiHandle);
        }

        return $results;
    }

    /**
     * @param array<string, callable(): \CurlHandle> $queue
     * @param array<int, array{0: string, 1: \CurlHandle}> $active
     */
    private function fillWindow(\CurlMultiHandle $multiHandle, array &$queue, array &$active): void
    {
        while (count($active) < $this->maxConcurrent && count($queue) > 0) {
            $id = array_key_first($queue);
            $factory = $queue[$id];
            unset($queue[$id]);

            $handle = $factory();
            curl_multi_add_handle($multiHandle, $handle);
            $active[spl_object_id($handle)] = [$id, $handle];
        }
    }
}
