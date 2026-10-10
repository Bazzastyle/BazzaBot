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
 * @param ?bool $can_join_groups Optional. True, if the bot can be invited to groups. Returned only in getMe. (optional)
 * @param ?bool $can_read_all_group_messages Optional. True, if privacy mode is disabled for the bot. Returned only in getMe. (optional)
 * @param ?bool $supports_guest_queries Optional. True, if the bot supports guest queries from chats it is not a member of. Returned only in
 *     getMe. (optional)
 * @param ?bool $supports_inline_queries Optional. True, if the bot supports inline queries. Returned only in getMe. (optional)
 * @param ?bool $can_connect_to_business Optional. True, if the bot can be connected to a user account to manage it. Returned only in getMe. (optional)
 * @param ?bool $has_main_web_app Optional. True, if the bot has a main Web App. Returned only in getMe. (optional)
 * @param ?bool $has_topics_enabled Optional. True, if the bot has forum topic mode enabled in private chats. Returned only in getMe. (optional)
 * @param ?bool $allows_users_to_create_topics Optional. True, if the bot allows users to create and delete topics in private chats. Returned only
 *     in getMe. (optional)
 * @param ?bool $can_manage_bots Optional. True, if other bots can be created to be controlled by the bot. Returned only in getMe. (optional)
 * @param ?bool $supports_join_request_queries Optional. True, if the bot supports join request queries and can be assigned to process them.
 *     Returned only in getMe. (optional)
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
        public readonly ?bool $can_join_groups = null,
        public readonly ?bool $can_read_all_group_messages = null,
        public readonly ?bool $supports_guest_queries = null,
        public readonly ?bool $supports_inline_queries = null,
        public readonly ?bool $can_connect_to_business = null,
        public readonly ?bool $has_main_web_app = null,
        public readonly ?bool $has_topics_enabled = null,
        public readonly ?bool $allows_users_to_create_topics = null,
        public readonly ?bool $can_manage_bots = null,
        public readonly ?bool $supports_join_request_queries = null,
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

        if ($this->can_join_groups !== null) $data['can_join_groups'] = $this->can_join_groups;

        if ($this->can_read_all_group_messages !== null) $data['can_read_all_group_messages'] = $this->can_read_all_group_messages;

        if ($this->supports_guest_queries !== null) $data['supports_guest_queries'] = $this->supports_guest_queries;

        if ($this->supports_inline_queries !== null) $data['supports_inline_queries'] = $this->supports_inline_queries;

        if ($this->can_connect_to_business !== null) $data['can_connect_to_business'] = $this->can_connect_to_business;

        if ($this->has_main_web_app !== null) $data['has_main_web_app'] = $this->has_main_web_app;

        if ($this->has_topics_enabled !== null) $data['has_topics_enabled'] = $this->has_topics_enabled;

        if ($this->allows_users_to_create_topics !== null) $data['allows_users_to_create_topics'] = $this->allows_users_to_create_topics;

        if ($this->can_manage_bots !== null) $data['can_manage_bots'] = $this->can_manage_bots;

        if ($this->supports_join_request_queries !== null) $data['supports_join_request_queries'] = $this->supports_join_request_queries;


        return $data;
    }
}
