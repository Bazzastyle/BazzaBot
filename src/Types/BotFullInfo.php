<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains full information about the bot itself.
 *
 * @see https://core.telegram.org/bots/api#botfullinfo
 *
 * @param int $id Unique identifier for this bot. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a 64-bit integer or double-precision float type are safe for storing this
 *     identifier.
 * @param bool $is_bot Always True
 * @param string $first_name Bot's first name
 * @param bool $can_join_groups True, if the bot can be added to groups
 * @param bool $can_read_all_group_messages True, if privacy mode is disabled for the bot
 * @param bool $supports_guest_queries True, if the bot supports guest queries from chats it is not a member of
 * @param bool $supports_inline_queries True, if the bot supports inline queries
 * @param bool $needs_inline_query_location True, if the bot requests the location of the user with every inline query
 * @param bool $can_connect_to_business True, if the bot can be connected to a user account to manage it
 * @param bool $has_main_web_app True, if the bot has a main Web App
 * @param bool $has_topics_enabled True, if the bot has forum topic mode enabled in private chats
 * @param bool $allows_users_to_create_topics True, if the bot allows users to create and delete topics in private chats
 * @param bool $has_topic_sidebar True, if topics in private chats with the bot are shown in a sidebar
 * @param bool $can_manage_bots True, if other bots can be created to be controlled by the bot
 * @param bool $supports_join_request_queries True, if the bot supports join request queries and can be assigned to process them
 * @param ?string $username Optional. Bot's username (optional)
 * @param ?array $active_usernames Optional. If non-empty, the list of all active usernames of the bot (optional)
 * @param ?string $inline_query_placeholder Optional. Placeholder for inline queries, which is shown in the input field after the bot's
 *     username; omitted if the default placeholder is used (optional)
 */
final class BotFullInfo implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly bool $is_bot,
        public readonly string $first_name,
        public readonly bool $can_join_groups,
        public readonly bool $can_read_all_group_messages,
        public readonly bool $supports_guest_queries,
        public readonly bool $supports_inline_queries,
        public readonly bool $needs_inline_query_location,
        public readonly bool $can_connect_to_business,
        public readonly bool $has_main_web_app,
        public readonly bool $has_topics_enabled,
        public readonly bool $allows_users_to_create_topics,
        public readonly bool $has_topic_sidebar,
        public readonly bool $can_manage_bots,
        public readonly bool $supports_join_request_queries,
        public readonly ?string $username = null,
        public readonly ?array $active_usernames = null,
        public readonly ?string $inline_query_placeholder = null,
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
        $data['can_join_groups'] = $this->can_join_groups;
        $data['can_read_all_group_messages'] = $this->can_read_all_group_messages;
        $data['supports_guest_queries'] = $this->supports_guest_queries;
        $data['supports_inline_queries'] = $this->supports_inline_queries;
        $data['needs_inline_query_location'] = $this->needs_inline_query_location;
        $data['can_connect_to_business'] = $this->can_connect_to_business;
        $data['has_main_web_app'] = $this->has_main_web_app;
        $data['has_topics_enabled'] = $this->has_topics_enabled;
        $data['allows_users_to_create_topics'] = $this->allows_users_to_create_topics;
        $data['has_topic_sidebar'] = $this->has_topic_sidebar;
        $data['can_manage_bots'] = $this->can_manage_bots;
        $data['supports_join_request_queries'] = $this->supports_join_request_queries;
        if ($this->username !== null) $data['username'] = $this->username;

        if ($this->active_usernames !== null) $data['active_usernames'] = $this->active_usernames;

        if ($this->inline_query_placeholder !== null) $data['inline_query_placeholder'] = $this->inline_query_placeholder;


        return $data;
    }
}
