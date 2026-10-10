<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Polling;

use Bazzastyle\BazzaBot\Http\TelegramClient;
use Bazzastyle\BazzaBot\Routing\{Context, Router};
use Bazzastyle\BazzaBot\Update\Update;
use Psr\Log\LoggerInterface;

/**
 * Long-polling runner: loops on getUpdates(), dispatching each update
 * through the same Router used by the webhook path. The offset is
 * persisted to a file after every processed update (atomic write via
 * temp-file + rename) so a crash/restart never reprocesses old updates.
 * Handles SIGINT/SIGTERM for a clean shutdown when pcntl is available.
 */
final class PollingRunner
{
    private bool $shouldStop = false;

    /** @param array<int, string>|null $allowedUpdates */
    public function __construct(
        private readonly TelegramClient $client,
        private readonly Router $router,
        private readonly LoggerInterface $logger,
        private readonly string $offsetStoragePath,
        private readonly int $limit = 100,
        private readonly int $timeout = 30,
        private readonly ?array $allowedUpdates = null,
    ) {
    }

    public function run(): void
    {
        $this->registerSignalHandlers();
        $offset = $this->loadOffset();

        while (!$this->shouldStop) {
            if (function_exists('pcntl_signal_dispatch')) {
                pcntl_signal_dispatch();
            }

            $response = $this->client->getUpdates($offset, $this->limit, $this->timeout, $this->allowedUpdates);

            if (!$response->ok) {
                $this->logger->error('getUpdates failed: {description}', ['description' => $response->description]);
                sleep(1);
                continue;
            }

            foreach ((array) $response->result as $rawUpdate) {
                if (!$rawUpdate instanceof \stdClass) {
                    continue;
                }

                $offset = (int) $rawUpdate->update_id + 1;

                try {
                    $update = Update::fromStdClass($rawUpdate);
                    $context = new Context($update, $this->client, $this->logger);
                    $this->router->dispatch($context);
                } catch (\Throwable $e) {
                    $this->logger->error('Handler exception while processing update: {message}', [
                        'message' => $e->getMessage(),
                        'exception' => $e,
                    ]);
                }

                $this->saveOffset($offset);
            }
        }
    }

    public function stop(): void
    {
        $this->shouldStop = true;
    }

    private function registerSignalHandlers(): void
    {
        if (!function_exists('pcntl_signal') || !function_exists('pcntl_async_signals')) {
            return;
        }

        pcntl_async_signals(true);
        pcntl_signal(SIGINT, function (): void {
            $this->stop();
        });
        pcntl_signal(SIGTERM, function (): void {
            $this->stop();
        });
    }

    private function loadOffset(): int
    {
        if (!is_file($this->offsetStoragePath)) {
            return 0;
        }

        $content = trim((string) file_get_contents($this->offsetStoragePath));

        return ctype_digit($content) ? (int) $content : 0;
    }

    private function saveOffset(int $offset): void
    {
        $dir = dirname($this->offsetStoragePath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $tmpPath = $this->offsetStoragePath . '.tmp';
        file_put_contents($tmpPath, (string) $offset, LOCK_EX);
        rename($tmpPath, $this->offsetStoragePath);
    }
}
