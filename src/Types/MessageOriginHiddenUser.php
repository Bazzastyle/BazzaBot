<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The message was originally sent by an unknown user.
 *
 * @see https://core.telegram.org/bots/api#messageoriginhiddenuser
 *
 * @param string $type Type of the message origin, always “hidden_user”
 * @param int $date Date the message was sent originally in Unix time
 * @param string $sender_user_name Name of the user that sent the message originally
 */
final class MessageOriginHiddenUser implements MessageOrigin, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly string $sender_user_name,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['date'] = $this->date;
        $data['sender_user_name'] = $this->sender_user_name;

        return $data;
    }
}
