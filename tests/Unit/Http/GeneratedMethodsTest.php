<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Http;

use Bazzastyle\BazzaBot\Http\{InputFile, TelegramClient};
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionUnionType;

final class GeneratedMethodsTest extends TestCase
{
    public function testClientExposesAllGeneratedTelegramMethods(): void
    {
        $reflection = new ReflectionClass(TelegramClient::class);

        self::assertTrue($reflection->hasMethod('sendMessage'));
        self::assertTrue($reflection->hasMethod('sendPhoto'));
        self::assertTrue($reflection->hasMethod('getMe'));
        self::assertTrue($reflection->hasMethod('promoteChatMember'));
        self::assertGreaterThan(150, count($reflection->getMethods()));
    }

    public function testSendMessageHasExpectedRequiredAndOptionalParameters(): void
    {
        $method = new \ReflectionMethod(TelegramClient::class, 'sendMessage');
        $params = $method->getParameters();

        self::assertSame('chat_id', $params[0]->getName());
        self::assertFalse($params[0]->isOptional());
        self::assertSame('text', $params[1]->getName());
        self::assertFalse($params[1]->isOptional());

        $parseModeParam = current(array_filter($params, static fn ($p) => $p->getName() === 'parse_mode'));
        self::assertNotFalse($parseModeParam);
        self::assertTrue($parseModeParam->isOptional());
        self::assertTrue($parseModeParam->allowsNull());
    }

    public function testSendPhotoAcceptsInputFileOrStringForThePhotoParameter(): void
    {
        $method = new \ReflectionMethod(TelegramClient::class, 'sendPhoto');
        $photoParam = $method->getParameters()[1];

        self::assertSame('photo', $photoParam->getName());

        $type = $photoParam->getType();
        self::assertInstanceOf(ReflectionUnionType::class, $type);

        $typeNames = array_map(
            static fn (ReflectionNamedType $t): string => $t->getName(),
            $type->getTypes(),
        );

        self::assertContains(InputFile::class, $typeNames);
        self::assertContains('string', $typeNames);
    }

    public function testGetMeHasNoParameters(): void
    {
        $method = new \ReflectionMethod(TelegramClient::class, 'getMe');

        self::assertCount(0, $method->getParameters());
    }
}
