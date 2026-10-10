<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 *
 * @param string $type Type of the button, must be commands
 */
final class MenuButtonCommands implements MenuButton, \JsonSerializable
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
