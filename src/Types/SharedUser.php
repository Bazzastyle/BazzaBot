<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about a user that was shared with the bot using a
 * KeyboardButtonRequestUsers button.
 *
 * @see https://core.telegram.org/bots/api#shareduser
 *
 * @param int $user_id Identifier of the shared user. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so 64-bit integers or double-precision float types are safe for storing these
 *     identifiers. The bot may not have access to the user and could be unable to use this identifier,
 *     unless the user is already known to the bot by some other means.
 * @param ?string $first_name Optional. First name of the user, if the name was requested by the bot (optional)
 * @param ?string $last_name Optional. Last name of the user, if the name was requested by the bot (optional)
 * @param ?string $username Optional. Username of the user, if the username was requested by the bot (optional)
 * @param ?array $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot (optional)
 */
final class SharedUser implements \JsonSerializable
{
    public function __construct(
        public readonly int $user_id,
        public readonly ?string $first_name = null,
        public readonly ?string $last_name = null,
        public readonly ?string $username = null,
        public readonly ?array $photo = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['user_id'] = $this->user_id;
        if ($this->first_name !== null) $data['first_name'] = $this->first_name;

        if ($this->last_name !== null) $data['last_name'] = $this->last_name;

        if ($this->username !== null) $data['username'] = $this->username;

        if ($this->photo !== null) $data['photo'] = $this->photo;


        return $data;
    }
}
