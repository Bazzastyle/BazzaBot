<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represent a list of gifts.
 *
 * @see https://core.telegram.org/bots/api#gifts
 *
 * @param array $gifts The list of gifts
 */
final class Gifts implements \JsonSerializable
{
    public function __construct(
        public readonly array $gifts,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['gifts'] = $this->gifts;

        return $data;
    }
}
