<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains full information about a chat.
 *
 * @see https://core.telegram.org/bots/api#chatfullinfo
 *
 * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
 *     this identifier.
 * @param string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
 * @param int $accent_color_id Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header,
 *     and link preview. See accent colors for more details.
 * @param int $max_reaction_count The maximum number of reactions that can be set on a message in the chat
 * @param AcceptedGiftTypes|array $accepted_gift_types Information about types of gifts that are accepted by the chat or by the corresponding user for
 *     private chats
 * @param ?string $title Optional. Title, for supergroups, channels and group chats (optional)
 * @param ?string $username Optional. Username, for private chats, supergroups and channels if available (optional)
 * @param ?string $first_name Optional. First name of the other party in a private chat (optional)
 * @param ?string $last_name Optional. Last name of the other party in a private chat (optional)
 * @param ?bool $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled) (optional)
 * @param ?bool $is_direct_messages Optional. True, if the chat is the direct messages chat of a channel (optional)
 * @param ChatPhoto|array|null $photo Optional. Chat photo (optional)
 * @param ?array $active_usernames Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and
 *     channels (optional)
 * @param Birthdate|array|null $birthdate Optional. For private chats, the date of birth of the user (optional)
 * @param BusinessIntro|array|null $business_intro Optional. For private chats with business accounts, the intro of the business (optional)
 * @param BusinessLocation|array|null $business_location Optional. For private chats with business accounts, the location of the business (optional)
 * @param BusinessOpeningHours|array|null $business_opening_hours Optional. For private chats with business accounts, the opening hours of the business (optional)
 * @param Chat|array|null $personal_chat Optional. For private chats, the personal channel of the user (optional)
 * @param Chat|array|null $parent_chat Optional. Information about the corresponding channel chat; for direct messages chats only (optional)
 * @param ?array $available_reactions Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are
 *     allowed. (optional)
 * @param ?string $background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for the reply header and link
 *     preview background (optional)
 * @param ?int $profile_accent_color_id Optional. Identifier of the accent color for the chat's profile background. See profile accent
 *     colors for more details. (optional)
 * @param ?string $profile_background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background (optional)
 * @param ?string $emoji_status_custom_emoji_id Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private
 *     chat (optional)
 * @param ?int $emoji_status_expiration_date Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in
 *     Unix time, if any (optional)
 * @param ?string $bio Optional. Bio of the other party in a private chat (optional)
 * @param ?bool $has_private_forwards Optional. True, if privacy settings of the other party in the private chat allows to use
 *     tg://user?id=<user_id> links only in chats with the user (optional)
 * @param ?bool $has_restricted_voice_and_video_messages Optional. True, if the privacy settings of the other party restrict sending voice and video note
 *     messages in the private chat (optional)
 * @param ?bool $join_to_send_messages Optional. True, if users need to join the supergroup before they can send messages (optional)
 * @param ?bool $join_by_request Optional. True, if all users directly joining the supergroup without using an invite link need to be
 *     approved by supergroup administrators (optional)
 * @param ?string $description Optional. Description, for groups, supergroups and channel chats (optional)
 * @param ?string $invite_link Optional. Primary invite link, for groups, supergroups and channel chats (optional)
 * @param Message|array|null $pinned_message Optional. The most recent pinned message (by sending date) (optional)
 * @param ChatPermissions|array|null $permissions Optional. Default chat member permissions, for groups and supergroups (optional)
 * @param ?bool $can_send_paid_media Optional. True, if paid media messages can be sent or forwarded to the channel chat. The field is
 *     available only for channel chats. (optional)
 * @param ?int $slow_mode_delay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each
 *     unprivileged user; in seconds (optional)
 * @param ?int $unrestrict_boost_count Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add
 *     in order to ignore slow mode and chat permissions (optional)
 * @param ?int $message_auto_delete_time Optional. The time after which all messages sent to the chat will be automatically deleted; in
 *     seconds (optional)
 * @param ?bool $has_aggressive_anti_spam_enabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only
 *     available to chat administrators. (optional)
 * @param ?bool $has_hidden_members Optional. True, if non-administrators can only get the list of bots and administrators in the chat (optional)
 * @param ?bool $has_protected_content Optional. True, if messages from the chat can't be forwarded to other chats (optional)
 * @param ?bool $has_visible_history Optional. True, if new chat members will have access to old messages; available only to chat
 *     administrators (optional)
 * @param ?string $sticker_set_name Optional. For supergroups, name of the group sticker set (optional)
 * @param ?bool $can_set_sticker_set Optional. True, if the bot can change the group sticker set (optional)
 * @param ?string $custom_emoji_sticker_set_name Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this
 *     set can be used by all users and bots in the group. (optional)
 * @param ?int $linked_chat_id Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel
 *     and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and
 *     some programming languages may have difficulty/silent defects in interpreting it. But it is smaller
 *     than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this
 *     identifier. (optional)
 * @param ChatLocation|array|null $location Optional. For supergroups, the location to which the supergroup is connected (optional)
 * @param UserRating|array|null $rating Optional. For private chats, the rating of the user if any (optional)
 * @param Audio|array|null $first_profile_audio Optional. For private chats, the first audio added to the profile of the user (optional)
 * @param UniqueGiftColors|array|null $unique_gift_colors Optional. The color scheme based on a unique gift that must be used for the chat's name, message
 *     replies and link previews (optional)
 * @param ?int $paid_message_star_count Optional. The number of Telegram Stars a general user has to pay to send a message to the chat (optional)
 * @param User|array|null $guard_bot Optional. The bot that processes join request queries in the chat. The field is only available to
 *     chat administrators. (optional)
 * @param Community|array|null $community Optional. The Community to which the chat belongs (optional)
 */
