<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents the bot's short description.
 *
 * @see https://core.telegram.org/bots/api#botshortdescription
 *
 * @param string $short_description The bot's short description
 */
final class BotShortDescription implements \JsonSerializable
{
    public function __construct(
        public readonly string $short_description,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['short_description'] = $this->short_description;

        return $data;
    }
}
