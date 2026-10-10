<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a unique message identifier.
 *
 * @see https://core.telegram.org/bots/api#messageid
 *
 * @param int $message_id Unique message identifier. In specific instances (e.g., message containing a video sent to a big
 *     chat), the server might automatically schedule a message instead of sending it immediately. In such
 *     cases, this field will be 0 and the relevant message will be unusable until it is actually sent.
 */
final class MessageId implements \JsonSerializable
{
    public function __construct(
        public readonly int $message_id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['message_id'] = $this->message_id;

        return $data;
    }
}
