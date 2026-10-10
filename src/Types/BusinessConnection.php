<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the connection of the bot with a business account.
 *
 * @see https://core.telegram.org/bots/api#businessconnection
 *
 * @param string $id Unique identifier of the business connection
 * @param User|array $user Business account user that created the business connection
 * @param int $user_chat_id Identifier of a private chat with the user who created the business connection. This number may have
 *     more than 32 significant bits and some programming languages may have difficulty/silent defects in
 *     interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision
 *     float type are safe for storing this identifier.
 * @param int $date Date the connection was established in Unix time
 * @param bool $is_enabled True, if the connection is active
 * @param BusinessBotRights|array|null $rights Optional. Rights of the business bot (optional)
 */
final class BusinessConnection implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $user,
        public readonly int $user_chat_id,
        public readonly int $date,
        public readonly bool $is_enabled,
        public readonly BusinessBotRights|array|null $rights = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['user'] = $this->user;
        $data['user_chat_id'] = $this->user_chat_id;
        $data['date'] = $this->date;
        $data['is_enabled'] = $this->is_enabled;
        if ($this->rights !== null) $data['rights'] = $this->rights;


        return $data;
    }
}
