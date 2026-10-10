<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the backdrop of a unique gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftbackdrop
 *
 * @param string $name Name of the backdrop
 * @param UniqueGiftBackdropColors|array $colors Colors of the backdrop
 * @param int $rarity_per_mille The number of unique gifts that receive this backdrop for every 1000 gifts upgraded
 */
final class UniqueGiftBackdrop implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
        public readonly UniqueGiftBackdropColors|array $colors,
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
        $data['colors'] = $this->colors;
        $data['rarity_per_mille'] = $this->rarity_per_mille;

        return $data;
    }
}
