<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A text with a bank card number.
 *
 * @see https://core.telegram.org/bots/api#richtextbankcardnumber
 *
 * @param string $type Type of the rich text, always “bank_card_number”
 * @param RichText|array $text The text
 * @param string $bank_card_number The bank card number
 */
final class RichTextBankCardNumber implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $bank_card_number,
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
        $data['bank_card_number'] = $this->bank_card_number;

        return $data;
    }
}
