<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an incoming update.At most one of the optional fields can be present in any
 * given update.
 *
 * @see https://core.telegram.org/bots/api#update
 *
 * @param int $update_id The update's unique identifier. Update identifiers start from a certain positive number and increase
 *     sequentially. This identifier becomes especially handy if you're using webhooks, since it allows you
 *     to ignore repeated updates or to restore the correct update sequence, should they get out of order.
 *     If there are no new updates for at least a week, then identifier of the next update will be chosen
 *     randomly instead of sequentially.
 * @param Message|array|null $message Optional. New incoming message of any kind - text, photo, sticker, etc. (optional)
 * @param Message|array|null $edited_message Optional. New version of a message that is known to the bot and was edited. This update may at times
 *     be triggered by changes to message fields that are either unavailable or not actively used by your
 *     bot. (optional)
 * @param Message|array|null $channel_post Optional. New incoming channel post of any kind - text, photo, sticker, etc. (optional)
 * @param Message|array|null $edited_channel_post Optional. New version of a channel post that is known to the bot and was edited. This update may at
 *     times be triggered by changes to message fields that are either unavailable or not actively used by
 *     your bot. (optional)
 * @param BusinessConnection|array|null $business_connection Optional. The bot was connected to or disconnected from a business account, or a user edited an
 *     existing connection with the bot (optional)
 * @param Message|array|null $business_message Optional. New message from a connected business account (optional)
 * @param Message|array|null $edited_business_message Optional. New version of a message from a connected business account (optional)
 * @param BusinessMessagesDeleted|array|null $deleted_business_messages Optional. Messages were deleted from a connected business account (optional)
 * @param Message|array|null $guest_message Optional. New guest message. The bot can use the field Message.guest_query_id and the method
 *     answerGuestQuery to send a message in response. (optional)
 * @param MessageReactionUpdated|array|null $message_reaction Optional. A reaction to a message was changed by a user. The bot must be an administrator in the
 *     chat and must explicitly specify "message_reaction" in the list of allowed_updates to receive these
 *     updates. The update isn't received for reactions set by bots. (optional)
 * @param MessageReactionCountUpdated|array|null $message_reaction_count Optional. Reactions to a message with anonymous reactions were changed. The bot must be an
 *     administrator in the chat and must explicitly specify "message_reaction_count" in the list of
 *     allowed_updates to receive these updates. The updates are grouped and can be sent with delay up to a
 *     few minutes. (optional)
 * @param InlineQuery|array|null $inline_query Optional. New incoming inline query (optional)
 * @param ChosenInlineResult|array|null $chosen_inline_result Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
 *     Please see our documentation on the feedback collecting for details on how to enable these updates
 *     for your bot. (optional)
 * @param CallbackQuery|array|null $callback_query Optional. New incoming callback query (optional)
 * @param ShippingQuery|array|null $shipping_query Optional. New incoming shipping query. Only for invoices with flexible price. (optional)
 * @param PreCheckoutQuery|array|null $pre_checkout_query Optional. New incoming pre-checkout query. Contains full information about checkout. (optional)
 * @param PaidMediaPurchased|array|null $purchased_paid_media Optional. A user purchased paid media with a non-empty payload sent by the bot in a non-channel chat (optional)
 * @param Poll|array|null $poll Optional. New poll state. Bots receive only updates about manually stopped polls and polls, which
 *     are sent by the bot. (optional)
 * @param PollAnswer|array|null $poll_answer Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls
 *     that were sent by the bot itself. (optional)
 * @param ChatMemberUpdated|array|null $my_chat_member Optional. The bot's chat member status was updated in a chat. For private chats, this update is
 *     received only when the bot is blocked or unblocked by the user. (optional)
 * @param ChatMemberUpdated|array|null $chat_member Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat
 *     and must explicitly specify "chat_member" in the list of allowed_updates to receive these updates. (optional)
 * @param ChatJoinRequest|array|null $chat_join_request Optional. A request to join the chat has been sent. The bot must have the can_invite_users
 *     administrator right in the chat to receive these updates. (optional)
 * @param ChatBoostUpdated|array|null $chat_boost Optional. A chat boost was added or changed. The bot must be an administrator in the chat to receive
 *     these updates. (optional)
 * @param ChatBoostRemoved|array|null $removed_chat_boost Optional. A boost was removed from a chat. The bot must be an administrator in the chat to receive
 *     these updates. (optional)
 * @param ManagedBotUpdated|array|null $managed_bot Optional. A new bot was created to be managed by the bot, or token or owner of a managed bot was
 *     changed (optional)
 * @param BotSubscriptionUpdated|array|null $subscription Optional. User payment subscription has changed (optional)
 * @param MessageGenerationStopped|array|null $stopped_message_generation Optional. A user asked the bot to stop the generation of a message (optional)
 */
