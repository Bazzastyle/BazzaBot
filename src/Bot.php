<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot;

use Bazzastyle\BazzaBot\Auth\AdminList;
use Bazzastyle\BazzaBot\Config\Config;
use Bazzastyle\BazzaBot\Database\Connection;
use Bazzastyle\BazzaBot\Http\TelegramClient;
use Bazzastyle\BazzaBot\Log\{FileLogger, MultiLogger, TelegramLogHandler};
use Bazzastyle\BazzaBot\Polling\PollingRunner;
use Bazzastyle\BazzaBot\RateLimit\TelegramRateLimiter;
use Bazzastyle\BazzaBot\Routing\Router;
use Bazzastyle\BazzaBot\Webhook\{WebhookHandler, WebhookValidator};
use Psr\Log\{LoggerInterface, LogLevel};

/**
 * Convenience facade: Bot::fromEnvFile() assembles Config/Logger/RateLimiter/
 * TelegramClient/Router/Connection/AdminList with sensible defaults. Every
 * assembled piece remains independently usable/instantiable — this class is
 * sugar, not a required entry point, and there is no DI container behind it.
 *
 * Supports several bots sharing one codebase and one .env via the optional
 * $tokenOverride parameter of fromEnvFile() (see its docblock).
 */
final class Bot
{
    private function __construct(
        public readonly Config $config,
        public readonly LoggerInterface $logger,
        public readonly TelegramClient $client,
        public readonly Router $router,
        public readonly ?Connection $database,
        public readonly AdminList $admins,
        private readonly WebhookValidator $webhookValidator,
    ) {
    }

    /**
     * @param string|null $tokenOverride Use this token instead of TELEGRAM_BOT_TOKEN from
     *        $envPath. Lets several bots share one codebase + one .env (same secret, database,
     *        rate limits, ...) while each has its own token, resolved per request — e.g. from a
     *        webhook URL configured as ".../webhook.php?api=<that bot's token>" (see
     *        examples/bootstrap.php). When null/empty, TELEGRAM_BOT_TOKEN is required from the
     *        .env file as before (single-bot deployments).
     */
    public static function fromEnvFile(string $envPath, ?string $tokenOverride = null): self
    {
        $config = Config::fromEnvFile($envPath);

        $logPath = $config->getString('APP_LOG_PATH', 'var/bot.log');
        $debug = $config->getBool('APP_DEBUG', false);
        $fileLogger = new FileLogger($logPath, 'bot', $debug ? LogLevel::DEBUG : LogLevel::INFO);

        $rateLimiter = new TelegramRateLimiter(
            (float) $config->getInt('RATE_LIMIT_GLOBAL_PER_SECOND', 30),
            (float) $config->getInt('RATE_LIMIT_CHAT_PER_SECOND', 1),
            (float) $config->getInt('RATE_LIMIT_GROUP_PER_MINUTE', 20),
        );

        $token = $tokenOverride !== null && $tokenOverride !== ''
            ? $tokenOverride
            : (string) $config->require('TELEGRAM_BOT_TOKEN');
        $apiEndpoint = $config->getString('TELEGRAM_API_ENDPOINT', 'https://api.telegram.org/bot');

        $loggers = [$fileLogger];

        $logChatId = $config->getString('TELEGRAM_LOG_CHAT_ID');
        if ($logChatId !== null && $logChatId !== '') {
            // The Telegram notifier is wired to a client that only logs to
            // file, never to the MultiLogger built below: if it referenced
            // itself, a sustained Telegram outage could recurse (a failed
            // notification gets logged, which triggers another failed
            // notification, and so on).
            $notifierClient = new TelegramClient($token, $rateLimiter, $fileLogger, $apiEndpoint);
            $chatId = is_numeric($logChatId) ? (int) $logChatId : $logChatId;
            $loggers[] = new TelegramLogHandler(
                $notifierClient,
                $chatId,
                $config->getString('TELEGRAM_LOG_LEVEL', LogLevel::CRITICAL),
            );
        }

        $logger = new MultiLogger($loggers);
        $client = new TelegramClient($token, $rateLimiter, $logger, $apiEndpoint);

        $database = null;
        $driver = $config->getString('DB_DRIVER');
        if ($driver !== null && $driver !== '') {
            $database = Connection::fromConfig($config);
        }

        $webhookSecret = $config->getString('TELEGRAM_WEBHOOK_SECRET');
        if ($webhookSecret === null || $webhookSecret === '') {
            $logger->warning('TELEGRAM_WEBHOOK_SECRET is not set: webhook requests will not be authenticated.');
        }

        $validator = new WebhookValidator($webhookSecret, $config->getBool('TELEGRAM_ALLOWED_IP_CHECK', false));

        $commandPrefixes = array_values(array_filter(array_map(
            'trim',
            explode(',', $config->getString('COMMAND_PREFIXES', '/') ?? '/'),
        )));

        $admins = AdminList::fromConfig($config);

        return new self($config, $logger, $client, new Router($commandPrefixes), $database, $admins, $validator);
    }

    public function handleWebhook(?string $rawBody = null, ?string $secretHeader = null, ?string $sourceIp = null): void
    {
        (new WebhookHandler($this->client, $this->router, $this->webhookValidator, $this->logger))
            ->handle($rawBody, $secretHeader, $sourceIp);
    }

    public function runPolling(?string $offsetStoragePath = null): void
    {
        $path = $offsetStoragePath ?? dirname($this->config->getString('APP_LOG_PATH', 'var/bot.log')) . '/polling.offset';
        (new PollingRunner($this->client, $this->router, $this->logger, $path))->run();
    }
}
