<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The reaction is paid.
 *
 * @see https://core.telegram.org/bots/api#reactiontypepaid
 *
 * @param string $type Type of the reaction, always “paid”
 */
final class ReactionTypePaid implements ReactionType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;

        return $data;
    }
}
