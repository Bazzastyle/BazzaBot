<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a chat background.
 *
 * @see https://core.telegram.org/bots/api#chatbackground
 *
 * @param BackgroundType|array $type Type of the background
 */
final class ChatBackground implements \JsonSerializable
{
    public function __construct(
        public readonly BackgroundType|array $type,
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
