<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the rights of a business bot.
 *
 * @see https://core.telegram.org/bots/api#businessbotrights
 *
 * @param ?bool $can_reply Optional. True, if the bot can send and edit messages in the private chats that had incoming
 *     messages in the last 24 hours (optional)
 * @param ?bool $can_read_messages Optional. True, if the bot can mark incoming private messages as read (optional)
 * @param ?bool $can_delete_sent_messages Optional. True, if the bot can delete messages sent by the bot (optional)
 * @param ?bool $can_delete_all_messages Optional. True, if the bot can delete all private messages in managed chats (optional)
 * @param ?bool $can_edit_name Optional. True, if the bot can edit the first and last name of the business account (optional)
 * @param ?bool $can_edit_bio Optional. True, if the bot can edit the bio of the business account (optional)
 * @param ?bool $can_edit_profile_photo Optional. True, if the bot can edit the profile photo of the business account (optional)
 * @param ?bool $can_edit_username Optional. True, if the bot can edit the username of the business account (optional)
 * @param ?bool $can_change_gift_settings Optional. True, if the bot can change the privacy settings pertaining to gifts for the business
 *     account (optional)
 * @param ?bool $can_view_gifts_and_stars Optional. True, if the bot can view gifts and the amount of Telegram Stars owned by the business
 *     account (optional)
 * @param ?bool $can_convert_gifts_to_stars Optional. True, if the bot can convert regular gifts owned by the business account to Telegram Stars (optional)
 * @param ?bool $can_transfer_and_upgrade_gifts Optional. True, if the bot can transfer and upgrade gifts owned by the business account (optional)
 * @param ?bool $can_transfer_stars Optional. True, if the bot can transfer Telegram Stars received by the business account to its own
 *     account, or use them to upgrade and transfer gifts (optional)
 * @param ?bool $can_manage_stories Optional. True, if the bot can post, edit and delete stories on behalf of the business account (optional)
 */
final class BusinessBotRights implements \JsonSerializable
{
    public function __construct(
        public readonly ?bool $can_reply = null,
        public readonly ?bool $can_read_messages = null,
        public readonly ?bool $can_delete_sent_messages = null,
        public readonly ?bool $can_delete_all_messages = null,
        public readonly ?bool $can_edit_name = null,
        public readonly ?bool $can_edit_bio = null,
        public readonly ?bool $can_edit_profile_photo = null,
        public readonly ?bool $can_edit_username = null,
        public readonly ?bool $can_change_gift_settings = null,
        public readonly ?bool $can_view_gifts_and_stars = null,
        public readonly ?bool $can_convert_gifts_to_stars = null,
        public readonly ?bool $can_transfer_and_upgrade_gifts = null,
        public readonly ?bool $can_transfer_stars = null,
        public readonly ?bool $can_manage_stories = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->can_reply !== null) $data['can_reply'] = $this->can_reply;

        if ($this->can_read_messages !== null) $data['can_read_messages'] = $this->can_read_messages;

        if ($this->can_delete_sent_messages !== null) $data['can_delete_sent_messages'] = $this->can_delete_sent_messages;

        if ($this->can_delete_all_messages !== null) $data['can_delete_all_messages'] = $this->can_delete_all_messages;

        if ($this->can_edit_name !== null) $data['can_edit_name'] = $this->can_edit_name;

        if ($this->can_edit_bio !== null) $data['can_edit_bio'] = $this->can_edit_bio;

        if ($this->can_edit_profile_photo !== null) $data['can_edit_profile_photo'] = $this->can_edit_profile_photo;

        if ($this->can_edit_username !== null) $data['can_edit_username'] = $this->can_edit_username;

        if ($this->can_change_gift_settings !== null) $data['can_change_gift_settings'] = $this->can_change_gift_settings;

        if ($this->can_view_gifts_and_stars !== null) $data['can_view_gifts_and_stars'] = $this->can_view_gifts_and_stars;

        if ($this->can_convert_gifts_to_stars !== null) $data['can_convert_gifts_to_stars'] = $this->can_convert_gifts_to_stars;

        if ($this->can_transfer_and_upgrade_gifts !== null) $data['can_transfer_and_upgrade_gifts'] = $this->can_transfer_and_upgrade_gifts;

        if ($this->can_transfer_stars !== null) $data['can_transfer_stars'] = $this->can_transfer_stars;

        if ($this->can_manage_stories !== null) $data['can_manage_stories'] = $this->can_manage_stories;


        return $data;
    }
}