final class ChatFullInfo implements \JsonSerializable
{
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly int $accent_color_id,
        public readonly int $max_reaction_count,
        public readonly AcceptedGiftTypes|array $accepted_gift_types,
        public readonly ?string $title = null,
        public readonly ?string $username = null,
        public readonly ?string $first_name = null,
        public readonly ?string $last_name = null,
        public readonly ?bool $is_forum = null,
        public readonly ?bool $is_direct_messages = null,
        public readonly ChatPhoto|array|null $photo = null,
        public readonly ?array $active_usernames = null,
        public readonly Birthdate|array|null $birthdate = null,
        public readonly BusinessIntro|array|null $business_intro = null,
        public readonly BusinessLocation|array|null $business_location = null,
        public readonly BusinessOpeningHours|array|null $business_opening_hours = null,
        public readonly Chat|array|null $personal_chat = null,
        public readonly Chat|array|null $parent_chat = null,
        public readonly ?array $available_reactions = null,
        public readonly ?string $background_custom_emoji_id = null,
        public readonly ?int $profile_accent_color_id = null,
        public readonly ?string $profile_background_custom_emoji_id = null,
        public readonly ?string $emoji_status_custom_emoji_id = null,
        public readonly ?int $emoji_status_expiration_date = null,
        public readonly ?string $bio = null,
        public readonly ?bool $has_private_forwards = null,
        public readonly ?bool $has_restricted_voice_and_video_messages = null,
        public readonly ?bool $join_to_send_messages = null,
        public readonly ?bool $join_by_request = null,
        public readonly ?string $description = null,
        public readonly ?string $invite_link = null,
        public readonly Message|array|null $pinned_message = null,
        public readonly ChatPermissions|array|null $permissions = null,
        public readonly ?bool $can_send_paid_media = null,
        public readonly ?int $slow_mode_delay = null,
        public readonly ?int $unrestrict_boost_count = null,
        public readonly ?int $message_auto_delete_time = null,
        public readonly ?bool $has_aggressive_anti_spam_enabled = null,
        public readonly ?bool $has_hidden_members = null,
        public readonly ?bool $has_protected_content = null,
        public readonly ?bool $has_visible_history = null,
        public readonly ?string $sticker_set_name = null,
        public readonly ?bool $can_set_sticker_set = null,
        public readonly ?string $custom_emoji_sticker_set_name = null,
        public readonly ?int $linked_chat_id = null,
        public readonly ChatLocation|array|null $location = null,
        public readonly UserRating|array|null $rating = null,
        public readonly Audio|array|null $first_profile_audio = null,
        public readonly UniqueGiftColors|array|null $unique_gift_colors = null,
        public readonly ?int $paid_message_star_count = null,
        public readonly User|array|null $guard_bot = null,
        public readonly Community|array|null $community = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['type'] = $this->type;
        $data['accent_color_id'] = $this->accent_color_id;
        $data['max_reaction_count'] = $this->max_reaction_count;
        $data['accepted_gift_types'] = $this->accepted_gift_types;
        if ($this->title !== null) $data['title'] = $this->title;

        if ($this->username !== null) $data['username'] = $this->username;

        if ($this->first_name !== null) $data['first_name'] = $this->first_name;

        if ($this->last_name !== null) $data['last_name'] = $this->last_name;

        if ($this->is_forum !== null) $data['is_forum'] = $this->is_forum;

