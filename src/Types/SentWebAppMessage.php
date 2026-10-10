<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes an inline message sent by a Web App on behalf of a user.
 *
 * @see https://core.telegram.org/bots/api#sentwebappmessage
 *
 * @param ?string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard
 *     attached to the message. (optional)
 */
final class SentWebAppMessage implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $inline_message_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->inline_message_id !== null) $data['inline_message_id'] = $this->inline_message_id;


        return $data;
    }
}
