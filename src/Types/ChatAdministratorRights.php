<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the rights of an administrator in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatadministratorrights
 *
 * @param bool $is_anonymous True, if the user's presence in the chat is hidden
 * @param bool $can_manage_chat True, if the administrator can access the chat event log, get boost list, see hidden supergroup and
 *     channel members, report spam messages, ignore slow mode, and send messages to the chat without
 *     paying Telegram Stars. Implied by any other administrator privilege.
 * @param bool $can_delete_messages True, if the administrator can delete messages of other users
 * @param bool $can_manage_video_chats True, if the administrator can manage video chats
 * @param bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
 * @param bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges or
 *     demote administrators that they have promoted, directly or indirectly (promoted by administrators
 *     that were appointed by the user)
 * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @param bool $can_post_stories True, if the administrator can post stories to the chat
 * @param bool $can_edit_stories True, if the administrator can edit stories posted by other users, post stories to the chat page,
 *     pin chat stories, and access the chat's story archive
 * @param bool $can_delete_stories True, if the administrator can delete stories posted by other users
 * @param bool $can_send_welcome_messages True, if the administrator can manage chat welcome messages or directly send them in the case of
 *     bots
 * @param ?bool $can_post_messages Optional. True, if the administrator can post messages in the channel, approve suggested posts, or
 *     access channel statistics; for channels only (optional)
 * @param ?bool $can_edit_messages Optional. True, if the administrator can edit messages of other users and can pin messages; for
 *     channels only (optional)
 * @param ?bool $can_pin_messages Optional. True, if the user is allowed to pin messages; for groups and supergroups only (optional)
 * @param ?bool $can_manage_topics Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for
 *     supergroups only (optional)
 * @param ?bool $can_manage_direct_messages Optional. True, if the administrator can manage direct messages of the channel and decline suggested
 *     posts; for channels only (optional)
 * @param ?bool $can_manage_tags Optional. True, if the administrator can edit the tags of regular members; for groups and
 *     supergroups only (optional)
 */
final class ChatAdministratorRights implements \JsonSerializable
{
    public function __construct(
        public readonly bool $is_anonymous,
        public readonly bool $can_manage_chat,
        public readonly bool $can_delete_messages,
        public readonly bool $can_manage_video_chats,
        public readonly bool $can_restrict_members,
        public readonly bool $can_promote_members,
        public readonly bool $can_change_info,
        public readonly bool $can_invite_users,
        public readonly bool $can_post_stories,
        public readonly bool $can_edit_stories,
        public readonly bool $can_delete_stories,
        public readonly bool $can_send_welcome_messages,
        public readonly ?bool $can_post_messages = null,
        public readonly ?bool $can_edit_messages = null,
        public readonly ?bool $can_pin_messages = null,
        public readonly ?bool $can_manage_topics = null,
        public readonly ?bool $can_manage_direct_messages = null,
        public readonly ?bool $can_manage_tags = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['is_anonymous'] = $this->is_anonymous;
        $data['can_manage_chat'] = $this->can_manage_chat;
        $data['can_delete_messages'] = $this->can_delete_messages;
        $data['can_manage_video_chats'] = $this->can_manage_video_chats;
        $data['can_restrict_members'] = $this->can_restrict_members;
        $data['can_promote_members'] = $this->can_promote_members;
        $data['can_change_info'] = $this->can_change_info;
        $data['can_invite_users'] = $this->can_invite_users;
        $data['can_post_stories'] = $this->can_post_stories;
        $data['can_edit_stories'] = $this->can_edit_stories;
        $data['can_delete_stories'] = $this->can_delete_stories;
        $data['can_send_welcome_messages'] = $this->can_send_welcome_messages;
        if ($this->can_post_messages !== null) $data['can_post_messages'] = $this->can_post_messages;

        if ($this->can_edit_messages !== null) $data['can_edit_messages'] = $this->can_edit_messages;

        if ($this->can_pin_messages !== null) $data['can_pin_messages'] = $this->can_pin_messages;

        if ($this->can_manage_topics !== null) $data['can_manage_topics'] = $this->can_manage_topics;

        if ($this->can_manage_direct_messages !== null) $data['can_manage_direct_messages'] = $this->can_manage_direct_messages;

        if ($this->can_manage_tags !== null) $data['can_manage_tags'] = $this->can_manage_tags;


        return $data;
    }
}
