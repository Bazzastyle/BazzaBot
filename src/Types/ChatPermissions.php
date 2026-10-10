<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes actions that a non-administrator user is allowed to take in a chat.
 *
 * @see https://core.telegram.org/bots/api#chatpermissions
 *
 * @param ?bool $can_send_messages Optional. True, if the user is allowed to send text messages, rich messages, contacts, giveaways,
 *     giveaway winners, invoices, locations and venues (optional)
 * @param ?bool $can_send_audios Optional. True, if the user is allowed to send audios (optional)
 * @param ?bool $can_send_documents Optional. True, if the user is allowed to send documents (optional)
 * @param ?bool $can_send_photos Optional. True, if the user is allowed to send photos (optional)
 * @param ?bool $can_send_videos Optional. True, if the user is allowed to send videos (optional)
 * @param ?bool $can_send_video_notes Optional. True, if the user is allowed to send video notes (optional)
 * @param ?bool $can_send_voice_notes Optional. True, if the user is allowed to send voice notes (optional)
 * @param ?bool $can_send_polls Optional. True, if the user is allowed to send polls and checklists (optional)
 * @param ?bool $can_send_other_messages Optional. True, if the user is allowed to send animations, games, stickers and use inline bots (optional)
 * @param ?bool $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages (optional)
 * @param ?bool $can_react_to_messages Optional. True, if the user is allowed to react to messages. If omitted, defaults to the value of
 *     can_send_messages. (optional)
 * @param ?bool $can_edit_tag Optional. True, if the user is allowed to edit their own tag. If omitted, defaults to the value of
 *     can_pin_messages. (optional)
 * @param ?bool $can_change_info Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored
 *     in public supergroups. (optional)
 * @param ?bool $can_invite_users Optional. True, if the user is allowed to invite new users to the chat (optional)
 * @param ?bool $can_pin_messages Optional. True, if the user is allowed to pin messages. Ignored in public supergroups. (optional)
 * @param ?bool $can_manage_topics Optional. True, if the user is allowed to create forum topics. If omitted, defaults to the value of
 *     can_pin_messages. (optional)
 */
final class ChatPermissions implements \JsonSerializable
{
    public function __construct(
        public readonly ?bool $can_send_messages = null,
        public readonly ?bool $can_send_audios = null,
        public readonly ?bool $can_send_documents = null,
        public readonly ?bool $can_send_photos = null,
        public readonly ?bool $can_send_videos = null,
        public readonly ?bool $can_send_video_notes = null,
        public readonly ?bool $can_send_voice_notes = null,
        public readonly ?bool $can_send_polls = null,
        public readonly ?bool $can_send_other_messages = null,
        public readonly ?bool $can_add_web_page_previews = null,
        public readonly ?bool $can_react_to_messages = null,
        public readonly ?bool $can_edit_tag = null,
        public readonly ?bool $can_change_info = null,
        public readonly ?bool $can_invite_users = null,
        public readonly ?bool $can_pin_messages = null,
        public readonly ?bool $can_manage_topics = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->can_send_messages !== null) $data['can_send_messages'] = $this->can_send_messages;

        if ($this->can_send_audios !== null) $data['can_send_audios'] = $this->can_send_audios;

        if ($this->can_send_documents !== null) $data['can_send_documents'] = $this->can_send_documents;

        if ($this->can_send_photos !== null) $data['can_send_photos'] = $this->can_send_photos;

        if ($this->can_send_videos !== null) $data['can_send_videos'] = $this->can_send_videos;

        if ($this->can_send_video_notes !== null) $data['can_send_video_notes'] = $this->can_send_video_notes;

        if ($this->can_send_voice_notes !== null) $data['can_send_voice_notes'] = $this->can_send_voice_notes;

        if ($this->can_send_polls !== null) $data['can_send_polls'] = $this->can_send_polls;

        if ($this->can_send_other_messages !== null) $data['can_send_other_messages'] = $this->can_send_other_messages;

        if ($this->can_add_web_page_previews !== null) $data['can_add_web_page_previews'] = $this->can_add_web_page_previews;

        if ($this->can_react_to_messages !== null) $data['can_react_to_messages'] = $this->can_react_to_messages;

        if ($this->can_edit_tag !== null) $data['can_edit_tag'] = $this->can_edit_tag;

        if ($this->can_change_info !== null) $data['can_change_info'] = $this->can_change_info;

        if ($this->can_invite_users !== null) $data['can_invite_users'] = $this->can_invite_users;

        if ($this->can_pin_messages !== null) $data['can_pin_messages'] = $this->can_pin_messages;

        if ($this->can_manage_topics !== null) $data['can_manage_topics'] = $this->can_manage_topics;


        return $data;
    }
}
