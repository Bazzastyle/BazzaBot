<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Types;

use Bazzastyle\BazzaBot\Types\{
    CallbackGame,
    ChatPermissions,
    InlineKeyboardButton,
    InlineKeyboardMarkup,
    InputMedia,
    InputMediaPhoto,
};
use PHPUnit\Framework\TestCase;

final class GeneratedTypesTest extends TestCase
{
    public function testSimpleTypeSerializesRequiredFieldOnly(): void
    {
        $button = new InlineKeyboardButton(text: 'Menu', callback_data: 'menu:main');
        $markup = new InlineKeyboardMarkup(inline_keyboard: [[$button]]);

        // jsonSerialize() returns the raw property values (button objects included,
        // not yet recursively serialized) — that recursion is json_encode()'s job,
        // covered separately in testJsonEncodeUsesJsonSerializeRecursively().
        self::assertSame(['inline_keyboard' => [[$button]]], $markup->jsonSerialize());
    }

    public function testOptionalFieldsAreOmittedWhenNull(): void
    {
        $button = new InlineKeyboardButton(text: 'Menu', callback_data: 'menu:main');

        self::assertSame(['text' => 'Menu', 'callback_data' => 'menu:main'], $button->jsonSerialize());
    }

    public function testOptionalFieldsAreIncludedWhenSet(): void
    {
        $button = new InlineKeyboardButton(text: 'Sito', url: 'https://example.com', pay: true);

        self::assertSame(
            ['text' => 'Sito', 'url' => 'https://example.com', 'pay' => true],
            $button->jsonSerialize(),
        );
    }

    public function testJsonEncodeUsesJsonSerializeRecursively(): void
    {
        $markup = new InlineKeyboardMarkup(inline_keyboard: [[
            new InlineKeyboardButton(text: 'Menu', callback_data: 'menu:main'),
        ]]);

        $expected = '{"inline_keyboard":[[{"text":"Menu","callback_data":"menu:main"}]]}';
        self::assertSame($expected, json_encode($markup));
    }

    public function testBooleanOnlyTypeOmitsAllFieldsWhenUnset(): void
    {
        self::assertSame([], (new ChatPermissions())->jsonSerialize());
    }

    public function testConcreteMediaTypeImplementsTheAbstractInputMediaInterface(): void
    {
        $photo = new InputMediaPhoto(type: 'photo', media: 'file_id_123');

        self::assertInstanceOf(InputMedia::class, $photo);
        self::assertInstanceOf(\JsonSerializable::class, $photo);
    }

    public function testTypeWithNoFieldsSerializesToEmptyArray(): void
    {
        self::assertSame([], (new CallbackGame())->jsonSerialize());
    }
}
