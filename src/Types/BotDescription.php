<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents the bot's description.
 *
 * @see https://core.telegram.org/bots/api#botdescription
 *
 * @param string $description The bot's description
 */
final class BotDescription implements \JsonSerializable
{
    public function __construct(
        public readonly string $description,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['description'] = $this->description;

        return $data;
    }
}
