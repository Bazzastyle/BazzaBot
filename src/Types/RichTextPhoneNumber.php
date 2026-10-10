<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A text with a phone number.
 *
 * @see https://core.telegram.org/bots/api#richtextphonenumber
 *
 * @param string $type Type of the rich text, always “phone_number”
 * @param RichText|array $text The text
 * @param string $phone_number The phone number
 */
final class RichTextPhoneNumber implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $phone_number,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['text'] = $this->text;
        $data['phone_number'] = $this->phone_number;

        return $data;
    }
}
