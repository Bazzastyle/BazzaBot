<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The message was originally sent by a known user.
 *
 * @see https://core.telegram.org/bots/api#messageoriginuser
 *
 * @param string $type Type of the message origin, always “user”
 * @param int $date Date the message was sent originally in Unix time
 * @param User|array $sender_user User that sent the message originally
 */
final class MessageOriginUser implements MessageOrigin, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly int $date,
        public readonly User|array $sender_user,
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
        $data['sender_user'] = $this->sender_user;

        return $data;
    }
}
