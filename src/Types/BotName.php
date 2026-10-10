<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents the bot's name.
 *
 * @see https://core.telegram.org/bots/api#botname
 *
 * @param string $name The bot's name
 */
final class BotName implements \JsonSerializable
{
    public function __construct(
        public readonly string $name,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['name'] = $this->name;

        return $data;
    }
}
