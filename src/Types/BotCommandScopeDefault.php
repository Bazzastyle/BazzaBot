<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the default scope of bot commands. Default commands are used if no commands with a
 * narrower scope are specified for the user.
 *
 * @see https://core.telegram.org/bots/api#botcommandscopedefault
 *
 * @param string $type Scope type, must be default
 */
final class BotCommandScopeDefault implements BotCommandScope, \JsonSerializable
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
