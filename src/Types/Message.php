<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a message.
 *
 * @see https://core.telegram.org/bots/api#message
 *
 * @param int $message_id Unique message identifier inside this chat; 0 for ephemeral messages. In specific instances (e.g., a
 *     message containing a video sent to a big chat), the server might automatically schedule a message
 *     instead of sending it immediately. In such cases, this field will be 0 and the relevant message will
 *     be unusable until it is actually sent.
 * @param int $date Date the message was sent in Unix time. It is always a positive number, representing a valid date.
 * @param Chat|array $chat Chat the message belongs to
 * @param ?int $message_thread_id Optional. Unique identifier of a message thread or forum topic to which the message belongs; for
 *     supergroups and private chats only (optional)
 * @param DirectMessagesTopic|array|null $direct_messages_topic Optional. Information about the direct messages chat topic that contains the message (optional)
 * @param User|array|null $from Optional. Sender of the message; may be empty for messages sent to channels. For backward
 *     compatibility, if the message was sent on behalf of a chat, the field contains a fake sender user in
 *     non-channel chats. (optional)
 * @param Chat|array|null $sender_chat Optional. Sender of the message when sent on behalf of a chat. For example, the supergroup itself
 *     for messages sent by its anonymous administrators or a linked channel for messages automatically
 *     forwarded to the channel's discussion group. For backward compatibility, if the message was sent on
 *     behalf of a chat, the field from contains a fake sender user in non-channel chats. (optional)
 * @param ?int $sender_boost_count Optional. If the sender of the message boosted the chat, the number of boosts added by the user (optional)
 * @param User|array|null $sender_business_bot Optional. The bot that actually sent the message on behalf of the business account. Available only
 *     for outgoing messages sent on behalf of the connected business account. (optional)
 * @param ?string $sender_tag Optional. Tag or custom title of the sender of the message; for supergroups only (optional)
 * @param User|array|null $receiver_user Optional. For ephemeral messages, the user who received the message (optional)
 * @param ?int $ephemeral_message_id Optional. For ephemeral messages, identifier of the ephemeral message inside this chat. The
 *     identifier may be reused for another ephemeral message after the message is deleted or expires. (optional)
 * @param ?string $guest_query_id Optional. The unique identifier for the guest query. Use this identifier with the method
 *     answerGuestQuery to send a response message. If non-empty, the message belongs to the chat where the
 *     guest bot was summoned, which may not coincide with other existing bot chats sharing the same
 *     identifier. (optional)
 * @param ?string $business_connection_id Optional. Unique identifier of the business connection from which the message was received. If
 *     non-empty, the message belongs to a chat of the corresponding business account that is independent
 *     from any potential bot chat which might share the same identifier. (optional)
 * @param MessageOrigin|array|null $forward_origin Optional. Information about the original message for forwarded messages (optional)
 * @param ?bool $is_topic_message Optional. True, if the message is sent to a topic in a forum supergroup or a private chat with the
 *     bot (optional)
 * @param ?bool $is_automatic_forward Optional. True, if the message is a channel post that was automatically forwarded to the connected
 *     discussion group (optional)
 * @param Message|array|null $reply_to_message Optional. For replies in the same chat and message thread, the original message. Note that the
 *     Message object in this field will not contain further reply_to_message fields even if it itself is a
 *     reply. If the message is a reply to an ephemeral message, then this field may be omitted. (optional)
 * @param ExternalReplyInfo|array|null $external_reply Optional. Information about the message that is being replied to, which may come from another chat
 *     or forum topic (optional)
 * @param TextQuote|array|null $quote Optional. For replies that quote part of the original message, the quoted part of the message (optional)
 * @param Story|array|null $reply_to_story Optional. For replies to a story, the original story (optional)
 * @param ?int $reply_to_checklist_task_id Optional. Identifier of the specific checklist task that is being replied to (optional)
 * @param ?string $reply_to_poll_option_id Optional. Persistent identifier of the specific poll option that is being replied to (optional)
 * @param User|array|null $via_bot Optional. Bot through which the message was sent (optional)
 * @param User|array|null $guest_bot_caller_user Optional. For a message sent by a guest bot, this is the user whose original message triggered the
 *     bot's response (optional)
 * @param Chat|array|null $guest_bot_caller_chat Optional. For a message sent by a guest bot, this is the chat whose original message triggered the
 *     bot's response (optional)
 * @param ?int $edit_date Optional. Date the message was last edited in Unix time (optional)
 * @param ?bool $has_protected_content Optional. True, if the message can't be forwarded (optional)
 * @param ?bool $is_from_offline Optional. True, if the message was sent by an implicit action, for example, as an away or a greeting
 *     business message, or as a scheduled message (optional)
 * @param ?bool $is_paid_post Optional. True, if the message is a paid post. Note that such posts must not be deleted for 24 hours
 *     to receive the payment and can't be edited. (optional)
 * @param ?string $media_group_id Optional. The unique identifier inside this chat of a media message group this message belongs to (optional)
 * @param ?string $author_signature Optional. Signature of the post author for messages in channels, or the custom title of an anonymous
 *     group administrator (optional)
 * @param ?int $paid_star_count Optional. The number of Telegram Stars that were paid by the sender of the message to send it (optional)
 * @param ?string $text Optional. For text messages, the actual UTF-8 text of the message (optional)
 * @param ?array $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear
 *     in the text (optional)
 * @param LinkPreviewOptions|array|null $link_preview_options Optional. Options used for link preview generation for the message, if it is a text message and link
 *     preview options were changed (optional)
 * @param SuggestedPostInfo|array|null $suggested_post_info Optional. Information about suggested post parameters if the message is a suggested post in a
 *     channel direct messages chat. If the message is an approved or declined suggested post, then it
 *     can't be edited. (optional)
 * @param ?string $effect_id Optional. Unique identifier of the message effect added to the message (optional)
 * @param RichMessage|array|null $rich_message Optional. Message is a rich formatted message (optional)
 * @param Animation|array|null $animation Optional. Message is an animation, information about the animation. For backward compatibility, when
 *     this field is set, the document field will also be set. (optional)
 * @param Audio|array|null $audio Optional. Message is an audio file, information about the file (optional)
 * @param Document|array|null $document Optional. Message is a general file, information about the file (optional)
 * @param LivePhoto|array|null $live_photo Optional. Message is a live photo, information about the live photo. For backward compatibility,
 *     when this field is set, the photo field will also be set. (optional)
 * @param PaidMediaInfo|array|null $paid_media Optional. Message contains paid media; information about the paid media (optional)
 * @param ?array $photo Optional. Message is a photo, available sizes of the photo (optional)
 * @param Sticker|array|null $sticker Optional. Message is a sticker, information about the sticker (optional)
 * @param Story|array|null $story Optional. Message is a forwarded story (optional)
 * @param Video|array|null $video Optional. Message is a video, information about the video (optional)
 * @param VideoNote|array|null $video_note Optional. Message is a video note, information about the video message (optional)
 * @param Voice|array|null $voice Optional. Message is a voice message, information about the file (optional)
 * @param ?string $caption Optional. Caption for the animation, audio, document, paid media, photo, video or voice (optional)
 * @param ?array $caption_entities Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc.
 *     that appear in the caption (optional)
 * @param ?bool $show_caption_above_media Optional. True, if the caption must be shown above the message media (optional)
 * @param ?bool $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation (optional)
 * @param Checklist|array|null $checklist Optional. Message is a checklist (optional)
 * @param Contact|array|null $contact Optional. Message is a shared contact, information about the contact (optional)
 * @param Dice|array|null $dice Optional. Message is a dice with random value (optional)
 * @param Game|array|null $game Optional. Message is a game, information about the game. More about games » (optional)
 * @param Poll|array|null $poll Optional. Message is a native poll, information about the poll (optional)
 * @param Venue|array|null $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this
 *     field is set, the location field will also be set. (optional)
 * @param Location|array|null $location Optional. Message is a shared location, information about the location (optional)
 * @param ?array $new_chat_members Optional. New members that were added to the group or supergroup and information about them (the bot
 *     itself may be one of these members) (optional)
 * @param User|array|null $left_chat_member Optional. A member was removed from the group, information about them (this member may be the bot
 *     itself) (optional)
 * @param ChatOwnerLeft|array|null $chat_owner_left Optional. Service message: chat owner has left (optional)
 * @param ChatOwnerChanged|array|null $chat_owner_changed Optional. Service message: chat owner has changed (optional)
 * @param ?string $new_chat_title Optional. A chat title was changed to this value (optional)
 * @param ?array $new_chat_photo Optional. A chat photo was change to this value (optional)
 * @param ?bool $delete_chat_photo Optional. Service message: the chat photo was deleted (optional)
 * @param ?bool $group_chat_created Optional. Service message: the group has been created (optional)
 * @param ?bool $supergroup_chat_created Optional. Service message: the supergroup has been created. This field can't be received in a
 *     message coming through updates, because bot can't be a member of a supergroup when it is created. It
 *     can only be found in reply_to_message if someone replies to a very first message in a directly
 *     created supergroup. (optional)
 * @param ?bool $channel_chat_created Optional. Service message: the channel has been created. This field can't be received in a message
 *     coming through updates, because bot can't be a member of a channel when it is created. It can only
 *     be found in reply_to_message if someone replies to a very first message in a channel. (optional)
 * @param MessageAutoDeleteTimerChanged|array|null $message_auto_delete_timer_changed Optional. Service message: auto-delete timer settings changed in the chat (optional)
 * @param ?int $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may
 *     have more than 32 significant bits and some programming languages may have difficulty/silent defects
 *     in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or
 *     double-precision float type are safe for storing this identifier. (optional)
 * @param ?int $migrate_from_chat_id Optional. The supergroup has been migrated from a group with the specified identifier. This number
 *     may have more than 32 significant bits and some programming languages may have difficulty/silent
 *     defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or
 *     double-precision float type are safe for storing this identifier. (optional)
 * @param MaybeInaccessibleMessage|array|null $pinned_message Optional. Specified message was pinned. Note that the Message object in this field will not contain
 *     further reply_to_message fields even if it itself is a reply. (optional)
 * @param Invoice|array|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments » (optional)
 * @param SuccessfulPayment|array|null $successful_payment Optional. Message is a service message about a successful payment, information about the payment.
 *     More about payments » (optional)
 * @param RefundedPayment|array|null $refunded_payment Optional. Message is a service message about a refunded payment, information about the payment. More
 *     about payments » (optional)
 * @param UsersShared|array|null $users_shared Optional. Service message: users were shared with the bot (optional)
 * @param ChatShared|array|null $chat_shared Optional. Service message: a chat was shared with the bot (optional)
 * @param GiftInfo|array|null $gift Optional. Service message: a regular gift was sent or received (optional)
 * @param UniqueGiftInfo|array|null $unique_gift Optional. Service message: a unique gift was sent or received (optional)
 * @param GiftInfo|array|null $gift_upgrade_sent Optional. Service message: upgrade of a gift was purchased after the gift was sent (optional)
 * @param ?string $connected_website Optional. The domain name of the website on which the user has logged in. More about Telegram Login
 *     » (optional)
 * @param WriteAccessAllowed|array|null $write_access_allowed Optional. Service message: the user allowed the bot to write messages after adding it to the
 *     attachment or side menu, launching a Web App from a link, or accepting an explicit request from a
 *     Web App sent by the method requestWriteAccess (optional)
 * @param PassportData|array|null $passport_data Optional. Telegram Passport data (optional)
 * @param ProximityAlertTriggered|array|null $proximity_alert_triggered Optional. Service message: a user in the chat triggered another user's proximity alert while sharing
 *     Live Location (optional)
 * @param ChatBoostAdded|array|null $boost_added Optional. Service message: user boosted the chat (optional)
 * @param ChatBackground|array|null $chat_background_set Optional. Service message: chat background set (optional)
 * @param ChecklistTasksDone|array|null $checklist_tasks_done Optional. Service message: some tasks in a checklist were marked as done or not done (optional)
 * @param ChecklistTasksAdded|array|null $checklist_tasks_added Optional. Service message: tasks were added to a checklist (optional)
 * @param CommunityChatAdded|array|null $community_chat_added Optional. Service message: chat or bot added to a Community (optional)
 * @param CommunityChatJoined|array|null $community_chat_joined Optional. Service message: chat was joined by a user from a Community (optional)
 * @param CommunityChatRemoved|array|null $community_chat_removed Optional. Service message: chat or bot removed from a Community (optional)
 * @param DirectMessagePriceChanged|array|null $direct_message_price_changed Optional. Service message: the price for paid messages in the corresponding direct messages chat of
 *     a channel has changed (optional)
 * @param ForumTopicCreated|array|null $forum_topic_created Optional. Service message: forum topic created (optional)
 * @param ForumTopicEdited|array|null $forum_topic_edited Optional. Service message: forum topic edited (optional)
 * @param ForumTopicClosed|array|null $forum_topic_closed Optional. Service message: forum topic closed (optional)
 * @param ForumTopicReopened|array|null $forum_topic_reopened Optional. Service message: forum topic reopened (optional)
 * @param GeneralForumTopicHidden|array|null $general_forum_topic_hidden Optional. Service message: the 'General' forum topic hidden (optional)
 * @param GeneralForumTopicUnhidden|array|null $general_forum_topic_unhidden Optional. Service message: the 'General' forum topic unhidden (optional)
 * @param GiveawayCreated|array|null $giveaway_created Optional. Service message: a scheduled giveaway was created (optional)
 * @param Giveaway|array|null $giveaway Optional. The message is a scheduled giveaway message (optional)
 * @param GiveawayWinners|array|null $giveaway_winners Optional. A giveaway with public winners was completed (optional)
 * @param GiveawayCompleted|array|null $giveaway_completed Optional. Service message: a giveaway without public winners was completed (optional)
 * @param ManagedBotCreated|array|null $managed_bot_created Optional. Service message: user created a bot that will be managed by the current bot (optional)
 * @param PaidMessagePriceChanged|array|null $paid_message_price_changed Optional. Service message: the price for paid messages has changed in the chat (optional)
 * @param PollOptionAdded|array|null $poll_option_added Optional. Service message: answer option was added to a poll (optional)
 * @param PollOptionDeleted|array|null $poll_option_deleted Optional. Service message: answer option was deleted from a poll (optional)
 * @param SuggestedPostApproved|array|null $suggested_post_approved Optional. Service message: a suggested post was approved (optional)
 * @param SuggestedPostApprovalFailed|array|null $suggested_post_approval_failed Optional. Service message: approval of a suggested post has failed (optional)
 * @param SuggestedPostDeclined|array|null $suggested_post_declined Optional. Service message: a suggested post was declined (optional)
 * @param SuggestedPostPaid|array|null $suggested_post_paid Optional. Service message: payment for a suggested post was received (optional)
 * @param SuggestedPostRefunded|array|null $suggested_post_refunded Optional. Service message: payment for a suggested post was refunded (optional)
 * @param VideoChatScheduled|array|null $video_chat_scheduled Optional. Service message: video chat scheduled (optional)
 * @param VideoChatStarted|array|null $video_chat_started Optional. Service message: video chat started (optional)
 * @param VideoChatEnded|array|null $video_chat_ended Optional. Service message: video chat ended (optional)
 * @param VideoChatParticipantsInvited|array|null $video_chat_participants_invited Optional. Service message: new participants invited to a video chat (optional)
 * @param WebAppData|array|null $web_app_data Optional. Service message: data sent by a Web App (optional)
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url
 *     buttons. (optional)
 */
