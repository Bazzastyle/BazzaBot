<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Config;

use Bazzastyle\BazzaBot\Config\Env;
use PHPUnit\Framework\TestCase;

final class EnvTest extends TestCase
{
    public function testParsesBasicKeyValuePairs(): void
    {
        $path = $this->writeTempEnv("FOO=bar\nBAZ=qux\n");

        $values = Env::load($path);

        self::assertSame('bar', $values['FOO']);
        self::assertSame('qux', $values['BAZ']);
    }

    public function testHandlesQuotingCommentsAndBlankValues(): void
    {
        $content = "# leading comment\n"
            . "NAME=\"Mario Rossi\"\n"
            . "TOKEN='abc123'\n"
            . "EMPTY=\n"
            . "\n"
            . "GREETING=Hello # trailing comment\n";

        $values = Env::load($this->writeTempEnv($content));

        self::assertSame('Mario Rossi', $values['NAME']);
        self::assertSame('abc123', $values['TOKEN']);
        self::assertSame('', $values['EMPTY']);
        self::assertSame('Hello', $values['GREETING']);
        self::assertArrayNotHasKey('# leading comment', $values);
    }

    public function testMissingFileThrows(): void
    {
        $this->expectException(\Bazzastyle\BazzaBot\Exception\ConfigException::class);
        Env::load('/nonexistent/path/.env');
    }

    private function writeTempEnv(string $content): string
    {
        $path = tempnam(sys_get_temp_dir(), 'tgfw_env_test_');
        file_put_contents($path, $content);

        return $path;
    }
}
