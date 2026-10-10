<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
 *
 * @see https://core.telegram.org/bots/api#chatmemberrestricted
 *
 * @param string $status The member's status in the chat, always “restricted”
 * @param User|array $user Information about the user
 * @param bool $is_member True, if the user is a member of the chat at the moment of the request
 * @param bool $can_send_messages True, if the user is allowed to send text messages, rich messages, contacts, giveaways, giveaway
 *     winners, invoices, locations and venues
 * @param bool $can_send_audios True, if the user is allowed to send audios
 * @param bool $can_send_documents True, if the user is allowed to send documents
 * @param bool $can_send_photos True, if the user is allowed to send photos
 * @param bool $can_send_videos True, if the user is allowed to send videos
 * @param bool $can_send_video_notes True, if the user is allowed to send video notes
 * @param bool $can_send_voice_notes True, if the user is allowed to send voice notes
 * @param bool $can_send_polls True, if the user is allowed to send polls and checklists
 * @param bool $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
 * @param bool $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
 * @param bool $can_react_to_messages True, if the user is allowed to react to messages
 * @param bool $can_edit_tag True, if the user is allowed to edit their own tag
 * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
 * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
 * @param bool $can_pin_messages True, if the user is allowed to pin messages
 * @param bool $can_manage_topics True, if the user is allowed to create forum topics
 * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted
 *     forever.
 * @param ?string $tag Optional. Tag of the member (optional)
 */
final class ChatMemberRestricted implements ChatMember, \JsonSerializable
{
    public function __construct(
        public readonly string $status,
        public readonly User|array $user,
        public readonly bool $is_member,
        public readonly bool $can_send_messages,
        public readonly bool $can_send_audios,
        public readonly bool $can_send_documents,
        public readonly bool $can_send_photos,
        public readonly bool $can_send_videos,
        public readonly bool $can_send_video_notes,
        public readonly bool $can_send_voice_notes,
        public readonly bool $can_send_polls,
        public readonly bool $can_send_other_messages,
        public readonly bool $can_add_web_page_previews,
        public readonly bool $can_react_to_messages,
        public readonly bool $can_edit_tag,
        public readonly bool $can_change_info,
        public readonly bool $can_invite_users,
        public readonly bool $can_pin_messages,
        public readonly bool $can_manage_topics,
        public readonly int $until_date,
        public readonly ?string $tag = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['status'] = $this->status;
        $data['user'] = $this->user;
        $data['is_member'] = $this->is_member;
        $data['can_send_messages'] = $this->can_send_messages;
        $data['can_send_audios'] = $this->can_send_audios;
        $data['can_send_documents'] = $this->can_send_documents;
        $data['can_send_photos'] = $this->can_send_photos;
        $data['can_send_videos'] = $this->can_send_videos;
        $data['can_send_video_notes'] = $this->can_send_video_notes;
        $data['can_send_voice_notes'] = $this->can_send_voice_notes;
        $data['can_send_polls'] = $this->can_send_polls;
        $data['can_send_other_messages'] = $this->can_send_other_messages;
        $data['can_add_web_page_previews'] = $this->can_add_web_page_previews;
        $data['can_react_to_messages'] = $this->can_react_to_messages;
        $data['can_edit_tag'] = $this->can_edit_tag;
        $data['can_change_info'] = $this->can_change_info;
        $data['can_invite_users'] = $this->can_invite_users;
        $data['can_pin_messages'] = $this->can_pin_messages;
        $data['can_manage_topics'] = $this->can_manage_topics;
        $data['until_date'] = $this->until_date;
        if ($this->tag !== null) $data['tag'] = $this->tag;


        return $data;
    }
}
