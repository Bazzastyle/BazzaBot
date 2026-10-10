<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a story area pointing to a suggested reaction. Currently, a story can have up to 5
 * suggested reaction areas.
 *
 * @see https://core.telegram.org/bots/api#storyareatypesuggestedreaction
 *
 * @param string $type Type of the area, always “suggested_reaction”
 * @param ReactionType|array $reaction_type Type of the reaction
 * @param ?bool $is_dark Optional. Pass True if the reaction area has a dark background (optional)
 * @param ?bool $is_flipped Optional. Pass True if reaction area corner is flipped (optional)
 */
final class StoryAreaTypeSuggestedReaction implements StoryAreaType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly ReactionType|array $reaction_type,
        public readonly ?bool $is_dark = null,
        public readonly ?bool $is_flipped = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['reaction_type'] = $this->reaction_type;
        if ($this->is_dark !== null) $data['is_dark'] = $this->is_dark;

        if ($this->is_flipped !== null) $data['is_flipped'] = $this->is_flipped;


        return $data;
    }
}
