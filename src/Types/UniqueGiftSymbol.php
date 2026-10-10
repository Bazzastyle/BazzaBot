<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the symbol shown on the pattern of a unique gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftsymbol
 *
 * @param string $name Name of the symbol
 * @param Sticker|array $sticker The sticker that represents the unique gift
 * @param int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
 */
final class UniqueGiftSymbol implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly Sticker|array $sticker,
        public readonly int $rarity_per_mille,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['name'] = $this->name;
        $data['sticker'] = $this->sticker;
        $data['rarity_per_mille'] = $this->rarity_per_mille;

        return $data;
    }
}