final class Update implements \JsonSerializable
{
    public function __construct(
        public readonly int $update_id,
        public readonly Message|array|null $message = null,
        public readonly Message|array|null $edited_message = null,
        public readonly Message|array|null $channel_post = null,
        public readonly Message|array|null $edited_channel_post = null,
        public readonly BusinessConnection|array|null $business_connection = null,
        public readonly Message|array|null $business_message = null,
        public readonly Message|array|null $edited_business_message = null,
        public readonly BusinessMessagesDeleted|array|null $deleted_business_messages = null,
        public readonly Message|array|null $guest_message = null,
        public readonly MessageReactionUpdated|array|null $message_reaction = null,
        public readonly MessageReactionCountUpdated|array|null $message_reaction_count = null,
        public readonly InlineQuery|array|null $inline_query = null,
        public readonly ChosenInlineResult|array|null $chosen_inline_result = null,
        public readonly CallbackQuery|array|null $callback_query = null,
        public readonly ShippingQuery|array|null $shipping_query = null,
        public readonly PreCheckoutQuery|array|null $pre_checkout_query = null,
        public readonly PaidMediaPurchased|array|null $purchased_paid_media = null,
        public readonly Poll|array|null $poll = null,
        public readonly PollAnswer|array|null $poll_answer = null,
        public readonly ChatMemberUpdated|array|null $my_chat_member = null,
        public readonly ChatMemberUpdated|array|null $chat_member = null,
        public readonly ChatJoinRequest|array|null $chat_join_request = null,
        public readonly ChatBoostUpdated|array|null $chat_boost = null,
        public readonly ChatBoostRemoved|array|null $removed_chat_boost = null,
        public readonly ManagedBotUpdated|array|null $managed_bot = null,
        public readonly BotSubscriptionUpdated|array|null $subscription = null,
        public readonly MessageGenerationStopped|array|null $stopped_message_generation = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['update_id'] = $this->update_id;
        if ($this->message !== null) $data['message'] = $this->message;

        if ($this->edited_message !== null) $data['edited_message'] = $this->edited_message;

        if ($this->channel_post !== null) $data['channel_post'] = $this->channel_post;

        if ($this->edited_channel_post !== null) $data['edited_channel_post'] = $this->edited_channel_post;

        if ($this->business_connection !== null) $data['business_connection'] = $this->business_connection;

        if ($this->business_message !== null) $data['business_message'] = $this->business_message;

        if ($this->edited_business_message !== null) $data['edited_business_message'] = $this->edited_business_message;

        if ($this->deleted_business_messages !== null) $data['deleted_business_messages'] = $this->deleted_business_messages;

        if ($this->guest_message !== null) $data['guest_message'] = $this->guest_message;

        if ($this->message_reaction !== null) $data['message_reaction'] = $this->message_reaction;

        if ($this->message_reaction_count !== null) $data['message_reaction_count'] = $this->message_reaction_count;

        if ($this->inline_query !== null) $data['inline_query'] = $this->inline_query;

        if ($this->chosen_inline_result !== null) $data['chosen_inline_result'] = $this->chosen_inline_result;

        if ($this->callback_query !== null) $data['callback_query'] = $this->callback_query;

        if ($this->shipping_query !== null) $data['shipping_query'] = $this->shipping_query;

        if ($this->pre_checkout_query !== null) $data['pre_checkout_query'] = $this->pre_checkout_query;

        if ($this->purchased_paid_media !== null) $data['purchased_paid_media'] = $this->purchased_paid_media;

        if ($this->poll !== null) $data['poll'] = $this->poll;

        if ($this->poll_answer !== null) $data['poll_answer'] = $this->poll_answer;

        if ($this->my_chat_member !== null) $data['my_chat_member'] = $this->my_chat_member;

        if ($this->chat_member !== null) $data['chat_member'] = $this->chat_member;

        if ($this->chat_join_request !== null) $data['chat_join_request'] = $this->chat_join_request;

        if ($this->chat_boost !== null) $data['chat_boost'] = $this->chat_boost;

        if ($this->removed_chat_boost !== null) $data['removed_chat_boost'] = $this->removed_chat_boost;

        if ($this->managed_bot !== null) $data['managed_bot'] = $this->managed_bot;

        if ($this->subscription !== null) $data['subscription'] = $this->subscription;

        if ($this->stopped_message_generation !== null) $data['stopped_message_generation'] = $this->stopped_message_generation;


        return $data;
    }
}
