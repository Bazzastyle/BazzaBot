<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit;

use Bazzastyle\BazzaBot\Bot;
use Bazzastyle\BazzaBot\Exception\ConfigException;
use Bazzastyle\BazzaBot\Http\TelegramClient;
use PHPUnit\Framework\TestCase;

final class BotTest extends TestCase
{
    public function testMissingTokenWithoutOverrideThrows(): void
    {
        $envPath = $this->writeEnv(['TELEGRAM_BOT_TOKEN' => '']);

        $this->expectException(ConfigException::class);
        Bot::fromEnvFile($envPath);
    }

    public function testTokenOverrideIsUsedWhenEnvTokenIsEmpty(): void
    {
        // Several bots sharing one .env (shared secret/DB/rate limits) with
        // TELEGRAM_BOT_TOKEN left blank: the per-request token (e.g. from
        // "?api=" on the webhook URL) must be accepted without requiring
        // TELEGRAM_BOT_TOKEN to be set.
        $envPath = $this->writeEnv(['TELEGRAM_BOT_TOKEN' => '']);

        $bot = Bot::fromEnvFile($envPath, 'override-token-123');

        self::assertSame('override-token-123', $this->extractToken($bot->client));
    }

    public function testTokenOverrideTakesPrecedenceOverEnvToken(): void
    {
        $envPath = $this->writeEnv(['TELEGRAM_BOT_TOKEN' => 'env-token-456']);

        $bot = Bot::fromEnvFile($envPath, 'override-token-123');

        self::assertSame('override-token-123', $this->extractToken($bot->client));
    }

    public function testFallsBackToEnvTokenWhenOverrideIsNullOrEmpty(): void
    {
        $envPath = $this->writeEnv(['TELEGRAM_BOT_TOKEN' => 'env-token-456']);

        self::assertSame('env-token-456', $this->extractToken(Bot::fromEnvFile($envPath)->client));
        self::assertSame('env-token-456', $this->extractToken(Bot::fromEnvFile($envPath, null)->client));
        self::assertSame('env-token-456', $this->extractToken(Bot::fromEnvFile($envPath, '')->client));
    }

    public function testAdminsAreParsedFromEnv(): void
    {
        $envPath = $this->writeEnv(['ADMINS' => '111111111,222222222']);

        $bot = Bot::fromEnvFile($envPath);

        self::assertTrue($bot->admins->isAdmin(111111111));
        self::assertTrue($bot->admins->isAdmin(222222222));
        self::assertFalse($bot->admins->isAdmin(333333333));
    }

    public function testAdminsIsEmptyWhenNotConfigured(): void
    {
        $envPath = $this->writeEnv([]);

        $bot = Bot::fromEnvFile($envPath);

        self::assertTrue($bot->admins->isEmpty());
    }

    /** @param array<string, string> $overrides */
    private function writeEnv(array $overrides): string
    {
        $defaults = [
            'TELEGRAM_BOT_TOKEN' => 'default-token',
            'APP_LOG_PATH' => sys_get_temp_dir() . '/tgfw_bot_test_' . uniqid('', true) . '.log',
        ];

        $values = array_merge($defaults, $overrides);

        $lines = [];
        foreach ($values as $key => $value) {
            $lines[] = "{$key}={$value}";
        }

        $path = tempnam(sys_get_temp_dir(), 'tgfw_bot_test_env_');
        file_put_contents($path, implode("\n", $lines) . "\n");

        return $path;
    }

    private function extractToken(TelegramClient $client): string
    {
        $property = new \ReflectionProperty(TelegramClient::class, 'token');

        return $property->getValue($client);
    }
}
