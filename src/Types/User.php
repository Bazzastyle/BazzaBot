<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a Telegram user or bot.
 *
 * @see https://core.telegram.org/bots/api#user
 *
 * @param int $id Unique identifier for this user or bot. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a 64-bit integer or double-precision float type are safe for storing this
 *     identifier.
 * @param bool $is_bot True, if this user is a bot
 * @param string $first_name User's or bot's first name
 * @param ?string $last_name Optional. User's or bot's last name (optional)
 * @param ?string $username Optional. User's or bot's username (optional)
 * @param ?string $language_code Optional. IETF language tag of the user's language (optional)
 * @param ?bool $is_premium Optional. True, if this user is a Telegram Premium user (optional)
 * @param ?bool $added_to_attachment_menu Optional. True, if this user added the bot to the attachment menu (optional)
 */
final class User implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly bool $is_bot,
        public readonly string $first_name,
        public readonly ?string $last_name = null,
        public readonly ?string $username = null,
        public readonly ?string $language_code = null,
        public readonly ?bool $is_premium = null,
        public readonly ?bool $added_to_attachment_menu = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['is_bot'] = $this->is_bot;
        $data['first_name'] = $this->first_name;
        if ($this->last_name !== null) $data['last_name'] = $this->last_name;

        if ($this->username !== null) $data['username'] = $this->username;

        if ($this->language_code !== null) $data['language_code'] = $this->language_code;

        if ($this->is_premium !== null) $data['is_premium'] = $this->is_premium;

        if ($this->added_to_attachment_menu !== null) $data['added_to_attachment_menu'] = $this->added_to_attachment_menu;


        return $data;
    }
}