        if ($this->is_direct_messages !== null) $data['is_direct_messages'] = $this->is_direct_messages;

        if ($this->photo !== null) $data['photo'] = $this->photo;

        if ($this->active_usernames !== null) $data['active_usernames'] = $this->active_usernames;

        if ($this->birthdate !== null) $data['birthdate'] = $this->birthdate;

        if ($this->business_intro !== null) $data['business_intro'] = $this->business_intro;

        if ($this->business_location !== null) $data['business_location'] = $this->business_location;

        if ($this->business_opening_hours !== null) $data['business_opening_hours'] = $this->business_opening_hours;

        if ($this->personal_chat !== null) $data['personal_chat'] = $this->personal_chat;

        if ($this->parent_chat !== null) $data['parent_chat'] = $this->parent_chat;

        if ($this->available_reactions !== null) $data['available_reactions'] = $this->available_reactions;

        if ($this->background_custom_emoji_id !== null) $data['background_custom_emoji_id'] = $this->background_custom_emoji_id;

        if ($this->profile_accent_color_id !== null) $data['profile_accent_color_id'] = $this->profile_accent_color_id;

        if ($this->profile_background_custom_emoji_id !== null) $data['profile_background_custom_emoji_id'] = $this->profile_background_custom_emoji_id;

        if ($this->emoji_status_custom_emoji_id !== null) $data['emoji_status_custom_emoji_id'] = $this->emoji_status_custom_emoji_id;

        if ($this->emoji_status_expiration_date !== null) $data['emoji_status_expiration_date'] = $this->emoji_status_expiration_date;

        if ($this->bio !== null) $data['bio'] = $this->bio;

        if ($this->has_private_forwards !== null) $data['has_private_forwards'] = $this->has_private_forwards;

        if ($this->has_restricted_voice_and_video_messages !== null) $data['has_restricted_voice_and_video_messages'] = $this->has_restricted_voice_and_video_messages;

        if ($this->join_to_send_messages !== null) $data['join_to_send_messages'] = $this->join_to_send_messages;

        if ($this->join_by_request !== null) $data['join_by_request'] = $this->join_by_request;

        if ($this->description !== null) $data['description'] = $this->description;

        if ($this->invite_link !== null) $data['invite_link'] = $this->invite_link;

        if ($this->pinned_message !== null) $data['pinned_message'] = $this->pinned_message;

        if ($this->permissions !== null) $data['permissions'] = $this->permissions;

        if ($this->can_send_paid_media !== null) $data['can_send_paid_media'] = $this->can_send_paid_media;

        if ($this->slow_mode_delay !== null) $data['slow_mode_delay'] = $this->slow_mode_delay;

        if ($this->unrestrict_boost_count !== null) $data['unrestrict_boost_count'] = $this->unrestrict_boost_count;

        if ($this->message_auto_delete_time !== null) $data['message_auto_delete_time'] = $this->message_auto_delete_time;

        if ($this->has_aggressive_anti_spam_enabled !== null) $data['has_aggressive_anti_spam_enabled'] = $this->has_aggressive_anti_spam_enabled;

        if ($this->has_hidden_members !== null) $data['has_hidden_members'] = $this->has_hidden_members;

        if ($this->has_protected_content !== null) $data['has_protected_content'] = $this->has_protected_content;

        if ($this->has_visible_history !== null) $data['has_visible_history'] = $this->has_visible_history;

        if ($this->sticker_set_name !== null) $data['sticker_set_name'] = $this->sticker_set_name;

        if ($this->can_set_sticker_set !== null) $data['can_set_sticker_set'] = $this->can_set_sticker_set;

        if ($this->custom_emoji_sticker_set_name !== null) $data['custom_emoji_sticker_set_name'] = $this->custom_emoji_sticker_set_name;

        if ($this->linked_chat_id !== null) $data['linked_chat_id'] = $this->linked_chat_id;

        if ($this->location !== null) $data['location'] = $this->location;

        if ($this->rating !== null) $data['rating'] = $this->rating;

        if ($this->first_profile_audio !== null) $data['first_profile_audio'] = $this->first_profile_audio;

        if ($this->unique_gift_colors !== null) $data['unique_gift_colors'] = $this->unique_gift_colors;

        if ($this->paid_message_star_count !== null) $data['paid_message_star_count'] = $this->paid_message_star_count;

        if ($this->guard_bot !== null) $data['guard_bot'] = $this->guard_bot;

        if ($this->community !== null) $data['community'] = $this->community;


        return $data;
    }
}
