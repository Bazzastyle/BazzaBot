<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an attribute of an NFT in the TON blockchain.
 *
 * @see https://core.telegram.org/bots/api#tonnftattribute
 *
 * @param string $trait_type Trait type of the attribute
 * @param string $value Value of the attribute
 */
final class TonNftAttribute implements \JsonSerializable
{
    public function __construct(
        public readonly string $trait_type,
        public readonly string $value,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['trait_type'] = $this->trait_type;
        $data['value'] = $this->value;

        return $data;
    }
}
