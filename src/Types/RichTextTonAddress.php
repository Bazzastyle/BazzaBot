<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * An address in the TON blockchain.
 *
 * @see https://core.telegram.org/bots/api#richtexttonaddress
 *
 * @param string $type Type of the rich text, always “ton_address”
 * @param RichText|array $text Text of the address
 * @param string $address The address
 */
final class RichTextTonAddress implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly string $address,
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
        $data['address'] = $this->address;

        return $data;
    }
}
