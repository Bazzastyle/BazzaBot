<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @see https://core.telegram.org/bots/api#reactioncount
 *
 * @param ReactionType|array $type Type of the reaction
 * @param int $total_count Number of times the reaction was added
 */
final class ReactionCount implements \JsonSerializable
{
    public function __construct(
        public readonly ReactionType|array $type,
        public readonly int $total_count,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['total_count'] = $this->total_count;

        return $data;
    }
}
