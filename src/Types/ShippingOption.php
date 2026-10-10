<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents one shipping option.
 *
 * @see https://core.telegram.org/bots/api#shippingoption
 *
 * @param string $id Shipping option identifier
 * @param string $title Option title
 * @param array $prices List of price portions
 */
final class ShippingOption implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly array $prices,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['title'] = $this->title;
        $data['prices'] = $this->prices;

        return $data;
    }
}