final class Message implements MaybeInaccessibleMessage, \JsonSerializable
{
    public function __construct(
        public readonly int $message_id,
        public readonly int $date,
        public readonly Chat|array $chat,
        public readonly ?int $message_thread_id = null,
        public readonly DirectMessagesTopic|array|null $direct_messages_topic = null,
        public readonly User|array|null $from = null,
        public readonly Chat|array|null $sender_chat = null,
        public readonly ?int $sender_boost_count = null,
        public readonly User|array|null $sender_business_bot = null,
        public readonly ?string $sender_tag = null,
        public readonly User|array|null $receiver_user = null,
        public readonly ?int $ephemeral_message_id = null,
        public readonly ?string $guest_query_id = null,
        public readonly ?string $business_connection_id = null,
        public readonly MessageOrigin|array|null $forward_origin = null,
        public readonly ?bool $is_topic_message = null,
        public readonly ?bool $is_automatic_forward = null,
        public readonly Message|array|null $reply_to_message = null,
        public readonly ExternalReplyInfo|array|null $external_reply = null,
        public readonly TextQuote|array|null $quote = null,
        public readonly Story|array|null $reply_to_story = null,
        public readonly ?int $reply_to_checklist_task_id = null,
        public readonly ?string $reply_to_poll_option_id = null,
        public readonly User|array|null $via_bot = null,
        public readonly User|array|null $guest_bot_caller_user = null,
        public readonly Chat|array|null $guest_bot_caller_chat = null,
        public readonly ?int $edit_date = null,
        public readonly ?bool $has_protected_content = null,
        public readonly ?bool $is_from_offline = null,
        public readonly ?bool $is_paid_post = null,
        public readonly ?string $media_group_id = null,
        public readonly ?string $author_signature = null,
        public readonly ?int $paid_star_count = null,
        public readonly ?string $text = null,
        public readonly ?array $entities = null,
        public readonly LinkPreviewOptions|array|null $link_preview_options = null,
        public readonly SuggestedPostInfo|array|null $suggested_post_info = null,
        public readonly ?string $effect_id = null,
        public readonly RichMessage|array|null $rich_message = null,
        public readonly Animation|array|null $animation = null,
        public readonly Audio|array|null $audio = null,
        public readonly Document|array|null $document = null,
        public readonly LivePhoto|array|null $live_photo = null,
        public readonly PaidMediaInfo|array|null $paid_media = null,
        public readonly ?array $photo = null,
        public readonly Sticker|array|null $sticker = null,
        public readonly Story|array|null $story = null,
        public readonly Video|array|null $video = null,
        public readonly VideoNote|array|null $video_note = null,
        public readonly Voice|array|null $voice = null,
        public readonly ?string $caption = null,
        public readonly ?array $caption_entities = null,
        public readonly ?bool $show_caption_above_media = null,
        public readonly ?bool $has_media_spoiler = null,
        public readonly Checklist|array|null $checklist = null,
        public readonly Contact|array|null $contact = null,
        public readonly Dice|array|null $dice = null,
        public readonly Game|array|null $game = null,
        public readonly Poll|array|null $poll = null,
        public readonly Venue|array|null $venue = null,
        public readonly Location|array|null $location = null,
        public readonly ?array $new_chat_members = null,
        public readonly User|array|null $left_chat_member = null,
        public readonly ChatOwnerLeft|array|null $chat_owner_left = null,
        public readonly ChatOwnerChanged|array|null $chat_owner_changed = null,
        public readonly ?string $new_chat_title = null,
        public readonly ?array $new_chat_photo = null,
        public readonly ?bool $delete_chat_photo = null,
        public readonly ?bool $group_chat_created = null,
        public readonly ?bool $supergroup_chat_created = null,
        public readonly ?bool $channel_chat_created = null,
        public readonly MessageAutoDeleteTimerChanged|array|null $message_auto_delete_timer_changed = null,
        public readonly ?int $migrate_to_chat_id = null,
        public readonly ?int $migrate_from_chat_id = null,
        public readonly MaybeInaccessibleMessage|array|null $pinned_message = null,
        public readonly Invoice|array|null $invoice = null,
        public readonly SuccessfulPayment|array|null $successful_payment = null,
        public readonly RefundedPayment|array|null $refunded_payment = null,
        public readonly UsersShared|array|null $users_shared = null,
        public readonly ChatShared|array|null $chat_shared = null,
        public readonly GiftInfo|array|null $gift = null,
        public readonly UniqueGiftInfo|array|null $unique_gift = null,
        public readonly GiftInfo|array|null $gift_upgrade_sent = null,
        public readonly ?string $connected_website = null,
        public readonly WriteAccessAllowed|array|null $write_access_allowed = null,
        public readonly PassportData|array|null $passport_data = null,
        public readonly ProximityAlertTriggered|array|null $proximity_alert_triggered = null,
        public readonly ChatBoostAdded|array|null $boost_added = null,
        public readonly ChatBackground|array|null $chat_background_set = null,
        public readonly ChecklistTasksDone|array|null $checklist_tasks_done = null,
        public readonly ChecklistTasksAdded|array|null $checklist_tasks_added = null,
        public readonly CommunityChatAdded|array|null $community_chat_added = null,
        public readonly CommunityChatJoined|array|null $community_chat_joined = null,
        public readonly CommunityChatRemoved|array|null $community_chat_removed = null,
        public readonly DirectMessagePriceChanged|array|null $direct_message_price_changed = null,
        public readonly ForumTopicCreated|array|null $forum_topic_created = null,
        public readonly ForumTopicEdited|array|null $forum_topic_edited = null,
        public readonly ForumTopicClosed|array|null $forum_topic_closed = null,
        public readonly ForumTopicReopened|array|null $forum_topic_reopened = null,
        public readonly GeneralForumTopicHidden|array|null $general_forum_topic_hidden = null,
        public readonly GeneralForumTopicUnhidden|array|null $general_forum_topic_unhidden = null,
        public readonly GiveawayCreated|array|null $giveaway_created = null,
        public readonly Giveaway|array|null $giveaway = null,
        public readonly GiveawayWinners|array|null $giveaway_winners = null,
        public readonly GiveawayCompleted|array|null $giveaway_completed = null,
        public readonly ManagedBotCreated|array|null $managed_bot_created = null,
        public readonly PaidMessagePriceChanged|array|null $paid_message_price_changed = null,
        public readonly PollOptionAdded|array|null $poll_option_added = null,
        public readonly PollOptionDeleted|array|null $poll_option_deleted = null,
        public readonly SuggestedPostApproved|array|null $suggested_post_approved = null,
        public readonly SuggestedPostApprovalFailed|array|null $suggested_post_approval_failed = null,
        public readonly SuggestedPostDeclined|array|null $suggested_post_declined = null,
        public readonly SuggestedPostPaid|array|null $suggested_post_paid = null,
        public readonly SuggestedPostRefunded|array|null $suggested_post_refunded = null,
        public readonly VideoChatScheduled|array|null $video_chat_scheduled = null,
        public readonly VideoChatStarted|array|null $video_chat_started = null,
        public readonly VideoChatEnded|array|null $video_chat_ended = null,
        public readonly VideoChatParticipantsInvited|array|null $video_chat_participants_invited = null,
        public readonly WebAppData|array|null $web_app_data = null,
        public readonly InlineKeyboardMarkup|array|null $reply_markup = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['message_id'] = $this->message_id;
        $data['date'] = $this->date;
        $data['chat'] = $this->chat;
        if ($this->message_thread_id !== null) $data['message_thread_id'] = $this->message_thread_id;

        if ($this->direct_messages_topic !== null) $data['direct_messages_topic'] = $this->direct_messages_topic;

        if ($this->from !== null) $data['from'] = $this->from;

        if ($this->sender_chat !== null) $data['sender_chat'] = $this->sender_chat;

        if ($this->sender_boost_count !== null) $data['sender_boost_count'] = $this->sender_boost_count;

        if ($this->sender_business_bot !== null) $data['sender_business_bot'] = $this->sender_business_bot;

        if ($this->sender_tag !== null) $data['sender_tag'] = $this->sender_tag;

        if ($this->receiver_user !== null) $data['receiver_user'] = $this->receiver_user;

        if ($this->ephemeral_message_id !== null) $data['ephemeral_message_id'] = $this->ephemeral_message_id;

        if ($this->guest_query_id !== null) $data['guest_query_id'] = $this->guest_query_id;

        if ($this->business_connection_id !== null) $data['business_connection_id'] = $this->business_connection_id;

        if ($this->forward_origin !== null) $data['forward_origin'] = $this->forward_origin;

        if ($this->is_topic_message !== null) $data['is_topic_message'] = $this->is_topic_message;

        if ($this->is_automatic_forward !== null) $data['is_automatic_forward'] = $this->is_automatic_forward;

        if ($this->reply_to_message !== null) $data['reply_to_message'] = $this->reply_to_message;

        if ($this->external_reply !== null) $data['external_reply'] = $this->external_reply;

        if ($this->quote !== null) $data['quote'] = $this->quote;

        if ($this->reply_to_story !== null) $data['reply_to_story'] = $this->reply_to_story;

        if ($this->reply_to_checklist_task_id !== null) $data['reply_to_checklist_task_id'] = $this->reply_to_checklist_task_id;

        if ($this->reply_to_poll_option_id !== null) $data['reply_to_poll_option_id'] = $this->reply_to_poll_option_id;

        if ($this->via_bot !== null) $data['via_bot'] = $this->via_bot;

        if ($this->guest_bot_caller_user !== null) $data['guest_bot_caller_user'] = $this->guest_bot_caller_user;

        if ($this->guest_bot_caller_chat !== null) $data['guest_bot_caller_chat'] = $this->guest_bot_caller_chat;

        if ($this->edit_date !== null) $data['edit_date'] = $this->edit_date;

        if ($this->has_protected_content !== null) $data['has_protected_content'] = $this->has_protected_content;

        if ($this->is_from_offline !== null) $data['is_from_offline'] = $this->is_from_offline;

        if ($this->is_paid_post !== null) $data['is_paid_post'] = $this->is_paid_post;

        if ($this->media_group_id !== null) $data['media_group_id'] = $this->media_group_id;

        if ($this->author_signature !== null) $data['author_signature'] = $this->author_signature;

        if ($this->paid_star_count !== null) $data['paid_star_count'] = $this->paid_star_count;

        if ($this->text !== null) $data['text'] = $this->text;

        if ($this->entities !== null) $data['entities'] = $this->entities;

        if ($this->link_preview_options !== null) $data['link_preview_options'] = $this->link_preview_options;

        if ($this->suggested_post_info !== null) $data['suggested_post_info'] = $this->suggested_post_info;

        if ($this->effect_id !== null) $data['effect_id'] = $this->effect_id;

        if ($this->rich_message !== null) $data['rich_message'] = $this->rich_message;

        if ($this->animation !== null) $data['animation'] = $this->animation;

        if ($this->audio !== null) $data['audio'] = $this->audio;

        if ($this->document !== null) $data['document'] = $this->document;

        if ($this->live_photo !== null) $data['live_photo'] = $this->live_photo;

        if ($this->paid_media !== null) $data['paid_media'] = $this->paid_media;

        if ($this->photo !== null) $data['photo'] = $this->photo;

        if ($this->sticker !== null) $data['sticker'] = $this->sticker;

        if ($this->story !== null) $data['story'] = $this->story;

        if ($this->video !== null) $data['video'] = $this->video;

        if ($this->video_note !== null) $data['video_note'] = $this->video_note;

        if ($this->voice !== null) $data['voice'] = $this->voice;

        if ($this->caption !== null) $data['caption'] = $this->caption;

        if ($this->caption_entities !== null) $data['caption_entities'] = $this->caption_entities;

        if ($this->show_caption_above_media !== null) $data['show_caption_above_media'] = $this->show_caption_above_media;

        if ($this->has_media_spoiler !== null) $data['has_media_spoiler'] = $this->has_media_spoiler;

        if ($this->checklist !== null) $data['checklist'] = $this->checklist;

        if ($this->contact !== null) $data['contact'] = $this->contact;

        if ($this->dice !== null) $data['dice'] = $this->dice;

        if ($this->game !== null) $data['game'] = $this->game;

        if ($this->poll !== null) $data['poll'] = $this->poll;

        if ($this->venue !== null) $data['venue'] = $this->venue;

        if ($this->location !== null) $data['location'] = $this->location;

        if ($this->new_chat_members !== null) $data['new_chat_members'] = $this->new_chat_members;

        if ($this->left_chat_member !== null) $data['left_chat_member'] = $this->left_chat_member;

        if ($this->chat_owner_left !== null) $data['chat_owner_left'] = $this->chat_owner_left;

        if ($this->chat_owner_changed !== null) $data['chat_owner_changed'] = $this->chat_owner_changed;

        if ($this->new_chat_title !== null) $data['new_chat_title'] = $this->new_chat_title;

        if ($this->new_chat_photo !== null) $data['new_chat_photo'] = $this->new_chat_photo;

        if ($this->delete_chat_photo !== null) $data['delete_chat_photo'] = $this->delete_chat_photo;

        if ($this->group_chat_created !== null) $data['group_chat_created'] = $this->group_chat_created;

        if ($this->supergroup_chat_created !== null) $data['supergroup_chat_created'] = $this->supergroup_chat_created;

        if ($this->channel_chat_created !== null) $data['channel_chat_created'] = $this->channel_chat_created;

        if ($this->message_auto_delete_timer_changed !== null) $data['message_auto_delete_timer_changed'] = $this->message_auto_delete_timer_changed;

        if ($this->migrate_to_chat_id !== null) $data['migrate_to_chat_id'] = $this->migrate_to_chat_id;

        if ($this->migrate_from_chat_id !== null) $data['migrate_from_chat_id'] = $this->migrate_from_chat_id;

        if ($this->pinned_message !== null) $data['pinned_message'] = $this->pinned_message;

        if ($this->invoice !== null) $data['invoice'] = $this->invoice;

        if ($this->successful_payment !== null) $data['successful_payment'] = $this->successful_payment;

        if ($this->refunded_payment !== null) $data['refunded_payment'] = $this->refunded_payment;

        if ($this->users_shared !== null) $data['users_shared'] = $this->users_shared;

        if ($this->chat_shared !== null) $data['chat_shared'] = $this->chat_shared;

        if ($this->gift !== null) $data['gift'] = $this->gift;

        if ($this->unique_gift !== null) $data['unique_gift'] = $this->unique_gift;

        if ($this->gift_upgrade_sent !== null) $data['gift_upgrade_sent'] = $this->gift_upgrade_sent;

        if ($this->connected_website !== null) $data['connected_website'] = $this->connected_website;

        if ($this->write_access_allowed !== null) $data['write_access_allowed'] = $this->write_access_allowed;

        if ($this->passport_data !== null) $data['passport_data'] = $this->passport_data;

        if ($this->proximity_alert_triggered !== null) $data['proximity_alert_triggered'] = $this->proximity_alert_triggered;

        if ($this->boost_added !== null) $data['boost_added'] = $this->boost_added;

        if ($this->chat_background_set !== null) $data['chat_background_set'] = $this->chat_background_set;

        if ($this->checklist_tasks_done !== null) $data['checklist_tasks_done'] = $this->checklist_tasks_done;

        if ($this->checklist_tasks_added !== null) $data['checklist_tasks_added'] = $this->checklist_tasks_added;

        if ($this->community_chat_added !== null) $data['community_chat_added'] = $this->community_chat_added;

        if ($this->community_chat_joined !== null) $data['community_chat_joined'] = $this->community_chat_joined;

        if ($this->community_chat_removed !== null) $data['community_chat_removed'] = $this->community_chat_removed;

        if ($this->direct_message_price_changed !== null) $data['direct_message_price_changed'] = $this->direct_message_price_changed;

        if ($this->forum_topic_created !== null) $data['forum_topic_created'] = $this->forum_topic_created;

        if ($this->forum_topic_edited !== null) $data['forum_topic_edited'] = $this->forum_topic_edited;

        if ($this->forum_topic_closed !== null) $data['forum_topic_closed'] = $this->forum_topic_closed;

        if ($this->forum_topic_reopened !== null) $data['forum_topic_reopened'] = $this->forum_topic_reopened;

        if ($this->general_forum_topic_hidden !== null) $data['general_forum_topic_hidden'] = $this->general_forum_topic_hidden;

        if ($this->general_forum_topic_unhidden !== null) $data['general_forum_topic_unhidden'] = $this->general_forum_topic_unhidden;

        if ($this->giveaway_created !== null) $data['giveaway_created'] = $this->giveaway_created;

        if ($this->giveaway !== null) $data['giveaway'] = $this->giveaway;

        if ($this->giveaway_winners !== null) $data['giveaway_winners'] = $this->giveaway_winners;

        if ($this->giveaway_completed !== null) $data['giveaway_completed'] = $this->giveaway_completed;

        if ($this->managed_bot_created !== null) $data['managed_bot_created'] = $this->managed_bot_created;

        if ($this->paid_message_price_changed !== null) $data['paid_message_price_changed'] = $this->paid_message_price_changed;

        if ($this->poll_option_added !== null) $data['poll_option_added'] = $this->poll_option_added;

        if ($this->poll_option_deleted !== null) $data['poll_option_deleted'] = $this->poll_option_deleted;

        if ($this->suggested_post_approved !== null) $data['suggested_post_approved'] = $this->suggested_post_approved;

        if ($this->suggested_post_approval_failed !== null) $data['suggested_post_approval_failed'] = $this->suggested_post_approval_failed;

        if ($this->suggested_post_declined !== null) $data['suggested_post_declined'] = $this->suggested_post_declined;

        if ($this->suggested_post_paid !== null) $data['suggested_post_paid'] = $this->suggested_post_paid;

        if ($this->suggested_post_refunded !== null) $data['suggested_post_refunded'] = $this->suggested_post_refunded;

        if ($this->video_chat_scheduled !== null) $data['video_chat_scheduled'] = $this->video_chat_scheduled;

        if ($this->video_chat_started !== null) $data['video_chat_started'] = $this->video_chat_started;

        if ($this->video_chat_ended !== null) $data['video_chat_ended'] = $this->video_chat_ended;

        if ($this->video_chat_participants_invited !== null) $data['video_chat_participants_invited'] = $this->video_chat_participants_invited;

        if ($this->web_app_data !== null) $data['web_app_data'] = $this->web_app_data;

        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;


        return $data;
    }
}
