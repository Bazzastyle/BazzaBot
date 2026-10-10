<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a bot command.
 *
 * @see https://core.telegram.org/bots/api#botcommand
 *
 * @param string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and
 *     underscores.
 * @param string $description Description of the command; 1-256 characters
 * @param ?bool $is_ephemeral Optional. True, if the command sends an ephemeral message, which can be seen only by the sender of
 *     the message and the bot (optional)
 */
final class BotCommand implements \JsonSerializable
{
    public function __construct(
        public readonly string $command,
        public readonly string $description,
        public readonly ?bool $is_ephemeral = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['command'] = $this->command;
        $data['description'] = $this->description;
        if ($this->is_ephemeral !== null) $data['is_ephemeral'] = $this->is_ephemeral;


        return $data;
    }
}
