<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Update;

use Bazzastyle\BazzaBot\Exception\InvalidUpdateException;
use Bazzastyle\BazzaBot\Update\{Update, UpdateType};
use PHPUnit\Framework\TestCase;

final class UpdateTest extends TestCase
{
    public function testParsesMessageCommand(): void
    {
        $update = Update::fromJson($this->fixture('update-message.json'));

        self::assertSame(UpdateType::Message, $update->type);
        self::assertSame(111, $update->getChatId());
        self::assertSame(111, $update->getFromId());
        self::assertSame('mario_rossi', $update->getFromUsername());
        self::assertSame(42, $update->getMessageId());
        self::assertTrue($update->isCommand());
        self::assertSame('start', $update->getCommand());
        self::assertSame('hello world', $update->getCommandArgs());
        self::assertFalse($update->isGroupChat());
        self::assertNull($update->getCallbackData());
    }

    public function testParsesCallbackQuery(): void
    {
        $update = Update::fromJson($this->fixture('update-callback.json'));

        self::assertSame(UpdateType::CallbackQuery, $update->type);
        self::assertSame('callback123', $update->getCallbackQueryId());
        self::assertSame('menu:main', $update->getCallbackData());
        self::assertSame(222, $update->getChatId());
        self::assertSame(222, $update->getFromId());
        self::assertFalse($update->isCommand());
    }

    public function testGuestMessageIsDetectedAndUsableAsAnOrdinaryMessage(): void
    {
        $update = Update::fromJson((string) json_encode([
            'update_id' => 100003,
            'guest_message' => [
                'message_id' => 7,
                'date' => 0,
                'chat' => ['id' => 333, 'type' => 'private'],
                'from' => ['id' => 333, 'is_bot' => false, 'first_name' => 'G'],
                'text' => '/start hello',
            ],
        ]));

        self::assertSame(UpdateType::GuestMessage, $update->type);
        self::assertSame(333, $update->getChatId());
        self::assertSame(333, $update->getFromId());
        self::assertSame(7, $update->getMessageId());
        self::assertTrue($update->isCommand());
        self::assertSame('start', $update->getCommand());
        self::assertSame('hello', $update->getCommandArgs());
    }

    public function testRejectsPayloadMissingUpdateId(): void
    {
        $this->expectException(InvalidUpdateException::class);
        Update::fromJson('{"message": {}}');
    }

    public function testRejectsMalformedJson(): void
    {
        $this->expectException(InvalidUpdateException::class);
        Update::fromJson('not json at all');
    }

    private function fixture(string $name): string
    {
        return (string) file_get_contents(__DIR__ . '/../../Fixtures/' . $name);
    }
}
