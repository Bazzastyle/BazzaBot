<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A text with an email address.
 *
 * @see https://core.telegram.org/bots/api#richtextemailaddress
 *
 * @param string $type Type of the rich text, always “email_address”
 * @param RichText|array $text The text
 * @param string $email_address The email address
 */
final class RichTextEmailAddress implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $email_address,
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
        $data['email_address'] = $this->email_address;

        return $data;
    }
}
