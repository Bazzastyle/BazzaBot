<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the model of a unique gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftmodel
 *
 * @param string $name Name of the model
 * @param Sticker|array $sticker The sticker that represents the unique gift
 * @param int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gift upgrades. Always 0 for
 *     crafted gifts.
 * @param ?string $rarity Optional. Rarity of the model if it is a crafted model. Currently, can be “uncommon”,
 *     “rare”, “epic”, or “legendary”. (optional)
 */
final class UniqueGiftModel implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly Sticker|array $sticker,
        public readonly int $rarity_per_mille,
        public readonly ?string $rarity = null,
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
        if ($this->rarity !== null) $data['rarity'] = $this->rarity;


        return $data;
    }
}
