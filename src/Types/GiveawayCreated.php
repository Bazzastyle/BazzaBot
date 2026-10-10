<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about the creation of a scheduled giveaway.
 *
 * @see https://core.telegram.org/bots/api#giveawaycreated
 *
 * @param ?int $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star
 *     giveaways only (optional)
 */
final class GiveawayCreated implements \JsonSerializable
{
    public function __construct(
        public readonly ?int $prize_star_count = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->prize_star_count !== null) $data['prize_star_count'] = $this->prize_star_count;


        return $data;
    }
}
