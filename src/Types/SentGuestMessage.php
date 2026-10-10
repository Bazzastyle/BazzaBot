<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes an inline message sent by a guest bot.
 *
 * @see https://core.telegram.org/bots/api#sentguestmessage
 *
 * @param string $inline_message_id Identifier of the sent inline message
 */
final class SentGuestMessage implements \JsonSerializable
{
    public function __construct(
        public readonly string $inline_message_id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['inline_message_id'] = $this->inline_message_id;

        return $data;
    }
}
