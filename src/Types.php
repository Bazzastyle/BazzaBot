<?php

	namespace BazzaBot;

	use CURLFile;

	trait Types {
    /**
     * This object represents an incoming update.At most one of the optional parameters can be present in
     * any given update.
     * 
     * @see https://core.telegram.org/bots/api#Update
     *
     * @param int $update_id The update's unique identifier. Update identifiers start from a certain positive number and increase
     *                              sequentially. This identifier becomes especially handy if you're using webhooks, since it allows you
     *                              to ignore repeated updates or to restore the correct update sequence, should they get out of order.
     *                              If there are no new updates for at least a week, then identifier of the next update will be chosen
     *                              randomly instead of sequentially.
     * @param Message|NULL $message New incoming message of any kind - text, photo, sticker, etc.
     * @param Message|NULL $edited_message New version of a message that is known to the bot and was edited. This update may at times be
     *                              triggered by changes to message fields that are either unavailable or not actively used by your bot.
     * @param Message|NULL $channel_post New incoming channel post of any kind - text, photo, sticker, etc.
     * @param Message|NULL $edited_channel_post New version of a channel post that is known to the bot and was edited. This update may at times be
     *                              triggered by changes to message fields that are either unavailable or not actively used by your bot.
     * @param BusinessConnection|NULL $business_connection The bot was connected to or disconnected from a business account, or a user edited an existing
     *                              connection with the bot
     * @param Message|NULL $business_message New message from a connected business account
     * @param Message|NULL $edited_business_message New version of a message from a connected business account
     * @param BusinessMessagesDeleted|NULL $deleted_business_messages Messages were deleted from a connected business account
     * @param MessageReactionUpdated|NULL $message_reaction A reaction to a message was changed by a user. The bot must be an administrator in the chat and must
     *                              explicitly specify "message_reaction" in the list of allowed_updates to receive these updates. The
     *                              update isn't received for reactions set by bots.
     * @param MessageReactionCountUpdated|NULL $message_reaction_count Reactions to a message with anonymous reactions were changed. The bot must be an administrator in
     *                              the chat and must explicitly specify "message_reaction_count" in the list of allowed_updates to
     *                              receive these updates. The updates are grouped and can be sent with delay up to a few minutes.
     * @param InlineQuery|NULL $inline_query New incoming inline query
     * @param ChosenInlineResult|NULL $chosen_inline_result The result of an inline query that was chosen by a user and sent to their chat partner. Please see
     *                              our documentation on the feedback collecting for details on how to enable these updates for your bot.
     * @param CallbackQuery|NULL $callback_query New incoming callback query
     * @param ShippingQuery|NULL $shipping_query New incoming shipping query. Only for invoices with flexible price
     * @param PreCheckoutQuery|NULL $pre_checkout_query New incoming pre-checkout query. Contains full information about checkout
     * @param PaidMediaPurchased|NULL $purchased_paid_media A user purchased paid media with a non-empty payload sent by the bot in a non-channel chat
     * @param Poll|NULL $poll New poll state. Bots receive only updates about manually stopped polls and polls, which are sent by
     *                              the bot
     * @param PollAnswer|NULL $poll_answer A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were
     *                              sent by the bot itself.
     * @param ChatMemberUpdated|NULL $my_chat_member The bot's chat member status was updated in a chat. For private chats, this update is received only
     *                              when the bot is blocked or unblocked by the user.
     * @param ChatMemberUpdated|NULL $chat_member A chat member's status was updated in a chat. The bot must be an administrator in the chat and must
     *                              explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
     * @param ChatJoinRequest|NULL $chat_join_request A request to join the chat has been sent. The bot must have the can_invite_users administrator right
     *                              in the chat to receive these updates.
     * @param ChatBoostUpdated|NULL $chat_boost A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates.
     * @param ChatBoostRemoved|NULL $removed_chat_boost A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates.
     *
     * @return array $args
     */
    public function Update ( int $update_id, ?array $message = NULL, ?array $edited_message = NULL, ?array $channel_post = NULL, ?array $edited_channel_post = NULL, ?array $business_connection = NULL, ?array $business_message = NULL, ?array $edited_business_message = NULL, ?array $deleted_business_messages = NULL, ?array $message_reaction = NULL, ?array $message_reaction_count = NULL, ?array $inline_query = NULL, ?array $chosen_inline_result = NULL, ?array $callback_query = NULL, ?array $shipping_query = NULL, ?array $pre_checkout_query = NULL, ?array $purchased_paid_media = NULL, ?array $poll = NULL, ?array $poll_answer = NULL, ?array $my_chat_member = NULL, ?array $chat_member = NULL, ?array $chat_join_request = NULL, ?array $chat_boost = NULL, ?array $removed_chat_boost = NULL ) : array {
      $args = [ 'update_id' => $update_id ]; 
      if ( $message !== NULL ) $args['message'] = $message;
      if ( $edited_message !== NULL ) $args['edited_message'] = $edited_message;
      if ( $channel_post !== NULL ) $args['channel_post'] = $channel_post;
      if ( $edited_channel_post !== NULL ) $args['edited_channel_post'] = $edited_channel_post;
      if ( $business_connection !== NULL ) $args['business_connection'] = $business_connection;
      if ( $business_message !== NULL ) $args['business_message'] = $business_message;
      if ( $edited_business_message !== NULL ) $args['edited_business_message'] = $edited_business_message;
      if ( $deleted_business_messages !== NULL ) $args['deleted_business_messages'] = $deleted_business_messages;
      if ( $message_reaction !== NULL ) $args['message_reaction'] = $message_reaction;
      if ( $message_reaction_count !== NULL ) $args['message_reaction_count'] = $message_reaction_count;
      if ( $inline_query !== NULL ) $args['inline_query'] = $inline_query;
      if ( $chosen_inline_result !== NULL ) $args['chosen_inline_result'] = $chosen_inline_result;
      if ( $callback_query !== NULL ) $args['callback_query'] = $callback_query;
      if ( $shipping_query !== NULL ) $args['shipping_query'] = $shipping_query;
      if ( $pre_checkout_query !== NULL ) $args['pre_checkout_query'] = $pre_checkout_query;
      if ( $purchased_paid_media !== NULL ) $args['purchased_paid_media'] = $purchased_paid_media;
      if ( $poll !== NULL ) $args['poll'] = $poll;
      if ( $poll_answer !== NULL ) $args['poll_answer'] = $poll_answer;
      if ( $my_chat_member !== NULL ) $args['my_chat_member'] = $my_chat_member;
      if ( $chat_member !== NULL ) $args['chat_member'] = $chat_member;
      if ( $chat_join_request !== NULL ) $args['chat_join_request'] = $chat_join_request;
      if ( $chat_boost !== NULL ) $args['chat_boost'] = $chat_boost;
      if ( $removed_chat_boost !== NULL ) $args['removed_chat_boost'] = $removed_chat_boost;
      return $args;
    }

    /**
     * Describes the current status of a webhook.
     * 
     * @see https://core.telegram.org/bots/api#WebhookInfo
     *
     * @param string $url Webhook URL, may be empty if webhook is not set up
     * @param bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
     * @param int $pending_update_count Number of updates awaiting delivery
     * @param string|NULL $ip_address Currently used webhook IP address
     * @param int|NULL $last_error_date Unix time for the most recent error that happened when trying to deliver an update via webhook
     * @param string|NULL $last_error_message Error message in human-readable format for the most recent error that happened when trying to
     *                              deliver an update via webhook
     * @param int|NULL $last_synchronization_error_date Unix time of the most recent error that happened when trying to synchronize available updates with
     *                              Telegram datacenters
     * @param int|NULL $max_connections The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     * @param string[]|NULL $allowed_updates A list of update types the bot is subscribed to. Defaults to all update types except chat_member
     *
     * @return array $args
     */
    public function WebhookInfo ( string $url, bool $has_custom_certificate, int $pending_update_count, ?string $ip_address = NULL, ?int $last_error_date = NULL, ?string $last_error_message = NULL, ?int $last_synchronization_error_date = NULL, ?int $max_connections = NULL, ?array $allowed_updates = NULL ) : array {
      $args = [ 'url' => $url, 'has_custom_certificate' => $has_custom_certificate, 'pending_update_count' => $pending_update_count ]; 
      if ( $ip_address !== NULL ) $args['ip_address'] = $ip_address;
      if ( $last_error_date !== NULL ) $args['last_error_date'] = $last_error_date;
      if ( $last_error_message !== NULL ) $args['last_error_message'] = $last_error_message;
      if ( $last_synchronization_error_date !== NULL ) $args['last_synchronization_error_date'] = $last_synchronization_error_date;
      if ( $max_connections !== NULL ) $args['max_connections'] = $max_connections;
      if ( $allowed_updates !== NULL ) $args['allowed_updates'] = $allowed_updates;
      return $args;
    }

    /**
     * This object represents a Telegram user or bot.
     * 
     * @see https://core.telegram.org/bots/api#User
     *
     * @param int $id Unique identifier for this user or bot. This number may have more than 32 significant bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
     *                              significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param bool $is_bot True, if this user is a bot
     * @param string $first_name User's or bot's first name
     * @param string|NULL $last_name User's or bot's last name
     * @param string|NULL $username User's or bot's username
     * @param string|NULL $language_code IETF language tag of the user's language
     * @param bool|NULL $is_premium True, if this user is a Telegram Premium user
     * @param bool|NULL $added_to_attachment_menu True, if this user added the bot to the attachment menu
     * @param bool|NULL $can_join_groups True, if the bot can be invited to groups. Returned only in getMe.
     * @param bool|NULL $can_read_all_group_messages True, if privacy mode is disabled for the bot. Returned only in getMe.
     * @param bool|NULL $supports_inline_queries True, if the bot supports inline queries. Returned only in getMe.
     * @param bool|NULL $can_connect_to_business True, if the bot can be connected to a Telegram Business account to receive its messages. Returned
     *                              only in getMe.
     * @param bool|NULL $has_main_web_app True, if the bot has a main Web App. Returned only in getMe.
     *
     * @return array $args
     */
    public function User ( int $id, bool $is_bot, string $first_name, ?string $last_name = NULL, ?string $username = NULL, ?string $language_code = NULL, ?bool $is_premium = NULL, ?bool $added_to_attachment_menu = NULL, ?bool $can_join_groups = NULL, ?bool $can_read_all_group_messages = NULL, ?bool $supports_inline_queries = NULL, ?bool $can_connect_to_business = NULL, ?bool $has_main_web_app = NULL ) : array {
      $args = [ 'id' => $id, 'is_bot' => $is_bot, 'first_name' => $first_name ]; 
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $username !== NULL ) $args['username'] = $username;
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      if ( $is_premium !== NULL ) $args['is_premium'] = $is_premium;
      if ( $added_to_attachment_menu !== NULL ) $args['added_to_attachment_menu'] = $added_to_attachment_menu;
      if ( $can_join_groups !== NULL ) $args['can_join_groups'] = $can_join_groups;
      if ( $can_read_all_group_messages !== NULL ) $args['can_read_all_group_messages'] = $can_read_all_group_messages;
      if ( $supports_inline_queries !== NULL ) $args['supports_inline_queries'] = $supports_inline_queries;
      if ( $can_connect_to_business !== NULL ) $args['can_connect_to_business'] = $can_connect_to_business;
      if ( $has_main_web_app !== NULL ) $args['has_main_web_app'] = $has_main_web_app;
      return $args;
    }

    /**
     * This object represents a chat.
     * 
     * @see https://core.telegram.org/bots/api#Chat
     *
     * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
     *                              significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     *                              this identifier.
     * @param string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param string|NULL $title Title, for supergroups, channels and group chats
     * @param string|NULL $username Username, for private chats, supergroups and channels if available
     * @param string|NULL $first_name First name of the other party in a private chat
     * @param string|NULL $last_name Last name of the other party in a private chat
     * @param bool|NULL $is_forum True, if the supergroup chat is a forum (has topics enabled)
     *
     * @return array $args
     */
    public function Chat ( int $id, string $type, ?string $title = NULL, ?string $username = NULL, ?string $first_name = NULL, ?string $last_name = NULL, ?bool $is_forum = NULL ) : array {
      $args = [ 'id' => $id, 'type' => $type ]; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $username !== NULL ) $args['username'] = $username;
      if ( $first_name !== NULL ) $args['first_name'] = $first_name;
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $is_forum !== NULL ) $args['is_forum'] = $is_forum;
      return $args;
    }

    /**
     * This object contains full information about a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatFullInfo
     *
     * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
     *                              significant bits, so a signed 64-bit integer or double-precision float type are safe for storing
     *                              this identifier.
     * @param string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param string|NULL $title Title, for supergroups, channels and group chats
     * @param string|NULL $username Username, for private chats, supergroups and channels if available
     * @param string|NULL $first_name First name of the other party in a private chat
     * @param string|NULL $last_name Last name of the other party in a private chat
     * @param bool|NULL $is_forum True, if the supergroup chat is a forum (has topics enabled)
     * @param int $accent_color_id Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header,
     *                              and link preview. See accent colors for more details.
     * @param int $max_reaction_count The maximum number of reactions that can be set on a message in the chat
     * @param ChatPhoto|NULL $photo Chat photo
     * @param string[]|NULL $active_usernames If non-empty, the list of all active chat usernames; for private chats, supergroups and channels
     * @param Birthdate|NULL $birthdate For private chats, the date of birth of the user
     * @param BusinessIntro|NULL $business_intro For private chats with business accounts, the intro of the business
     * @param BusinessLocation|NULL $business_location For private chats with business accounts, the location of the business
     * @param BusinessOpeningHours|NULL $business_opening_hours For private chats with business accounts, the opening hours of the business
     * @param Chat|NULL $personal_chat For private chats, the personal channel of the user
     * @param ReactionType[]|NULL $available_reactions List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed.
     * @param string|NULL $background_custom_emoji_id Custom emoji identifier of the emoji chosen by the chat for the reply header and link preview background
     * @param int|NULL $profile_accent_color_id Identifier of the accent color for the chat's profile background. See profile accent colors for more
     *                              details.
     * @param string|NULL $profile_background_custom_emoji_id Custom emoji identifier of the emoji chosen by the chat for its profile background
     * @param string|NULL $emoji_status_custom_emoji_id Custom emoji identifier of the emoji status of the chat or the other party in a private chat
     * @param int|NULL $emoji_status_expiration_date Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time,
     *                              if any
     * @param string|NULL $bio Bio of the other party in a private chat
     * @param bool|NULL $has_private_forwards True, if privacy settings of the other party in the private chat allows to use
     *                              tg://user?id=<user_id> links only in chats with the user
     * @param bool|NULL $has_restricted_voice_and_video_messages True, if the privacy settings of the other party restrict sending voice and video note messages in
     *                              the private chat
     * @param bool|NULL $join_to_send_messages True, if users need to join the supergroup before they can send messages
     * @param bool|NULL $join_by_request True, if all users directly joining the supergroup without using an invite link need to be approved
     *                              by supergroup administrators
     * @param string|NULL $description Description, for groups, supergroups and channel chats
     * @param string|NULL $invite_link Primary invite link, for groups, supergroups and channel chats
     * @param Message|NULL $pinned_message The most recent pinned message (by sending date)
     * @param ChatPermissions|NULL $permissions Default chat member permissions, for groups and supergroups
     * @param AcceptedGiftTypes $accepted_gift_types Information about types of gifts that are accepted by the chat or by the corresponding user for
     *                              private chats
     * @param bool|NULL $can_send_paid_media True, if paid media messages can be sent or forwarded to the channel chat. The field is available
     *                              only for channel chats.
     * @param int|NULL $slow_mode_delay For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged
     *                              user; in seconds
     * @param int|NULL $unrestrict_boost_count For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to
     *                              ignore slow mode and chat permissions
     * @param int|NULL $message_auto_delete_time The time after which all messages sent to the chat will be automatically deleted; in seconds
     * @param bool|NULL $has_aggressive_anti_spam_enabled True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to
     *                              chat administrators.
     * @param bool|NULL $has_hidden_members True, if non-administrators can only get the list of bots and administrators in the chat
     * @param bool|NULL $has_protected_content True, if messages from the chat can't be forwarded to other chats
     * @param bool|NULL $has_visible_history True, if new chat members will have access to old messages; available only to chat administrators
     * @param string|NULL $sticker_set_name For supergroups, name of the group sticker set
     * @param bool|NULL $can_set_sticker_set True, if the bot can change the group sticker set
     * @param string|NULL $custom_emoji_sticker_set_name For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be
     *                              used by all users and bots in the group.
     * @param int|NULL $linked_chat_id Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice
     *                              versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it is smaller than
     *                              52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     * @param ChatLocation|NULL $location For supergroups, the location to which the supergroup is connected
     *
     * @return array $args
     */
    public function ChatFullInfo ( int $id, string $type, int $accent_color_id, int $max_reaction_count, array $accepted_gift_types, ?string $title = NULL, ?string $username = NULL, ?string $first_name = NULL, ?string $last_name = NULL, ?bool $is_forum = NULL, ?array $photo = NULL, ?array $active_usernames = NULL, ?array $birthdate = NULL, ?array $business_intro = NULL, ?array $business_location = NULL, ?array $business_opening_hours = NULL, ?array $personal_chat = NULL, ?array $available_reactions = NULL, ?string $background_custom_emoji_id = NULL, ?int $profile_accent_color_id = NULL, ?string $profile_background_custom_emoji_id = NULL, ?string $emoji_status_custom_emoji_id = NULL, ?int $emoji_status_expiration_date = NULL, ?string $bio = NULL, ?bool $has_private_forwards = NULL, ?bool $has_restricted_voice_and_video_messages = NULL, ?bool $join_to_send_messages = NULL, ?bool $join_by_request = NULL, ?string $description = NULL, ?string $invite_link = NULL, ?array $pinned_message = NULL, ?array $permissions = NULL, ?bool $can_send_paid_media = NULL, ?int $slow_mode_delay = NULL, ?int $unrestrict_boost_count = NULL, ?int $message_auto_delete_time = NULL, ?bool $has_aggressive_anti_spam_enabled = NULL, ?bool $has_hidden_members = NULL, ?bool $has_protected_content = NULL, ?bool $has_visible_history = NULL, ?string $sticker_set_name = NULL, ?bool $can_set_sticker_set = NULL, ?string $custom_emoji_sticker_set_name = NULL, ?int $linked_chat_id = NULL, ?array $location = NULL ) : array {
      $args = [ 'id' => $id, 'type' => $type, 'accent_color_id' => $accent_color_id, 'max_reaction_count' => $max_reaction_count, 'accepted_gift_types' => $accepted_gift_types ]; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $username !== NULL ) $args['username'] = $username;
      if ( $first_name !== NULL ) $args['first_name'] = $first_name;
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $is_forum !== NULL ) $args['is_forum'] = $is_forum;
      if ( $photo !== NULL ) $args['photo'] = $photo;
      if ( $active_usernames !== NULL ) $args['active_usernames'] = $active_usernames;
      if ( $birthdate !== NULL ) $args['birthdate'] = $birthdate;
      if ( $business_intro !== NULL ) $args['business_intro'] = $business_intro;
      if ( $business_location !== NULL ) $args['business_location'] = $business_location;
      if ( $business_opening_hours !== NULL ) $args['business_opening_hours'] = $business_opening_hours;
      if ( $personal_chat !== NULL ) $args['personal_chat'] = $personal_chat;
      if ( $available_reactions !== NULL ) $args['available_reactions'] = $available_reactions;
      if ( $background_custom_emoji_id !== NULL ) $args['background_custom_emoji_id'] = $background_custom_emoji_id;
      if ( $profile_accent_color_id !== NULL ) $args['profile_accent_color_id'] = $profile_accent_color_id;
      if ( $profile_background_custom_emoji_id !== NULL ) $args['profile_background_custom_emoji_id'] = $profile_background_custom_emoji_id;
      if ( $emoji_status_custom_emoji_id !== NULL ) $args['emoji_status_custom_emoji_id'] = $emoji_status_custom_emoji_id;
      if ( $emoji_status_expiration_date !== NULL ) $args['emoji_status_expiration_date'] = $emoji_status_expiration_date;
      if ( $bio !== NULL ) $args['bio'] = $bio;
      if ( $has_private_forwards !== NULL ) $args['has_private_forwards'] = $has_private_forwards;
      if ( $has_restricted_voice_and_video_messages !== NULL ) $args['has_restricted_voice_and_video_messages'] = $has_restricted_voice_and_video_messages;
      if ( $join_to_send_messages !== NULL ) $args['join_to_send_messages'] = $join_to_send_messages;
      if ( $join_by_request !== NULL ) $args['join_by_request'] = $join_by_request;
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $invite_link !== NULL ) $args['invite_link'] = $invite_link;
      if ( $pinned_message !== NULL ) $args['pinned_message'] = $pinned_message;
      if ( $permissions !== NULL ) $args['permissions'] = $permissions;
      if ( $can_send_paid_media !== NULL ) $args['can_send_paid_media'] = $can_send_paid_media;
      if ( $slow_mode_delay !== NULL ) $args['slow_mode_delay'] = $slow_mode_delay;
      if ( $unrestrict_boost_count !== NULL ) $args['unrestrict_boost_count'] = $unrestrict_boost_count;
      if ( $message_auto_delete_time !== NULL ) $args['message_auto_delete_time'] = $message_auto_delete_time;
      if ( $has_aggressive_anti_spam_enabled !== NULL ) $args['has_aggressive_anti_spam_enabled'] = $has_aggressive_anti_spam_enabled;
      if ( $has_hidden_members !== NULL ) $args['has_hidden_members'] = $has_hidden_members;
      if ( $has_protected_content !== NULL ) $args['has_protected_content'] = $has_protected_content;
      if ( $has_visible_history !== NULL ) $args['has_visible_history'] = $has_visible_history;
      if ( $sticker_set_name !== NULL ) $args['sticker_set_name'] = $sticker_set_name;
      if ( $can_set_sticker_set !== NULL ) $args['can_set_sticker_set'] = $can_set_sticker_set;
      if ( $custom_emoji_sticker_set_name !== NULL ) $args['custom_emoji_sticker_set_name'] = $custom_emoji_sticker_set_name;
      if ( $linked_chat_id !== NULL ) $args['linked_chat_id'] = $linked_chat_id;
      if ( $location !== NULL ) $args['location'] = $location;
      return $args;
    }

    /**
     * This object represents a message.
     * 
     * @see https://core.telegram.org/bots/api#Message
     *
     * @param int $message_id Unique message identifier inside this chat. In specific instances (e.g., message containing a video
     *                              sent to a big chat), the server might automatically schedule a message instead of sending it
     *                              immediately. In such cases, this field will be 0 and the relevant message will be unusable until it
     *                              is actually sent
     * @param int|NULL $message_thread_id Unique identifier of a message thread to which the message belongs; for supergroups only
     * @param User|NULL $from Sender of the message; may be empty for messages sent to channels. For backward compatibility, if
     *                              the message was sent on behalf of a chat, the field contains a fake sender user in non-channel chats
     * @param Chat|NULL $sender_chat Sender of the message when sent on behalf of a chat. For example, the supergroup itself for messages
     *                              sent by its anonymous administrators or a linked channel for messages automatically forwarded to the
     *                              channel's discussion group. For backward compatibility, if the message was sent on behalf of a chat,
     *                              the field from contains a fake sender user in non-channel chats.
     * @param int|NULL $sender_boost_count If the sender of the message boosted the chat, the number of boosts added by the user
     * @param User|NULL $sender_business_bot The bot that actually sent the message on behalf of the business account. Available only for
     *                              outgoing messages sent on behalf of the connected business account.
     * @param int $date Date the message was sent in Unix time. It is always a positive number, representing a valid date.
     * @param string|NULL $business_connection_id Unique identifier of the business connection from which the message was received. If non-empty, the
     *                              message belongs to a chat of the corresponding business account that is independent from any
     *                              potential bot chat which might share the same identifier.
     * @param Chat $chat Chat the message belongs to
     * @param MessageOrigin|NULL $forward_origin Information about the original message for forwarded messages
     * @param bool|NULL $is_topic_message True, if the message is sent to a forum topic
     * @param bool|NULL $is_automatic_forward True, if the message is a channel post that was automatically forwarded to the connected discussion group
     * @param Message|NULL $reply_to_message For replies in the same chat and message thread, the original message. Note that the Message object
     *                              in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param ExternalReplyInfo|NULL $external_reply Information about the message that is being replied to, which may come from another chat or forum topic
     * @param TextQuote|NULL $quote For replies that quote part of the original message, the quoted part of the message
     * @param Story|NULL $reply_to_story For replies to a story, the original story
     * @param User|NULL $via_bot Bot through which the message was sent
     * @param int|NULL $edit_date Date the message was last edited in Unix time
     * @param bool|NULL $has_protected_content True, if the message can't be forwarded
     * @param bool|NULL $is_from_offline True, if the message was sent by an implicit action, for example, as an away or a greeting business
     *                              message, or as a scheduled message
     * @param string|NULL $media_group_id The unique identifier of a media message group this message belongs to
     * @param string|NULL $author_signature Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     * @param int|NULL $paid_star_count The number of Telegram Stars that were paid by the sender of the message to send it
     * @param string|NULL $text For text messages, the actual UTF-8 text of the message
     * @param MessageEntity[]|NULL $entities For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * @param LinkPreviewOptions|NULL $link_preview_options Options used for link preview generation for the message, if it is a text message and link preview
     *                              options were changed
     * @param string|NULL $effect_id Unique identifier of the message effect added to the message
     * @param Animation|NULL $animation Message is an animation, information about the animation. For backward compatibility, when this
     *                              field is set, the document field will also be set
     * @param Audio|NULL $audio Message is an audio file, information about the file
     * @param Document|NULL $document Message is a general file, information about the file
     * @param PaidMediaInfo|NULL $paid_media Message contains paid media; information about the paid media
     * @param PhotoSize[]|NULL $photo Message is a photo, available sizes of the photo
     * @param Sticker|NULL $sticker Message is a sticker, information about the sticker
     * @param Story|NULL $story Message is a forwarded story
     * @param Video|NULL $video Message is a video, information about the video
     * @param VideoNote|NULL $video_note Message is a video note, information about the video message
     * @param Voice|NULL $voice Message is a voice message, information about the file
     * @param string|NULL $caption Caption for the animation, audio, document, paid media, photo, video or voice
     * @param MessageEntity[]|NULL $caption_entities For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear
     *                              in the caption
     * @param bool|NULL $show_caption_above_media True, if the caption must be shown above the message media
     * @param bool|NULL $has_media_spoiler True, if the message media is covered by a spoiler animation
     * @param Contact|NULL $contact Message is a shared contact, information about the contact
     * @param Dice|NULL $dice Message is a dice with random value
     * @param Game|NULL $game Message is a game, information about the game. More about games »
     * @param Poll|NULL $poll Message is a native poll, information about the poll
     * @param Venue|NULL $venue Message is a venue, information about the venue. For backward compatibility, when this field is set,
     *                              the location field will also be set
     * @param Location|NULL $location Message is a shared location, information about the location
     * @param User[]|NULL $new_chat_members New members that were added to the group or supergroup and information about them (the bot itself
     *                              may be one of these members)
     * @param User|NULL $left_chat_member A member was removed from the group, information about them (this member may be the bot itself)
     * @param string|NULL $new_chat_title A chat title was changed to this value
     * @param PhotoSize[]|NULL $new_chat_photo A chat photo was change to this value
     * @param bool|NULL $delete_chat_photo Service message: the chat photo was deleted
     * @param bool|NULL $group_chat_created Service message: the group has been created
     * @param bool|NULL $supergroup_chat_created Service message: the supergroup has been created. This field can't be received in a message coming
     *                              through updates, because bot can't be a member of a supergroup when it is created. It can only be
     *                              found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @param bool|NULL $channel_chat_created Service message: the channel has been created. This field can't be received in a message coming
     *                              through updates, because bot can't be a member of a channel when it is created. It can only be found
     *                              in reply_to_message if someone replies to a very first message in a channel.
     * @param MessageAutoDeleteTimerChanged|NULL $message_auto_delete_timer_changed Service message: auto-delete timer settings changed in the chat
     * @param int|NULL $migrate_to_chat_id The group has been migrated to a supergroup with the specified identifier. This number may have more
     *                              than 32 significant bits and some programming languages may have difficulty/silent defects in
     *                              interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or
     *                              double-precision float type are safe for storing this identifier.
     * @param int|NULL $migrate_from_chat_id The supergroup has been migrated from a group with the specified identifier. This number may have
     *                              more than 32 significant bits and some programming languages may have difficulty/silent defects in
     *                              interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or
     *                              double-precision float type are safe for storing this identifier.
     * @param MaybeInaccessibleMessage|NULL $pinned_message Specified message was pinned. Note that the Message object in this field will not contain further
     *                              reply_to_message fields even if it itself is a reply.
     * @param Invoice|NULL $invoice Message is an invoice for a payment, information about the invoice. More about payments »
     * @param SuccessfulPayment|NULL $successful_payment Message is a service message about a successful payment, information about the payment. More about
     *                              payments »
     * @param RefundedPayment|NULL $refunded_payment Message is a service message about a refunded payment, information about the payment. More about
     *                              payments »
     * @param UsersShared|NULL $users_shared Service message: users were shared with the bot
     * @param ChatShared|NULL $chat_shared Service message: a chat was shared with the bot
     * @param GiftInfo|NULL $gift Service message: a regular gift was sent or received
     * @param UniqueGiftInfo|NULL $unique_gift Service message: a unique gift was sent or received
     * @param string|NULL $connected_website The domain name of the website on which the user has logged in. More about Telegram Login »
     * @param WriteAccessAllowed|NULL $write_access_allowed Service message: the user allowed the bot to write messages after adding it to the attachment or
     *                              side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by
     *                              the method requestWriteAccess
     * @param PassportData|NULL $passport_data Telegram Passport data
     * @param ProximityAlertTriggered|NULL $proximity_alert_triggered Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     * @param ChatBoostAdded|NULL $boost_added Service message: user boosted the chat
     * @param ChatBackground|NULL $chat_background_set Service message: chat background set
     * @param ForumTopicCreated|NULL $forum_topic_created Service message: forum topic created
     * @param ForumTopicEdited|NULL $forum_topic_edited Service message: forum topic edited
     * @param ForumTopicClosed|NULL $forum_topic_closed Service message: forum topic closed
     * @param ForumTopicReopened|NULL $forum_topic_reopened Service message: forum topic reopened
     * @param GeneralForumTopicHidden|NULL $general_forum_topic_hidden Service message: the 'General' forum topic hidden
     * @param GeneralForumTopicUnhidden|NULL $general_forum_topic_unhidden Service message: the 'General' forum topic unhidden
     * @param GiveawayCreated|NULL $giveaway_created Service message: a scheduled giveaway was created
     * @param Giveaway|NULL $giveaway The message is a scheduled giveaway message
     * @param GiveawayWinners|NULL $giveaway_winners A giveaway with public winners was completed
     * @param GiveawayCompleted|NULL $giveaway_completed Service message: a giveaway without public winners was completed
     * @param PaidMessagePriceChanged|NULL $paid_message_price_changed Service message: the price for paid messages has changed in the chat
     * @param VideoChatScheduled|NULL $video_chat_scheduled Service message: video chat scheduled
     * @param VideoChatStarted|NULL $video_chat_started Service message: video chat started
     * @param VideoChatEnded|NULL $video_chat_ended Service message: video chat ended
     * @param VideoChatParticipantsInvited|NULL $video_chat_participants_invited Service message: new participants invited to a video chat
     * @param WebAppData|NULL $web_app_data Service message: data sent by a Web App
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     *
     * @return array $args
     */
    public function Message ( int $message_id, int $date, array $chat, ?int $message_thread_id = NULL, ?array $from = NULL, ?array $sender_chat = NULL, ?int $sender_boost_count = NULL, ?array $sender_business_bot = NULL, ?string $business_connection_id = NULL, ?array $forward_origin = NULL, ?bool $is_topic_message = NULL, ?bool $is_automatic_forward = NULL, ?array $reply_to_message = NULL, ?array $external_reply = NULL, ?array $quote = NULL, ?array $reply_to_story = NULL, ?array $via_bot = NULL, ?int $edit_date = NULL, ?bool $has_protected_content = NULL, ?bool $is_from_offline = NULL, ?string $media_group_id = NULL, ?string $author_signature = NULL, ?int $paid_star_count = NULL, ?string $text = NULL, ?array $entities = NULL, ?array $link_preview_options = NULL, ?string $effect_id = NULL, ?array $animation = NULL, ?array $audio = NULL, ?array $document = NULL, ?array $paid_media = NULL, ?array $photo = NULL, ?array $sticker = NULL, ?array $story = NULL, ?array $video = NULL, ?array $video_note = NULL, ?array $voice = NULL, ?string $caption = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $has_media_spoiler = NULL, ?array $contact = NULL, ?array $dice = NULL, ?array $game = NULL, ?array $poll = NULL, ?array $venue = NULL, ?array $location = NULL, ?array $new_chat_members = NULL, ?array $left_chat_member = NULL, ?string $new_chat_title = NULL, ?array $new_chat_photo = NULL, ?bool $delete_chat_photo = NULL, ?bool $group_chat_created = NULL, ?bool $supergroup_chat_created = NULL, ?bool $channel_chat_created = NULL, ?array $message_auto_delete_timer_changed = NULL, ?int $migrate_to_chat_id = NULL, ?int $migrate_from_chat_id = NULL, ?array $pinned_message = NULL, ?array $invoice = NULL, ?array $successful_payment = NULL, ?array $refunded_payment = NULL, ?array $users_shared = NULL, ?array $chat_shared = NULL, ?array $gift = NULL, ?array $unique_gift = NULL, ?string $connected_website = NULL, ?array $write_access_allowed = NULL, ?array $passport_data = NULL, ?array $proximity_alert_triggered = NULL, ?array $boost_added = NULL, ?array $chat_background_set = NULL, ?array $forum_topic_created = NULL, ?array $forum_topic_edited = NULL, ?array $forum_topic_closed = NULL, ?array $forum_topic_reopened = NULL, ?array $general_forum_topic_hidden = NULL, ?array $general_forum_topic_unhidden = NULL, ?array $giveaway_created = NULL, ?array $giveaway = NULL, ?array $giveaway_winners = NULL, ?array $giveaway_completed = NULL, ?array $paid_message_price_changed = NULL, ?array $video_chat_scheduled = NULL, ?array $video_chat_started = NULL, ?array $video_chat_ended = NULL, ?array $video_chat_participants_invited = NULL, ?array $web_app_data = NULL, ?array $reply_markup = NULL ) : array {
      $args = [ 'message_id' => $message_id, 'date' => $date, 'chat' => $chat ]; 
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $from !== NULL ) $args['from'] = $from;
      if ( $sender_chat !== NULL ) $args['sender_chat'] = $sender_chat;
      if ( $sender_boost_count !== NULL ) $args['sender_boost_count'] = $sender_boost_count;
      if ( $sender_business_bot !== NULL ) $args['sender_business_bot'] = $sender_business_bot;
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $forward_origin !== NULL ) $args['forward_origin'] = $forward_origin;
      if ( $is_topic_message !== NULL ) $args['is_topic_message'] = $is_topic_message;
      if ( $is_automatic_forward !== NULL ) $args['is_automatic_forward'] = $is_automatic_forward;
      if ( $reply_to_message !== NULL ) $args['reply_to_message'] = $reply_to_message;
      if ( $external_reply !== NULL ) $args['external_reply'] = $external_reply;
      if ( $quote !== NULL ) $args['quote'] = $quote;
      if ( $reply_to_story !== NULL ) $args['reply_to_story'] = $reply_to_story;
      if ( $via_bot !== NULL ) $args['via_bot'] = $via_bot;
      if ( $edit_date !== NULL ) $args['edit_date'] = $edit_date;
      if ( $has_protected_content !== NULL ) $args['has_protected_content'] = $has_protected_content;
      if ( $is_from_offline !== NULL ) $args['is_from_offline'] = $is_from_offline;
      if ( $media_group_id !== NULL ) $args['media_group_id'] = $media_group_id;
      if ( $author_signature !== NULL ) $args['author_signature'] = $author_signature;
      if ( $paid_star_count !== NULL ) $args['paid_star_count'] = $paid_star_count;
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $entities !== NULL ) $args['entities'] = $entities;
      if ( $link_preview_options !== NULL ) $args['link_preview_options'] = $link_preview_options;
      if ( $effect_id !== NULL ) $args['effect_id'] = $effect_id;
      if ( $animation !== NULL ) $args['animation'] = $animation;
      if ( $audio !== NULL ) $args['audio'] = $audio;
      if ( $document !== NULL ) $args['document'] = $document;
      if ( $paid_media !== NULL ) $args['paid_media'] = $paid_media;
      if ( $photo !== NULL ) $args['photo'] = $photo;
      if ( $sticker !== NULL ) $args['sticker'] = $sticker;
      if ( $story !== NULL ) $args['story'] = $story;
      if ( $video !== NULL ) $args['video'] = $video;
      if ( $video_note !== NULL ) $args['video_note'] = $video_note;
      if ( $voice !== NULL ) $args['voice'] = $voice;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $has_media_spoiler !== NULL ) $args['has_media_spoiler'] = $has_media_spoiler;
      if ( $contact !== NULL ) $args['contact'] = $contact;
      if ( $dice !== NULL ) $args['dice'] = $dice;
      if ( $game !== NULL ) $args['game'] = $game;
      if ( $poll !== NULL ) $args['poll'] = $poll;
      if ( $venue !== NULL ) $args['venue'] = $venue;
      if ( $location !== NULL ) $args['location'] = $location;
      if ( $new_chat_members !== NULL ) $args['new_chat_members'] = $new_chat_members;
      if ( $left_chat_member !== NULL ) $args['left_chat_member'] = $left_chat_member;
      if ( $new_chat_title !== NULL ) $args['new_chat_title'] = $new_chat_title;
      if ( $new_chat_photo !== NULL ) $args['new_chat_photo'] = $new_chat_photo;
      if ( $delete_chat_photo !== NULL ) $args['delete_chat_photo'] = $delete_chat_photo;
      if ( $group_chat_created !== NULL ) $args['group_chat_created'] = $group_chat_created;
      if ( $supergroup_chat_created !== NULL ) $args['supergroup_chat_created'] = $supergroup_chat_created;
      if ( $channel_chat_created !== NULL ) $args['channel_chat_created'] = $channel_chat_created;
      if ( $message_auto_delete_timer_changed !== NULL ) $args['message_auto_delete_timer_changed'] = $message_auto_delete_timer_changed;
      if ( $migrate_to_chat_id !== NULL ) $args['migrate_to_chat_id'] = $migrate_to_chat_id;
      if ( $migrate_from_chat_id !== NULL ) $args['migrate_from_chat_id'] = $migrate_from_chat_id;
      if ( $pinned_message !== NULL ) $args['pinned_message'] = $pinned_message;
      if ( $invoice !== NULL ) $args['invoice'] = $invoice;
      if ( $successful_payment !== NULL ) $args['successful_payment'] = $successful_payment;
      if ( $refunded_payment !== NULL ) $args['refunded_payment'] = $refunded_payment;
      if ( $users_shared !== NULL ) $args['users_shared'] = $users_shared;
      if ( $chat_shared !== NULL ) $args['chat_shared'] = $chat_shared;
      if ( $gift !== NULL ) $args['gift'] = $gift;
      if ( $unique_gift !== NULL ) $args['unique_gift'] = $unique_gift;
      if ( $connected_website !== NULL ) $args['connected_website'] = $connected_website;
      if ( $write_access_allowed !== NULL ) $args['write_access_allowed'] = $write_access_allowed;
      if ( $passport_data !== NULL ) $args['passport_data'] = $passport_data;
      if ( $proximity_alert_triggered !== NULL ) $args['proximity_alert_triggered'] = $proximity_alert_triggered;
      if ( $boost_added !== NULL ) $args['boost_added'] = $boost_added;
      if ( $chat_background_set !== NULL ) $args['chat_background_set'] = $chat_background_set;
      if ( $forum_topic_created !== NULL ) $args['forum_topic_created'] = $forum_topic_created;
      if ( $forum_topic_edited !== NULL ) $args['forum_topic_edited'] = $forum_topic_edited;
      if ( $forum_topic_closed !== NULL ) $args['forum_topic_closed'] = $forum_topic_closed;
      if ( $forum_topic_reopened !== NULL ) $args['forum_topic_reopened'] = $forum_topic_reopened;
      if ( $general_forum_topic_hidden !== NULL ) $args['general_forum_topic_hidden'] = $general_forum_topic_hidden;
      if ( $general_forum_topic_unhidden !== NULL ) $args['general_forum_topic_unhidden'] = $general_forum_topic_unhidden;
      if ( $giveaway_created !== NULL ) $args['giveaway_created'] = $giveaway_created;
      if ( $giveaway !== NULL ) $args['giveaway'] = $giveaway;
      if ( $giveaway_winners !== NULL ) $args['giveaway_winners'] = $giveaway_winners;
      if ( $giveaway_completed !== NULL ) $args['giveaway_completed'] = $giveaway_completed;
      if ( $paid_message_price_changed !== NULL ) $args['paid_message_price_changed'] = $paid_message_price_changed;
      if ( $video_chat_scheduled !== NULL ) $args['video_chat_scheduled'] = $video_chat_scheduled;
      if ( $video_chat_started !== NULL ) $args['video_chat_started'] = $video_chat_started;
      if ( $video_chat_ended !== NULL ) $args['video_chat_ended'] = $video_chat_ended;
      if ( $video_chat_participants_invited !== NULL ) $args['video_chat_participants_invited'] = $video_chat_participants_invited;
      if ( $web_app_data !== NULL ) $args['web_app_data'] = $web_app_data;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      return $args;
    }

    /**
     * This object represents a unique message identifier.
     * 
     * @see https://core.telegram.org/bots/api#MessageId
     *
     * @param int $message_id Unique message identifier. In specific instances (e.g., message containing a video sent to a big
     *                              chat), the server might automatically schedule a message instead of sending it immediately. In such
     *                              cases, this field will be 0 and the relevant message will be unusable until it is actually sent
     *
     * @return array $args
     */
    public function MessageId ( int $message_id ) : array {
      return [ 'message_id' => $message_id ];
    }

    /**
     * This object describes a message that was deleted or is otherwise inaccessible to the bot.
     * 
     * @see https://core.telegram.org/bots/api#InaccessibleMessage
     *
     * @param Chat $chat Chat the message belonged to
     * @param int $message_id Unique message identifier inside the chat
     * @param int $date Always 0. The field can be used to differentiate regular and inaccessible messages.
     *
     * @return array $args
     */
    public function InaccessibleMessage ( array $chat, int $message_id, int $date ) : array {
      return [ 'chat' => $chat, 'message_id' => $message_id, 'date' => $date ];
    }

    /**
     * This object describes a message that can be inaccessible to the bot. It can be one of
     * 
     * @see https://core.telegram.org/bots/api#MaybeInaccessibleMessage
     *
     *
     * @return array $args
     */
    public function MaybeInaccessibleMessage ( ) : array {
      return [];
    }

    /**
     * This object represents one special entity in a text message. For example, hashtags, usernames, URLs,
     * etc.
     * 
     * @see https://core.telegram.org/bots/api#MessageEntity
     *
     * @param string $type Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag or
     *                              #hashtag@chatusername), “cashtag” ($USD or $USD@chatusername), “bot_command”
     *                              (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org),
     *                              “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text),
     *                              “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler
     *                              message), “blockquote” (block quotation), “expandable_blockquote” (collapsed-by-default
     *                              block quotation), “code” (monowidth string), “pre” (monowidth block), “text_link” (for
     *                              clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for
     *                              inline custom emoji stickers)
     * @param int $offset Offset in UTF-16 code units to the start of the entity
     * @param int $length Length of the entity in UTF-16 code units
     * @param string|NULL $url For “text_link” only, URL that will be opened after user taps on the text
     * @param User|NULL $user For “text_mention” only, the mentioned user
     * @param string|NULL $language For “pre” only, the programming language of the entity text
     * @param string|NULL $custom_emoji_id For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to
     *                              get full information about the sticker
     *
     * @return array $args
     */
    public function MessageEntity ( string $type, int $offset, int $length, ?string $url = NULL, ?array $user = NULL, ?string $language = NULL, ?string $custom_emoji_id = NULL ) : array {
      $args = [ 'type' => $type, 'offset' => $offset, 'length' => $length ]; 
      if ( $url !== NULL ) $args['url'] = $url;
      if ( $user !== NULL ) $args['user'] = $user;
      if ( $language !== NULL ) $args['language'] = $language;
      if ( $custom_emoji_id !== NULL ) $args['custom_emoji_id'] = $custom_emoji_id;
      return $args;
    }

    /**
     * This object contains information about the quoted part of a message that is replied to by the given message.
     * 
     * @see https://core.telegram.org/bots/api#TextQuote
     *
     * @param string $text Text of the quoted part of a message that is replied to by the given message
     * @param MessageEntity[]|NULL $entities Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough,
     *                              spoiler, and custom_emoji entities are kept in quotes.
     * @param int $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
     * @param bool|NULL $is_manual True, if the quote was chosen manually by the message sender. Otherwise, the quote was added
     *                              automatically by the server.
     *
     * @return array $args
     */
    public function TextQuote ( string $text, int $position, ?array $entities = NULL, ?bool $is_manual = NULL ) : array {
      $args = [ 'text' => $text, 'position' => $position ]; 
      if ( $entities !== NULL ) $args['entities'] = $entities;
      if ( $is_manual !== NULL ) $args['is_manual'] = $is_manual;
      return $args;
    }

    /**
     * This object contains information about a message that is being replied to, which may come from
     * another chat or forum topic.
     * 
     * @see https://core.telegram.org/bots/api#ExternalReplyInfo
     *
     * @param MessageOrigin $origin Origin of the message replied to by the given message
     * @param Chat|NULL $chat Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
     * @param int|NULL $message_id Unique message identifier inside the original chat. Available only if the original chat is a
     *                              supergroup or a channel.
     * @param LinkPreviewOptions|NULL $link_preview_options Options used for link preview generation for the original message, if it is a text message
     * @param Animation|NULL $animation Message is an animation, information about the animation
     * @param Audio|NULL $audio Message is an audio file, information about the file
     * @param Document|NULL $document Message is a general file, information about the file
     * @param PaidMediaInfo|NULL $paid_media Message contains paid media; information about the paid media
     * @param PhotoSize[]|NULL $photo Message is a photo, available sizes of the photo
     * @param Sticker|NULL $sticker Message is a sticker, information about the sticker
     * @param Story|NULL $story Message is a forwarded story
     * @param Video|NULL $video Message is a video, information about the video
     * @param VideoNote|NULL $video_note Message is a video note, information about the video message
     * @param Voice|NULL $voice Message is a voice message, information about the file
     * @param bool|NULL $has_media_spoiler True, if the message media is covered by a spoiler animation
     * @param Contact|NULL $contact Message is a shared contact, information about the contact
     * @param Dice|NULL $dice Message is a dice with random value
     * @param Game|NULL $game Message is a game, information about the game. More about games »
     * @param Giveaway|NULL $giveaway Message is a scheduled giveaway, information about the giveaway
     * @param GiveawayWinners|NULL $giveaway_winners A giveaway with public winners was completed
     * @param Invoice|NULL $invoice Message is an invoice for a payment, information about the invoice. More about payments »
     * @param Location|NULL $location Message is a shared location, information about the location
     * @param Poll|NULL $poll Message is a native poll, information about the poll
     * @param Venue|NULL $venue Message is a venue, information about the venue
     *
     * @return array $args
     */
    public function ExternalReplyInfo ( array $origin, ?array $chat = NULL, ?int $message_id = NULL, ?array $link_preview_options = NULL, ?array $animation = NULL, ?array $audio = NULL, ?array $document = NULL, ?array $paid_media = NULL, ?array $photo = NULL, ?array $sticker = NULL, ?array $story = NULL, ?array $video = NULL, ?array $video_note = NULL, ?array $voice = NULL, ?bool $has_media_spoiler = NULL, ?array $contact = NULL, ?array $dice = NULL, ?array $game = NULL, ?array $giveaway = NULL, ?array $giveaway_winners = NULL, ?array $invoice = NULL, ?array $location = NULL, ?array $poll = NULL, ?array $venue = NULL ) : array {
      $args = [ 'origin' => $origin ]; 
      if ( $chat !== NULL ) $args['chat'] = $chat;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $link_preview_options !== NULL ) $args['link_preview_options'] = $link_preview_options;
      if ( $animation !== NULL ) $args['animation'] = $animation;
      if ( $audio !== NULL ) $args['audio'] = $audio;
      if ( $document !== NULL ) $args['document'] = $document;
      if ( $paid_media !== NULL ) $args['paid_media'] = $paid_media;
      if ( $photo !== NULL ) $args['photo'] = $photo;
      if ( $sticker !== NULL ) $args['sticker'] = $sticker;
      if ( $story !== NULL ) $args['story'] = $story;
      if ( $video !== NULL ) $args['video'] = $video;
      if ( $video_note !== NULL ) $args['video_note'] = $video_note;
      if ( $voice !== NULL ) $args['voice'] = $voice;
      if ( $has_media_spoiler !== NULL ) $args['has_media_spoiler'] = $has_media_spoiler;
      if ( $contact !== NULL ) $args['contact'] = $contact;
      if ( $dice !== NULL ) $args['dice'] = $dice;
      if ( $game !== NULL ) $args['game'] = $game;
      if ( $giveaway !== NULL ) $args['giveaway'] = $giveaway;
      if ( $giveaway_winners !== NULL ) $args['giveaway_winners'] = $giveaway_winners;
      if ( $invoice !== NULL ) $args['invoice'] = $invoice;
      if ( $location !== NULL ) $args['location'] = $location;
      if ( $poll !== NULL ) $args['poll'] = $poll;
      if ( $venue !== NULL ) $args['venue'] = $venue;
      return $args;
    }

    /**
     * Describes reply parameters for the message that is being sent.
     * 
     * @see https://core.telegram.org/bots/api#ReplyParameters
     *
     * @param int $message_id Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it
     *                              is specified
     * @param int|string|NULL $chat_id If the message to be replied to is from a different chat, unique identifier for the chat or username
     *                              of the channel (in the format @channelusername). Not supported for messages sent on behalf of a
     *                              business account.
     * @param bool|NULL $allow_sending_without_reply Pass True if the message should be sent even if the specified message to be replied to is not found.
     *                              Always False for replies in another chat or forum topic. Always True for messages sent on behalf of
     *                              a business account.
     * @param string|NULL $quote Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote
     *                              must be an exact substring of the message to be replied to, including bold, italic, underline,
     *                              strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't
     *                              found in the original message.
     * @param string|NULL $quote_parse_mode Mode for parsing entities in the quote. See formatting options for more details.
     * @param MessageEntity[]|NULL $quote_entities A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
     * @param int|NULL $quote_position Position of the quote in the original message in UTF-16 code units
     *
     * @return array $args
     */
    public function ReplyParameters ( int $message_id, int|string|null $chat_id = NULL, ?bool $allow_sending_without_reply = NULL, ?string $quote = NULL, ?string $quote_parse_mode = NULL, ?array $quote_entities = NULL, ?int $quote_position = NULL ) : array {
      $args = [ 'message_id' => $message_id ]; 
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $allow_sending_without_reply !== NULL ) $args['allow_sending_without_reply'] = $allow_sending_without_reply;
      if ( $quote !== NULL ) $args['quote'] = $quote;
      if ( $quote_parse_mode !== NULL ) $args['quote_parse_mode'] = $quote_parse_mode;
      if ( $quote_entities !== NULL ) $args['quote_entities'] = $quote_entities;
      if ( $quote_position !== NULL ) $args['quote_position'] = $quote_position;
      return $args;
    }

    /**
     * This object describes the origin of a message. It can be one of
     * 
     * @see https://core.telegram.org/bots/api#MessageOrigin
     *
     *
     * @return array $args
     */
    public function MessageOrigin ( ) : array {
      return [];
    }

    /**
     * The message was originally sent by a known user.
     * 
     * @see https://core.telegram.org/bots/api#MessageOriginUser
     *
     * @param string $type Type of the message origin, always “user”
     * @param int $date Date the message was sent originally in Unix time
     * @param User $sender_user User that sent the message originally
     *
     * @return array $args
     */
    public function MessageOriginUser ( string $type = 'user', int $date, array $sender_user ) : array {
      return [ 'type' => $type, 'date' => $date, 'sender_user' => $sender_user ];
    }

    /**
     * The message was originally sent by an unknown user.
     * 
     * @see https://core.telegram.org/bots/api#MessageOriginHiddenUser
     *
     * @param string $type Type of the message origin, always “hidden_user”
     * @param int $date Date the message was sent originally in Unix time
     * @param string $sender_user_name Name of the user that sent the message originally
     *
     * @return array $args
     */
    public function MessageOriginHiddenUser ( string $type = 'hidden_user', int $date, string $sender_user_name ) : array {
      return [ 'type' => $type, 'date' => $date, 'sender_user_name' => $sender_user_name ];
    }

    /**
     * The message was originally sent on behalf of a chat to a group chat.
     * 
     * @see https://core.telegram.org/bots/api#MessageOriginChat
     *
     * @param string $type Type of the message origin, always “chat”
     * @param int $date Date the message was sent originally in Unix time
     * @param Chat $sender_chat Chat that sent the message originally
     * @param string|NULL $author_signature For messages originally sent by an anonymous chat administrator, original message author signature
     *
     * @return array $args
     */
    public function MessageOriginChat ( string $type = 'chat', int $date, array $sender_chat, ?string $author_signature = NULL ) : array {
      $args = [ 'type' => $type, 'date' => $date, 'sender_chat' => $sender_chat ]; 
      if ( $author_signature !== NULL ) $args['author_signature'] = $author_signature;
      return $args;
    }

    /**
     * The message was originally sent to a channel chat.
     * 
     * @see https://core.telegram.org/bots/api#MessageOriginChannel
     *
     * @param string $type Type of the message origin, always “channel”
     * @param int $date Date the message was sent originally in Unix time
     * @param Chat $chat Channel chat to which the message was originally sent
     * @param int $message_id Unique message identifier inside the chat
     * @param string|NULL $author_signature Signature of the original post author
     *
     * @return array $args
     */
    public function MessageOriginChannel ( string $type = 'channel', int $date, array $chat, int $message_id, ?string $author_signature = NULL ) : array {
      $args = [ 'type' => $type, 'date' => $date, 'chat' => $chat, 'message_id' => $message_id ]; 
      if ( $author_signature !== NULL ) $args['author_signature'] = $author_signature;
      return $args;
    }

    /**
     * This object represents one size of a photo or a file / sticker thumbnail.
     * 
     * @see https://core.telegram.org/bots/api#PhotoSize
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $width Photo width
     * @param int $height Photo height
     * @param int|NULL $file_size File size in bytes
     *
     * @return array $args
     */
    public function PhotoSize ( string $file_id, string $file_unique_id, int $width, int $height, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'width' => $width, 'height' => $height ]; 
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
     * 
     * @see https://core.telegram.org/bots/api#Animation
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $width Video width as defined by the sender
     * @param int $height Video height as defined by the sender
     * @param int $duration Duration of the video in seconds as defined by the sender
     * @param PhotoSize|NULL $thumbnail Animation thumbnail as defined by the sender
     * @param string|NULL $file_name Original animation filename as defined by the sender
     * @param string|NULL $mime_type MIME type of the file as defined by the sender
     * @param int|NULL $file_size File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                              difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
     *                              64-bit integer or double-precision float type are safe for storing this value.
     *
     * @return array $args
     */
    public function Animation ( string $file_id, string $file_unique_id, int $width, int $height, int $duration, ?array $thumbnail = NULL, ?string $file_name = NULL, ?string $mime_type = NULL, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'width' => $width, 'height' => $height, 'duration' => $duration ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $file_name !== NULL ) $args['file_name'] = $file_name;
      if ( $mime_type !== NULL ) $args['mime_type'] = $mime_type;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * This object represents an audio file to be treated as music by the Telegram clients.
     * 
     * @see https://core.telegram.org/bots/api#Audio
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $duration Duration of the audio in seconds as defined by the sender
     * @param string|NULL $performer Performer of the audio as defined by the sender or by audio tags
     * @param string|NULL $title Title of the audio as defined by the sender or by audio tags
     * @param string|NULL $file_name Original filename as defined by the sender
     * @param string|NULL $mime_type MIME type of the file as defined by the sender
     * @param int|NULL $file_size File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                              difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
     *                              64-bit integer or double-precision float type are safe for storing this value.
     * @param PhotoSize|NULL $thumbnail Thumbnail of the album cover to which the music file belongs
     *
     * @return array $args
     */
    public function Audio ( string $file_id, string $file_unique_id, int $duration, ?string $performer = NULL, ?string $title = NULL, ?string $file_name = NULL, ?string $mime_type = NULL, ?int $file_size = NULL, ?array $thumbnail = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'duration' => $duration ]; 
      if ( $performer !== NULL ) $args['performer'] = $performer;
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $file_name !== NULL ) $args['file_name'] = $file_name;
      if ( $mime_type !== NULL ) $args['mime_type'] = $mime_type;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      return $args;
    }

    /**
     * This object represents a general file (as opposed to photos, voice messages and audio files).
     * 
     * @see https://core.telegram.org/bots/api#Document
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param PhotoSize|NULL $thumbnail Document thumbnail as defined by the sender
     * @param string|NULL $file_name Original filename as defined by the sender
     * @param string|NULL $mime_type MIME type of the file as defined by the sender
     * @param int|NULL $file_size File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                              difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
     *                              64-bit integer or double-precision float type are safe for storing this value.
     *
     * @return array $args
     */
    public function Document ( string $file_id, string $file_unique_id, ?array $thumbnail = NULL, ?string $file_name = NULL, ?string $mime_type = NULL, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $file_name !== NULL ) $args['file_name'] = $file_name;
      if ( $mime_type !== NULL ) $args['mime_type'] = $mime_type;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * This object represents a story.
     * 
     * @see https://core.telegram.org/bots/api#Story
     *
     * @param Chat $chat Chat that posted the story
     * @param int $id Unique identifier for the story in the chat
     *
     * @return array $args
     */
    public function Story ( array $chat, int $id ) : array {
      return [ 'chat' => $chat, 'id' => $id ];
    }

    /**
     * This object represents a video file.
     * 
     * @see https://core.telegram.org/bots/api#Video
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $width Video width as defined by the sender
     * @param int $height Video height as defined by the sender
     * @param int $duration Duration of the video in seconds as defined by the sender
     * @param PhotoSize|NULL $thumbnail Video thumbnail
     * @param PhotoSize[]|NULL $cover Available sizes of the cover of the video in the message
     * @param int|NULL $start_timestamp Timestamp in seconds from which the video will play in the message
     * @param string|NULL $file_name Original filename as defined by the sender
     * @param string|NULL $mime_type MIME type of the file as defined by the sender
     * @param int|NULL $file_size File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                              difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
     *                              64-bit integer or double-precision float type are safe for storing this value.
     *
     * @return array $args
     */
    public function Video ( string $file_id, string $file_unique_id, int $width, int $height, int $duration, ?array $thumbnail = NULL, ?array $cover = NULL, ?int $start_timestamp = NULL, ?string $file_name = NULL, ?string $mime_type = NULL, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'width' => $width, 'height' => $height, 'duration' => $duration ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $cover !== NULL ) $args['cover'] = $cover;
      if ( $start_timestamp !== NULL ) $args['start_timestamp'] = $start_timestamp;
      if ( $file_name !== NULL ) $args['file_name'] = $file_name;
      if ( $mime_type !== NULL ) $args['mime_type'] = $mime_type;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * This object represents a video message (available in Telegram apps as of v.4.0).
     * 
     * @see https://core.telegram.org/bots/api#VideoNote
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $length Video width and height (diameter of the video message) as defined by the sender
     * @param int $duration Duration of the video in seconds as defined by the sender
     * @param PhotoSize|NULL $thumbnail Video thumbnail
     * @param int|NULL $file_size File size in bytes
     *
     * @return array $args
     */
    public function VideoNote ( string $file_id, string $file_unique_id, int $length, int $duration, ?array $thumbnail = NULL, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'length' => $length, 'duration' => $duration ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * This object represents a voice note.
     * 
     * @see https://core.telegram.org/bots/api#Voice
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $duration Duration of the audio in seconds as defined by the sender
     * @param string|NULL $mime_type MIME type of the file as defined by the sender
     * @param int|NULL $file_size File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                              difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
     *                              64-bit integer or double-precision float type are safe for storing this value.
     *
     * @return array $args
     */
    public function Voice ( string $file_id, string $file_unique_id, int $duration, ?string $mime_type = NULL, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'duration' => $duration ]; 
      if ( $mime_type !== NULL ) $args['mime_type'] = $mime_type;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * Describes the paid media added to a message.
     * 
     * @see https://core.telegram.org/bots/api#PaidMediaInfo
     *
     * @param int $star_count The number of Telegram Stars that must be paid to buy access to the media
     * @param PaidMedia[] $paid_media Information about the paid media
     *
     * @return array $args
     */
    public function PaidMediaInfo ( int $star_count, array $paid_media ) : array {
      return [ 'star_count' => $star_count, 'paid_media' => $paid_media ];
    }

    /**
     * This object describes paid media. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#PaidMedia
     *
     *
     * @return array $args
     */
    public function PaidMedia ( ) : array {
      return [];
    }

    /**
     * The paid media isn't available before the payment.
     * 
     * @see https://core.telegram.org/bots/api#PaidMediaPreview
     *
     * @param string $type Type of the paid media, always “preview”
     * @param int|NULL $width Media width as defined by the sender
     * @param int|NULL $height Media height as defined by the sender
     * @param int|NULL $duration Duration of the media in seconds as defined by the sender
     *
     * @return array $args
     */
    public function PaidMediaPreview ( string $type = 'preview', ?int $width = NULL, ?int $height = NULL, ?int $duration = NULL ) : array {
      $args = [ 'type' => $type ]; 
      if ( $width !== NULL ) $args['width'] = $width;
      if ( $height !== NULL ) $args['height'] = $height;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      return $args;
    }

    /**
     * The paid media is a photo.
     * 
     * @see https://core.telegram.org/bots/api#PaidMediaPhoto
     *
     * @param string $type Type of the paid media, always “photo”
     * @param PhotoSize[] $photo The photo
     *
     * @return array $args
     */
    public function PaidMediaPhoto ( string $type = 'photo', array $photo ) : array {
      return [ 'type' => $type, 'photo' => $photo ];
    }

    /**
     * The paid media is a video.
     * 
     * @see https://core.telegram.org/bots/api#PaidMediaVideo
     *
     * @param string $type Type of the paid media, always “video”
     * @param Video $video The video
     *
     * @return array $args
     */
    public function PaidMediaVideo ( string $type = 'video', array $video ) : array {
      return [ 'type' => $type, 'video' => $video ];
    }

    /**
     * This object represents a phone contact.
     * 
     * @see https://core.telegram.org/bots/api#Contact
     *
     * @param string $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param string|NULL $last_name Contact's last name
     * @param int|NULL $user_id Contact's user identifier in Telegram. This number may have more than 32 significant bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
     *                              significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param string|NULL $vcard Additional data about the contact in the form of a vCard
     *
     * @return array $args
     */
    public function Contact ( string $phone_number, string $first_name, ?string $last_name = NULL, ?int $user_id = NULL, ?string $vcard = NULL ) : array {
      $args = [ 'phone_number' => $phone_number, 'first_name' => $first_name ]; 
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $user_id !== NULL ) $args['user_id'] = $user_id;
      if ( $vcard !== NULL ) $args['vcard'] = $vcard;
      return $args;
    }

    /**
     * This object represents an animated emoji that displays a random value.
     * 
     * @see https://core.telegram.org/bots/api#Dice
     *
     * @param string $emoji Emoji on which the dice throw animation is based
     * @param int $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and
     *                              “⚽” base emoji, 1-64 for “🎰” base emoji
     *
     * @return array $args
     */
    public function Dice ( string $emoji, int $value ) : array {
      return [ 'emoji' => $emoji, 'value' => $value ];
    }

    /**
     * This object contains information about one answer option in a poll.
     * 
     * @see https://core.telegram.org/bots/api#PollOption
     *
     * @param string $text Option text, 1-100 characters
     * @param MessageEntity[]|NULL $text_entities Special entities that appear in the option text. Currently, only custom emoji entities are allowed
     *                              in poll option texts
     * @param int $voter_count Number of users that voted for this option
     *
     * @return array $args
     */
    public function PollOption ( string $text, int $voter_count, ?array $text_entities = NULL ) : array {
      $args = [ 'text' => $text, 'voter_count' => $voter_count ]; 
      if ( $text_entities !== NULL ) $args['text_entities'] = $text_entities;
      return $args;
    }

    /**
     * This object contains information about one answer option in a poll to be sent.
     * 
     * @see https://core.telegram.org/bots/api#InputPollOption
     *
     * @param string $text Option text, 1-100 characters
     * @param string|NULL $text_parse_mode Mode for parsing entities in the text. See formatting options for more details. Currently, only
     *                              custom emoji entities are allowed
     * @param MessageEntity[]|NULL $text_entities A JSON-serialized list of special entities that appear in the poll option text. It can be specified
     *                              instead of text_parse_mode
     *
     * @return array $args
     */
    public function InputPollOption ( string $text, ?string $text_parse_mode = NULL, ?array $text_entities = NULL ) : array {
      $args = [ 'text' => $text ]; 
      if ( $text_parse_mode !== NULL ) $args['text_parse_mode'] = $text_parse_mode;
      if ( $text_entities !== NULL ) $args['text_entities'] = $text_entities;
      return $args;
    }

    /**
     * This object represents an answer of a user in a non-anonymous poll.
     * 
     * @see https://core.telegram.org/bots/api#PollAnswer
     *
     * @param string $poll_id Unique poll identifier
     * @param Chat|NULL $voter_chat The chat that changed the answer to the poll, if the voter is anonymous
     * @param User|NULL $user The user that changed the answer to the poll, if the voter isn't anonymous
     * @param int[] $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
     *
     * @return array $args
     */
    public function PollAnswer ( string $poll_id, array $option_ids, ?array $voter_chat = NULL, ?array $user = NULL ) : array {
      $args = [ 'poll_id' => $poll_id, 'option_ids' => $option_ids ]; 
      if ( $voter_chat !== NULL ) $args['voter_chat'] = $voter_chat;
      if ( $user !== NULL ) $args['user'] = $user;
      return $args;
    }

    /**
     * This object contains information about a poll.
     * 
     * @see https://core.telegram.org/bots/api#Poll
     *
     * @param string $id Unique poll identifier
     * @param string $question Poll question, 1-300 characters
     * @param MessageEntity[]|NULL $question_entities Special entities that appear in the question. Currently, only custom emoji entities are allowed in
     *                              poll questions
     * @param PollOption[] $options List of poll options
     * @param int $total_voter_count Total number of users that voted in the poll
     * @param bool $is_closed True, if the poll is closed
     * @param bool $is_anonymous True, if the poll is anonymous
     * @param string $type Poll type, currently can be “regular” or “quiz”
     * @param bool $allows_multiple_answers True, if the poll allows multiple answers
     * @param int|NULL $correct_option_id 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which
     *                              are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|NULL $explanation Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style
     *                              poll, 0-200 characters
     * @param MessageEntity[]|NULL $explanation_entities Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
     * @param int|NULL $open_period Amount of time in seconds the poll will be active after creation
     * @param int|NULL $close_date Point in time (Unix timestamp) when the poll will be automatically closed
     *
     * @return array $args
     */
    public function Poll ( string $id, string $question, array $options, int $total_voter_count, bool $is_closed, bool $is_anonymous, string $type, bool $allows_multiple_answers, ?array $question_entities = NULL, ?int $correct_option_id = NULL, ?string $explanation = NULL, ?array $explanation_entities = NULL, ?int $open_period = NULL, ?int $close_date = NULL ) : array {
      $args = [ 'id' => $id, 'question' => $question, 'options' => $options, 'total_voter_count' => $total_voter_count, 'is_closed' => $is_closed, 'is_anonymous' => $is_anonymous, 'type' => $type, 'allows_multiple_answers' => $allows_multiple_answers ]; 
      if ( $question_entities !== NULL ) $args['question_entities'] = $question_entities;
      if ( $correct_option_id !== NULL ) $args['correct_option_id'] = $correct_option_id;
      if ( $explanation !== NULL ) $args['explanation'] = $explanation;
      if ( $explanation_entities !== NULL ) $args['explanation_entities'] = $explanation_entities;
      if ( $open_period !== NULL ) $args['open_period'] = $open_period;
      if ( $close_date !== NULL ) $args['close_date'] = $close_date;
      return $args;
    }

    /**
     * This object represents a point on the map.
     * 
     * @see https://core.telegram.org/bots/api#Location
     *
     * @param float $latitude Latitude as defined by the sender
     * @param float $longitude Longitude as defined by the sender
     * @param float|NULL $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|NULL $live_period Time relative to the message sending date, during which the location can be updated; in seconds. For
     *                              active live locations only.
     * @param int|NULL $heading The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @param int|NULL $proximity_alert_radius The maximum distance for proximity alerts about approaching another chat member, in meters. For sent
     *                              live locations only.
     *
     * @return array $args
     */
    public function Location ( array $latitude, array $longitude, ?array $horizontal_accuracy = NULL, ?int $live_period = NULL, ?int $heading = NULL, ?int $proximity_alert_radius = NULL ) : array {
      $args = [ 'latitude' => $latitude, 'longitude' => $longitude ]; 
      if ( $horizontal_accuracy !== NULL ) $args['horizontal_accuracy'] = $horizontal_accuracy;
      if ( $live_period !== NULL ) $args['live_period'] = $live_period;
      if ( $heading !== NULL ) $args['heading'] = $heading;
      if ( $proximity_alert_radius !== NULL ) $args['proximity_alert_radius'] = $proximity_alert_radius;
      return $args;
    }

    /**
     * This object represents a venue.
     * 
     * @see https://core.telegram.org/bots/api#Venue
     *
     * @param Location $location Venue location. Can't be a live location
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     * @param string|NULL $foursquare_id Foursquare identifier of the venue
     * @param string|NULL $foursquare_type Foursquare type of the venue. (For example, “arts_entertainment/default”,
     *                              “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|NULL $google_place_id Google Places identifier of the venue
     * @param string|NULL $google_place_type Google Places type of the venue. (See supported types.)
     *
     * @return array $args
     */
    public function Venue ( array $location, string $title, string $address, ?string $foursquare_id = NULL, ?string $foursquare_type = NULL, ?string $google_place_id = NULL, ?string $google_place_type = NULL ) : array {
      $args = [ 'location' => $location, 'title' => $title, 'address' => $address ]; 
      if ( $foursquare_id !== NULL ) $args['foursquare_id'] = $foursquare_id;
      if ( $foursquare_type !== NULL ) $args['foursquare_type'] = $foursquare_type;
      if ( $google_place_id !== NULL ) $args['google_place_id'] = $google_place_id;
      if ( $google_place_type !== NULL ) $args['google_place_type'] = $google_place_type;
      return $args;
    }

    /**
     * Describes data sent from a Web App to the bot.
     * 
     * @see https://core.telegram.org/bots/api#WebAppData
     *
     * @param string $data The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $button_text Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client
     *                              can send arbitrary data in this field.
     *
     * @return array $args
     */
    public function WebAppData ( string $data, string $button_text ) : array {
      return [ 'data' => $data, 'button_text' => $button_text ];
    }

    /**
     * This object represents the content of a service message, sent whenever a user in the chat triggers a
     * proximity alert set by another user.
     * 
     * @see https://core.telegram.org/bots/api#ProximityAlertTriggered
     *
     * @param User $traveler User that triggered the alert
     * @param User $watcher User that set the alert
     * @param int $distance The distance between the users
     *
     * @return array $args
     */
    public function ProximityAlertTriggered ( array $traveler, array $watcher, int $distance ) : array {
      return [ 'traveler' => $traveler, 'watcher' => $watcher, 'distance' => $distance ];
    }

    /**
     * This object represents a service message about a change in auto-delete timer settings.
     * 
     * @see https://core.telegram.org/bots/api#MessageAutoDeleteTimerChanged
     *
     * @param int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
     *
     * @return array $args
     */
    public function MessageAutoDeleteTimerChanged ( int $message_auto_delete_time ) : array {
      return [ 'message_auto_delete_time' => $message_auto_delete_time ];
    }

    /**
     * This object represents a service message about a user boosting a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostAdded
     *
     * @param int $boost_count Number of boosts added by the user
     *
     * @return array $args
     */
    public function ChatBoostAdded ( int $boost_count ) : array {
      return [ 'boost_count' => $boost_count ];
    }

    /**
     * This object describes the way a background is filled based on the selected colors. Currently, it can
     * be one of
     * 
     * @see https://core.telegram.org/bots/api#BackgroundFill
     *
     *
     * @return array $args
     */
    public function BackgroundFill ( ) : array {
      return [];
    }

    /**
     * The background is filled using the selected color.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundFillSolid
     *
     * @param string $type Type of the background fill, always “solid”
     * @param int $color The color of the background fill in the RGB24 format
     *
     * @return array $args
     */
    public function BackgroundFillSolid ( string $type = 'solid', int $color ) : array {
      return [ 'type' => $type, 'color' => $color ];
    }

    /**
     * The background is a gradient fill.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundFillGradient
     *
     * @param string $type Type of the background fill, always “gradient”
     * @param int $top_color Top color of the gradient in the RGB24 format
     * @param int $bottom_color Bottom color of the gradient in the RGB24 format
     * @param int $rotation_angle Clockwise rotation angle of the background fill in degrees; 0-359
     *
     * @return array $args
     */
    public function BackgroundFillGradient ( string $type = 'gradient', int $top_color, int $bottom_color, int $rotation_angle ) : array {
      return [ 'type' => $type, 'top_color' => $top_color, 'bottom_color' => $bottom_color, 'rotation_angle' => $rotation_angle ];
    }

    /**
     * The background is a freeform gradient that rotates after every message in the chat.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundFillFreeformGradient
     *
     * @param string $type Type of the background fill, always “freeform_gradient”
     * @param int[] $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     *
     * @return array $args
     */
    public function BackgroundFillFreeformGradient ( string $type = 'freeform_gradient', array $colors ) : array {
      return [ 'type' => $type, 'colors' => $colors ];
    }

    /**
     * This object describes the type of a background. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#BackgroundType
     *
     *
     * @return array $args
     */
    public function BackgroundType ( ) : array {
      return [];
    }

    /**
     * The background is automatically filled based on the selected colors.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundTypeFill
     *
     * @param string $type Type of the background, always “fill”
     * @param BackgroundFill $fill The background fill
     * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @return array $args
     */
    public function BackgroundTypeFill ( string $type = 'fill', array $fill, int $dark_theme_dimming ) : array {
      return [ 'type' => $type, 'fill' => $fill, 'dark_theme_dimming' => $dark_theme_dimming ];
    }

    /**
     * The background is a wallpaper in the JPEG format.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundTypeWallpaper
     *
     * @param string $type Type of the background, always “wallpaper”
     * @param Document $document Document with the wallpaper
     * @param int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
     * @param bool|NULL $is_blurred True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
     * @param bool|NULL $is_moving True, if the background moves slightly when the device is tilted
     *
     * @return array $args
     */
    public function BackgroundTypeWallpaper ( string $type = 'wallpaper', array $document, int $dark_theme_dimming, ?bool $is_blurred = NULL, ?bool $is_moving = NULL ) : array {
      $args = [ 'type' => $type, 'document' => $document, 'dark_theme_dimming' => $dark_theme_dimming ]; 
      if ( $is_blurred !== NULL ) $args['is_blurred'] = $is_blurred;
      if ( $is_moving !== NULL ) $args['is_moving'] = $is_moving;
      return $args;
    }

    /**
     * The background is a .PNG or .TGV (gzipped subset of SVG with MIME type
     * “application/x-tgwallpattern”) pattern to be combined with the background fill chosen by the user.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundTypePattern
     *
     * @param string $type Type of the background, always “pattern”
     * @param Document $document Document with the pattern
     * @param BackgroundFill $fill The background fill that is combined with the pattern
     * @param int $intensity Intensity of the pattern when it is shown above the filled background; 0-100
     * @param bool|NULL $is_inverted True, if the background fill must be applied only to the pattern itself. All other pixels are black
     *                              in this case. For dark themes only
     * @param bool|NULL $is_moving True, if the background moves slightly when the device is tilted
     *
     * @return array $args
     */
    public function BackgroundTypePattern ( string $type = 'pattern', array $document, array $fill, int $intensity, ?bool $is_inverted = NULL, ?bool $is_moving = NULL ) : array {
      $args = [ 'type' => $type, 'document' => $document, 'fill' => $fill, 'intensity' => $intensity ]; 
      if ( $is_inverted !== NULL ) $args['is_inverted'] = $is_inverted;
      if ( $is_moving !== NULL ) $args['is_moving'] = $is_moving;
      return $args;
    }

    /**
     * The background is taken directly from a built-in chat theme.
     * 
     * @see https://core.telegram.org/bots/api#BackgroundTypeChatTheme
     *
     * @param string $type Type of the background, always “chat_theme”
     * @param string $theme_name Name of the chat theme, which is usually an emoji
     *
     * @return array $args
     */
    public function BackgroundTypeChatTheme ( string $type = 'chat_theme', string $theme_name ) : array {
      return [ 'type' => $type, 'theme_name' => $theme_name ];
    }

    /**
     * This object represents a chat background.
     * 
     * @see https://core.telegram.org/bots/api#ChatBackground
     *
     * @param BackgroundType $type Type of the background
     *
     * @return array $args
     */
    public function ChatBackground ( array $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * This object represents a service message about a new forum topic created in the chat.
     * 
     * @see https://core.telegram.org/bots/api#ForumTopicCreated
     *
     * @param string $name Name of the topic
     * @param int $icon_color Color of the topic icon in RGB format
     * @param string|NULL $icon_custom_emoji_id Unique identifier of the custom emoji shown as the topic icon
     *
     * @return array $args
     */
    public function ForumTopicCreated ( string $name, int $icon_color, ?string $icon_custom_emoji_id = NULL ) : array {
      $args = [ 'name' => $name, 'icon_color' => $icon_color ]; 
      if ( $icon_custom_emoji_id !== NULL ) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;
      return $args;
    }

    /**
     * This object represents a service message about a forum topic closed in the chat. Currently holds no information.
     * 
     * @see https://core.telegram.org/bots/api#ForumTopicClosed
     *
     *
     * @return array $args
     */
    public function ForumTopicClosed ( ) : array {
      return [];
    }

    /**
     * This object represents a service message about an edited forum topic.
     * 
     * @see https://core.telegram.org/bots/api#ForumTopicEdited
     *
     * @param string|NULL $name New name of the topic, if it was edited
     * @param string|NULL $icon_custom_emoji_id New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the
     *                              icon was removed
     *
     * @return array $args
     */
    public function ForumTopicEdited ( ?string $name = NULL, ?string $icon_custom_emoji_id = NULL ) : array {
      $args = []; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $icon_custom_emoji_id !== NULL ) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;
      return $args;
    }

    /**
     * This object represents a service message about a forum topic reopened in the chat. Currently holds
     * no information.
     * 
     * @see https://core.telegram.org/bots/api#ForumTopicReopened
     *
     *
     * @return array $args
     */
    public function ForumTopicReopened ( ) : array {
      return [];
    }

    /**
     * This object represents a service message about General forum topic hidden in the chat. Currently
     * holds no information.
     * 
     * @see https://core.telegram.org/bots/api#GeneralForumTopicHidden
     *
     *
     * @return array $args
     */
    public function GeneralForumTopicHidden ( ) : array {
      return [];
    }

    /**
     * This object represents a service message about General forum topic unhidden in the chat. Currently
     * holds no information.
     * 
     * @see https://core.telegram.org/bots/api#GeneralForumTopicUnhidden
     *
     *
     * @return array $args
     */
    public function GeneralForumTopicUnhidden ( ) : array {
      return [];
    }

    /**
     * This object contains information about a user that was shared with the bot using a
     * KeyboardButtonRequestUsers button.
     * 
     * @see https://core.telegram.org/bots/api#SharedUser
     *
     * @param int $user_id Identifier of the shared user. This number may have more than 32 significant bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
     *                              significant bits, so 64-bit integers or double-precision float types are safe for storing these
     *                              identifiers. The bot may not have access to the user and could be unable to use this identifier,
     *                              unless the user is already known to the bot by some other means.
     * @param string|NULL $first_name First name of the user, if the name was requested by the bot
     * @param string|NULL $last_name Last name of the user, if the name was requested by the bot
     * @param string|NULL $username Username of the user, if the username was requested by the bot
     * @param PhotoSize[]|NULL $photo Available sizes of the chat photo, if the photo was requested by the bot
     *
     * @return array $args
     */
    public function SharedUser ( int $user_id, ?string $first_name = NULL, ?string $last_name = NULL, ?string $username = NULL, ?array $photo = NULL ) : array {
      $args = [ 'user_id' => $user_id ]; 
      if ( $first_name !== NULL ) $args['first_name'] = $first_name;
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $username !== NULL ) $args['username'] = $username;
      if ( $photo !== NULL ) $args['photo'] = $photo;
      return $args;
    }

    /**
     * This object contains information about the users whose identifiers were shared with the bot using a
     * KeyboardButtonRequestUsers button.
     * 
     * @see https://core.telegram.org/bots/api#UsersShared
     *
     * @param int $request_id Identifier of the request
     * @param SharedUser[] $users Information about users shared with the bot.
     *
     * @return array $args
     */
    public function UsersShared ( int $request_id, array $users ) : array {
      return [ 'request_id' => $request_id, 'users' => $users ];
    }

    /**
     * This object contains information about a chat that was shared with the bot using a
     * KeyboardButtonRequestChat button.
     * 
     * @see https://core.telegram.org/bots/api#ChatShared
     *
     * @param int $request_id Identifier of the request
     * @param int $chat_id Identifier of the shared chat. This number may have more than 32 significant bits and some
     *                              programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
     *                              significant bits, so a 64-bit integer or double-precision float type are safe for storing this
     *                              identifier. The bot may not have access to the chat and could be unable to use this identifier,
     *                              unless the chat is already known to the bot by some other means.
     * @param string|NULL $title Title of the chat, if the title was requested by the bot.
     * @param string|NULL $username Username of the chat, if the username was requested by the bot and available.
     * @param PhotoSize[]|NULL $photo Available sizes of the chat photo, if the photo was requested by the bot
     *
     * @return array $args
     */
    public function ChatShared ( int $request_id, int $chat_id, ?string $title = NULL, ?string $username = NULL, ?array $photo = NULL ) : array {
      $args = [ 'request_id' => $request_id, 'chat_id' => $chat_id ]; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $username !== NULL ) $args['username'] = $username;
      if ( $photo !== NULL ) $args['photo'] = $photo;
      return $args;
    }

    /**
     * This object represents a service message about a user allowing a bot to write messages after adding
     * it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a
     * Web App sent by the method requestWriteAccess.
     * 
     * @see https://core.telegram.org/bots/api#WriteAccessAllowed
     *
     * @param bool|NULL $from_request True, if the access was granted after the user accepted an explicit request from a Web App sent by
     *                              the method requestWriteAccess
     * @param string|NULL $web_app_name Name of the Web App, if the access was granted when the Web App was launched from a link
     * @param bool|NULL $from_attachment_menu True, if the access was granted when the bot was added to the attachment or side menu
     *
     * @return array $args
     */
    public function WriteAccessAllowed ( ?bool $from_request = NULL, ?string $web_app_name = NULL, ?bool $from_attachment_menu = NULL ) : array {
      $args = []; 
      if ( $from_request !== NULL ) $args['from_request'] = $from_request;
      if ( $web_app_name !== NULL ) $args['web_app_name'] = $web_app_name;
      if ( $from_attachment_menu !== NULL ) $args['from_attachment_menu'] = $from_attachment_menu;
      return $args;
    }

    /**
     * This object represents a service message about a video chat scheduled in the chat.
     * 
     * @see https://core.telegram.org/bots/api#VideoChatScheduled
     *
     * @param int $start_date Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator
     *
     * @return array $args
     */
    public function VideoChatScheduled ( int $start_date ) : array {
      return [ 'start_date' => $start_date ];
    }

    /**
     * This object represents a service message about a video chat started in the chat. Currently holds no information.
     * 
     * @see https://core.telegram.org/bots/api#VideoChatStarted
     *
     *
     * @return array $args
     */
    public function VideoChatStarted ( ) : array {
      return [];
    }

    /**
     * This object represents a service message about a video chat ended in the chat.
     * 
     * @see https://core.telegram.org/bots/api#VideoChatEnded
     *
     * @param int $duration Video chat duration in seconds
     *
     * @return array $args
     */
    public function VideoChatEnded ( int $duration ) : array {
      return [ 'duration' => $duration ];
    }

    /**
     * This object represents a service message about new members invited to a video chat.
     * 
     * @see https://core.telegram.org/bots/api#VideoChatParticipantsInvited
     *
     * @param User[] $users New members that were invited to the video chat
     *
     * @return array $args
     */
    public function VideoChatParticipantsInvited ( array $users ) : array {
      return [ 'users' => $users ];
    }

    /**
     * Describes a service message about a change in the price of paid messages within a chat.
     * 
     * @see https://core.telegram.org/bots/api#PaidMessagePriceChanged
     *
     * @param int $paid_message_star_count The new number of Telegram Stars that must be paid by non-administrator users of the supergroup chat
     *                              for each sent message
     *
     * @return array $args
     */
    public function PaidMessagePriceChanged ( int $paid_message_star_count ) : array {
      return [ 'paid_message_star_count' => $paid_message_star_count ];
    }

    /**
     * This object represents a service message about the creation of a scheduled giveaway.
     * 
     * @see https://core.telegram.org/bots/api#GiveawayCreated
     *
     * @param int|NULL $prize_star_count The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
     *
     * @return array $args
     */
    public function GiveawayCreated ( ?int $prize_star_count = NULL ) : array {
      $args = []; 
      if ( $prize_star_count !== NULL ) $args['prize_star_count'] = $prize_star_count;
      return $args;
    }

    /**
     * This object represents a message about a scheduled giveaway.
     * 
     * @see https://core.telegram.org/bots/api#Giveaway
     *
     * @param Chat[] $chats The list of chats which the user must join to participate in the giveaway
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected
     * @param int $winner_count The number of users which are supposed to be selected as winners of the giveaway
     * @param bool|NULL $only_new_members True, if only users who join the chats after the giveaway started should be eligible to win
     * @param bool|NULL $has_public_winners True, if the list of giveaway winners will be visible to everyone
     * @param string|NULL $prize_description Description of additional giveaway prize
     * @param string[]|NULL $country_codes A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible
     *                              users for the giveaway must come. If empty, then all users can participate in the giveaway. Users
     *                              with a phone number that was bought on Fragment can always participate in giveaways.
     * @param int|NULL $prize_star_count The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
     * @param int|NULL $premium_subscription_month_count The number of months the Telegram Premium subscription won from the giveaway will be active for; for
     *                              Telegram Premium giveaways only
     *
     * @return array $args
     */
    public function Giveaway ( array $chats, int $winners_selection_date, int $winner_count, ?bool $only_new_members = NULL, ?bool $has_public_winners = NULL, ?string $prize_description = NULL, ?array $country_codes = NULL, ?int $prize_star_count = NULL, ?int $premium_subscription_month_count = NULL ) : array {
      $args = [ 'chats' => $chats, 'winners_selection_date' => $winners_selection_date, 'winner_count' => $winner_count ]; 
      if ( $only_new_members !== NULL ) $args['only_new_members'] = $only_new_members;
      if ( $has_public_winners !== NULL ) $args['has_public_winners'] = $has_public_winners;
      if ( $prize_description !== NULL ) $args['prize_description'] = $prize_description;
      if ( $country_codes !== NULL ) $args['country_codes'] = $country_codes;
      if ( $prize_star_count !== NULL ) $args['prize_star_count'] = $prize_star_count;
      if ( $premium_subscription_month_count !== NULL ) $args['premium_subscription_month_count'] = $premium_subscription_month_count;
      return $args;
    }

    /**
     * This object represents a message about the completion of a giveaway with public winners.
     * 
     * @see https://core.telegram.org/bots/api#GiveawayWinners
     *
     * @param Chat $chat The chat that created the giveaway
     * @param int $giveaway_message_id Identifier of the message with the giveaway in the chat
     * @param int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway were selected
     * @param int $winner_count Total number of winners in the giveaway
     * @param User[] $winners List of up to 100 winners of the giveaway
     * @param int|NULL $additional_chat_count The number of other chats the user had to join in order to be eligible for the giveaway
     * @param int|NULL $prize_star_count The number of Telegram Stars that were split between giveaway winners; for Telegram Star giveaways only
     * @param int|NULL $premium_subscription_month_count The number of months the Telegram Premium subscription won from the giveaway will be active for; for
     *                              Telegram Premium giveaways only
     * @param int|NULL $unclaimed_prize_count Number of undistributed prizes
     * @param bool|NULL $only_new_members True, if only users who had joined the chats after the giveaway started were eligible to win
     * @param bool|NULL $was_refunded True, if the giveaway was canceled because the payment for it was refunded
     * @param string|NULL $prize_description Description of additional giveaway prize
     *
     * @return array $args
     */
    public function GiveawayWinners ( array $chat, int $giveaway_message_id, int $winners_selection_date, int $winner_count, array $winners, ?int $additional_chat_count = NULL, ?int $prize_star_count = NULL, ?int $premium_subscription_month_count = NULL, ?int $unclaimed_prize_count = NULL, ?bool $only_new_members = NULL, ?bool $was_refunded = NULL, ?string $prize_description = NULL ) : array {
      $args = [ 'chat' => $chat, 'giveaway_message_id' => $giveaway_message_id, 'winners_selection_date' => $winners_selection_date, 'winner_count' => $winner_count, 'winners' => $winners ]; 
      if ( $additional_chat_count !== NULL ) $args['additional_chat_count'] = $additional_chat_count;
      if ( $prize_star_count !== NULL ) $args['prize_star_count'] = $prize_star_count;
      if ( $premium_subscription_month_count !== NULL ) $args['premium_subscription_month_count'] = $premium_subscription_month_count;
      if ( $unclaimed_prize_count !== NULL ) $args['unclaimed_prize_count'] = $unclaimed_prize_count;
      if ( $only_new_members !== NULL ) $args['only_new_members'] = $only_new_members;
      if ( $was_refunded !== NULL ) $args['was_refunded'] = $was_refunded;
      if ( $prize_description !== NULL ) $args['prize_description'] = $prize_description;
      return $args;
    }

    /**
     * This object represents a service message about the completion of a giveaway without public winners.
     * 
     * @see https://core.telegram.org/bots/api#GiveawayCompleted
     *
     * @param int $winner_count Number of winners in the giveaway
     * @param int|NULL $unclaimed_prize_count Number of undistributed prizes
     * @param Message|NULL $giveaway_message Message with the giveaway that was completed, if it wasn't deleted
     * @param bool|NULL $is_star_giveaway True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the giveaway is a Telegram
     *                              Premium giveaway.
     *
     * @return array $args
     */
    public function GiveawayCompleted ( int $winner_count, ?int $unclaimed_prize_count = NULL, ?array $giveaway_message = NULL, ?bool $is_star_giveaway = NULL ) : array {
      $args = [ 'winner_count' => $winner_count ]; 
      if ( $unclaimed_prize_count !== NULL ) $args['unclaimed_prize_count'] = $unclaimed_prize_count;
      if ( $giveaway_message !== NULL ) $args['giveaway_message'] = $giveaway_message;
      if ( $is_star_giveaway !== NULL ) $args['is_star_giveaway'] = $is_star_giveaway;
      return $args;
    }

    /**
     * Describes the options used for link preview generation.
     * 
     * @see https://core.telegram.org/bots/api#LinkPreviewOptions
     *
     * @param bool|NULL $is_disabled True, if the link preview is disabled
     * @param string|NULL $url URL to use for the link preview. If empty, then the first URL found in the message text will be used
     * @param bool|NULL $prefer_small_media True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly
     *                              specified or media size change isn't supported for the preview
     * @param bool|NULL $prefer_large_media True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't
     *                              explicitly specified or media size change isn't supported for the preview
     * @param bool|NULL $show_above_text True, if the link preview must be shown above the message text; otherwise, the link preview will be
     *                              shown below the message text
     *
     * @return array $args
     */
    public function LinkPreviewOptions ( ?bool $is_disabled = NULL, ?string $url = NULL, ?bool $prefer_small_media = NULL, ?bool $prefer_large_media = NULL, ?bool $show_above_text = NULL ) : array {
      $args = []; 
      if ( $is_disabled !== NULL ) $args['is_disabled'] = $is_disabled;
      if ( $url !== NULL ) $args['url'] = $url;
      if ( $prefer_small_media !== NULL ) $args['prefer_small_media'] = $prefer_small_media;
      if ( $prefer_large_media !== NULL ) $args['prefer_large_media'] = $prefer_large_media;
      if ( $show_above_text !== NULL ) $args['show_above_text'] = $show_above_text;
      return $args;
    }

    /**
     * This object represent a user's profile pictures.
     * 
     * @see https://core.telegram.org/bots/api#UserProfilePhotos
     *
     * @param int $total_count Total number of profile pictures the target user has
     * @param Array<PhotoSize[]> $photos Requested profile pictures (in up to 4 sizes each)
     *
     * @return array $args
     */
    public function UserProfilePhotos ( int $total_count, array $photos ) : array {
      return [ 'total_count' => $total_count, 'photos' => $photos ];
    }

    /**
     * This object represents a file ready to be downloaded. The file can be downloaded via the link
     * https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid
     * for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
     * 
     * @see https://core.telegram.org/bots/api#File
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int|NULL $file_size File size in bytes. It can be bigger than 2^31 and some programming languages may have
     *                              difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
     *                              64-bit integer or double-precision float type are safe for storing this value.
     * @param string|NULL $file_path File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
     *
     * @return array $args
     */
    public function File ( string $file_id, string $file_unique_id, ?int $file_size = NULL, ?string $file_path = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id ]; 
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      if ( $file_path !== NULL ) $args['file_path'] = $file_path;
      return $args;
    }

    /**
     * Describes a Web App.
     * 
     * @see https://core.telegram.org/bots/api#WebAppInfo
     *
     * @param string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     *
     * @return array $args
     */
    public function WebAppInfo ( string $url ) : array {
      return [ 'url' => $url ];
    }

    /**
     * This object represents a custom keyboard with reply options (see Introduction to bots for details
     * and examples). Not supported in channels and for messages sent on behalf of a Telegram Business account.
     * 
     * @see https://core.telegram.org/bots/api#ReplyKeyboardMarkup
     *
     * @param Array<KeyboardButton[]> $keyboard Array of button rows, each represented by an Array of KeyboardButton objects
     * @param bool|NULL $is_persistent Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to false,
     *                              in which case the custom keyboard can be hidden and opened with a keyboard icon.
     * @param bool|NULL $resize_keyboard Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller
     *                              if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is
     *                              always of the same height as the app's standard keyboard.
     * @param bool|NULL $one_time_keyboard Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be
     *                              available, but clients will automatically display the usual letter-keyboard in the chat - the user
     *                              can press a special button in the input field to see the custom keyboard again. Defaults to false.
     * @param string|NULL $input_field_placeholder The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
     * @param bool|NULL $selective Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that
     *                              are @mentioned in the text of the Message object; 2) if the bot's message is a reply to a message in
     *                              the same chat and forum topic, sender of the original message.Example: A user requests to change the
     *                              bot's language, bot replies to the request with a keyboard to select the new language. Other users
     *                              in the group don't see the keyboard.
     *
     * @return array $args
     */
    public function ReplyKeyboardMarkup ( array $keyboard, ?bool $is_persistent = NULL, ?bool $resize_keyboard = NULL, ?bool $one_time_keyboard = NULL, ?string $input_field_placeholder = NULL, ?bool $selective = NULL ) : array {
      $args = [ 'keyboard' => $keyboard ]; 
      if ( $is_persistent !== NULL ) $args['is_persistent'] = $is_persistent;
      if ( $resize_keyboard !== NULL ) $args['resize_keyboard'] = $resize_keyboard;
      if ( $one_time_keyboard !== NULL ) $args['one_time_keyboard'] = $one_time_keyboard;
      if ( $input_field_placeholder !== NULL ) $args['input_field_placeholder'] = $input_field_placeholder;
      if ( $selective !== NULL ) $args['selective'] = $selective;
      return $args;
    }

    /**
     * This object represents one button of the reply keyboard. At most one of the optional fields must be
     * used to specify type of the button. For simple text buttons, String can be used instead of this
     * object to specify the button text.
     * 
     * @see https://core.telegram.org/bots/api#KeyboardButton
     *
     * @param string $text Text of the button. If none of the optional fields are used, it will be sent as a message when the
     *                              button is pressed
     * @param KeyboardButtonRequestUsers|NULL $request_users If specified, pressing the button will open a list of suitable users. Identifiers of selected users
     *                              will be sent to the bot in a “users_shared” service message. Available in private chats only.
     * @param KeyboardButtonRequestChat|NULL $request_chat If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send
     *                              its identifier to the bot in a “chat_shared” service message. Available in private chats only.
     * @param bool|NULL $request_contact If True, the user's phone number will be sent as a contact when the button is pressed. Available in
     *                              private chats only.
     * @param bool|NULL $request_location If True, the user's current location will be sent when the button is pressed. Available in private
     *                              chats only.
     * @param KeyboardButtonPollType|NULL $request_poll If specified, the user will be asked to create a poll and send it to the bot when the button is
     *                              pressed. Available in private chats only.
     * @param WebAppInfo|NULL $web_app If specified, the described Web App will be launched when the button is pressed. The Web App will be
     *                              able to send a “web_app_data” service message. Available in private chats only.
     *
     * @return array $args
     */
    public function KeyboardButton ( string $text, ?array $request_users = NULL, ?array $request_chat = NULL, ?bool $request_contact = NULL, ?bool $request_location = NULL, ?array $request_poll = NULL, ?array $web_app = NULL ) : array {
      $args = [ 'text' => $text ]; 
      if ( $request_users !== NULL ) $args['request_users'] = $request_users;
      if ( $request_chat !== NULL ) $args['request_chat'] = $request_chat;
      if ( $request_contact !== NULL ) $args['request_contact'] = $request_contact;
      if ( $request_location !== NULL ) $args['request_location'] = $request_location;
      if ( $request_poll !== NULL ) $args['request_poll'] = $request_poll;
      if ( $web_app !== NULL ) $args['web_app'] = $web_app;
      return $args;
    }

    /**
     * This object defines the criteria used to request suitable users. Information about the selected
     * users will be shared with the bot when the corresponding button is pressed. More about requesting
     * users »
     * 
     * @see https://core.telegram.org/bots/api#KeyboardButtonRequestUsers
     *
     * @param int $request_id Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must
     *                              be unique within the message
     * @param bool|NULL $user_is_bot Pass True to request bots, pass False to request regular users. If not specified, no additional
     *                              restrictions are applied.
     * @param bool|NULL $user_is_premium Pass True to request premium users, pass False to request non-premium users. If not specified, no
     *                              additional restrictions are applied.
     * @param int|NULL $max_quantity The maximum number of users to be selected; 1-10. Defaults to 1.
     * @param bool|NULL $request_name Pass True to request the users' first and last names
     * @param bool|NULL $request_username Pass True to request the users' usernames
     * @param bool|NULL $request_photo Pass True to request the users' photos
     *
     * @return array $args
     */
    public function KeyboardButtonRequestUsers ( int $request_id, ?bool $user_is_bot = NULL, ?bool $user_is_premium = NULL, ?int $max_quantity = NULL, ?bool $request_name = NULL, ?bool $request_username = NULL, ?bool $request_photo = NULL ) : array {
      $args = [ 'request_id' => $request_id ]; 
      if ( $user_is_bot !== NULL ) $args['user_is_bot'] = $user_is_bot;
      if ( $user_is_premium !== NULL ) $args['user_is_premium'] = $user_is_premium;
      if ( $max_quantity !== NULL ) $args['max_quantity'] = $max_quantity;
      if ( $request_name !== NULL ) $args['request_name'] = $request_name;
      if ( $request_username !== NULL ) $args['request_username'] = $request_username;
      if ( $request_photo !== NULL ) $args['request_photo'] = $request_photo;
      return $args;
    }

    /**
     * This object defines the criteria used to request a suitable chat. Information about the selected
     * chat will be shared with the bot when the corresponding button is pressed. The bot will be granted
     * requested rights in the chat if appropriate. More about requesting chats ».
     * 
     * @see https://core.telegram.org/bots/api#KeyboardButtonRequestChat
     *
     * @param int $request_id Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must
     *                              be unique within the message
     * @param bool $chat_is_channel Pass True to request a channel chat, pass False to request a group or a supergroup chat.
     * @param bool|NULL $chat_is_forum Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified,
     *                              no additional restrictions are applied.
     * @param bool|NULL $chat_has_username Pass True to request a supergroup or a channel with a username, pass False to request a chat without
     *                              a username. If not specified, no additional restrictions are applied.
     * @param bool|NULL $chat_is_created Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     * @param ChatAdministratorRights|NULL $user_administrator_rights A JSON-serialized object listing the required administrator rights of the user in the chat. The
     *                              rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions
     *                              are applied.
     * @param ChatAdministratorRights|NULL $bot_administrator_rights A JSON-serialized object listing the required administrator rights of the bot in the chat. The
     *                              rights must be a subset of user_administrator_rights. If not specified, no additional restrictions
     *                              are applied.
     * @param bool|NULL $bot_is_member Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
     * @param bool|NULL $request_title Pass True to request the chat's title
     * @param bool|NULL $request_username Pass True to request the chat's username
     * @param bool|NULL $request_photo Pass True to request the chat's photo
     *
     * @return array $args
     */
    public function KeyboardButtonRequestChat ( int $request_id, bool $chat_is_channel, ?bool $chat_is_forum = NULL, ?bool $chat_has_username = NULL, ?bool $chat_is_created = NULL, ?array $user_administrator_rights = NULL, ?array $bot_administrator_rights = NULL, ?bool $bot_is_member = NULL, ?bool $request_title = NULL, ?bool $request_username = NULL, ?bool $request_photo = NULL ) : array {
      $args = [ 'request_id' => $request_id, 'chat_is_channel' => $chat_is_channel ]; 
      if ( $chat_is_forum !== NULL ) $args['chat_is_forum'] = $chat_is_forum;
      if ( $chat_has_username !== NULL ) $args['chat_has_username'] = $chat_has_username;
      if ( $chat_is_created !== NULL ) $args['chat_is_created'] = $chat_is_created;
      if ( $user_administrator_rights !== NULL ) $args['user_administrator_rights'] = $user_administrator_rights;
      if ( $bot_administrator_rights !== NULL ) $args['bot_administrator_rights'] = $bot_administrator_rights;
      if ( $bot_is_member !== NULL ) $args['bot_is_member'] = $bot_is_member;
      if ( $request_title !== NULL ) $args['request_title'] = $request_title;
      if ( $request_username !== NULL ) $args['request_username'] = $request_username;
      if ( $request_photo !== NULL ) $args['request_photo'] = $request_photo;
      return $args;
    }

    /**
     * This object represents type of a poll, which is allowed to be created and sent when the
     * corresponding button is pressed.
     * 
     * @see https://core.telegram.org/bots/api#KeyboardButtonPollType
     *
     * @param string|NULL $type If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is
     *                              passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of
     *                              any type.
     *
     * @return array $args
     */
    public function KeyboardButtonPollType ( ?string $type = NULL ) : array {
      $args = []; 
      if ( $type !== NULL ) $args['type'] = $type;
      return $args;
    }

    /**
     * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard
     * and display the default letter-keyboard. By default, custom keyboards are displayed until a new
     * keyboard is sent by a bot. An exception is made for one-time keyboards that are hidden immediately
     * after the user presses a button (see ReplyKeyboardMarkup). Not supported in channels and for
     * messages sent on behalf of a Telegram Business account.
     * 
     * @see https://core.telegram.org/bots/api#ReplyKeyboardRemove
     *
     * @param bool $remove_keyboard Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if
     *                              you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     * @param bool|NULL $selective Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users
     *                              that are @mentioned in the text of the Message object; 2) if the bot's message is a reply to a
     *                              message in the same chat and forum topic, sender of the original message.Example: A user votes in a
     *                              poll, bot returns confirmation message in reply to the vote and removes the keyboard for that user,
     *                              while still showing the keyboard with poll options to users who haven't voted yet.
     *
     * @return array $args
     */
    public function ReplyKeyboardRemove ( bool $remove_keyboard, ?bool $selective = NULL ) : array {
      $args = [ 'remove_keyboard' => $remove_keyboard ]; 
      if ( $selective !== NULL ) $args['selective'] = $selective;
      return $args;
    }

    /**
     * This object represents an inline keyboard that appears right next to the message it belongs to.
     * 
     * @see https://core.telegram.org/bots/api#InlineKeyboardMarkup
     *
     * @param Array<InlineKeyboardButton[]> $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
     *
     * @return array $args
     */
    public function InlineKeyboardMarkup ( array $inline_keyboard ) : array {
      return [ 'inline_keyboard' => $inline_keyboard ];
    }

    /**
     * This object represents one button of an inline keyboard. Exactly one of the optional fields must be
     * used to specify type of the button.
     * 
     * @see https://core.telegram.org/bots/api#InlineKeyboardButton
     *
     * @param string $text Label text on the button
     * @param string|NULL $url HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used
     *                              to mention a user by their identifier without using a username, if this is allowed by their privacy settings.
     * @param string|NULL $callback_data Data to be sent in a callback query to the bot when the button is pressed, 1-64 bytes
     * @param WebAppInfo|NULL $web_app Description of the Web App that will be launched when the user presses the button. The Web App will
     *                              be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
     *                              Available only in private chats between a user and the bot. Not supported for messages sent on
     *                              behalf of a Telegram Business account.
     * @param LoginUrl|NULL $login_url An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram
     *                              Login Widget.
     * @param string|NULL $switch_inline_query If set, pressing the button will prompt the user to select one of their chats, open that chat and
     *                              insert the bot's username and the specified inline query in the input field. May be empty, in which
     *                              case just the bot's username will be inserted. Not supported for messages sent on behalf of a
     *                              Telegram Business account.
     * @param string|NULL $switch_inline_query_current_chat If set, pressing the button will insert the bot's username and the specified inline query in the
     *                              current chat's input field. May be empty, in which case only the bot's username will be
     *                              inserted.This offers a quick way for the user to open your bot in inline mode in the same chat -
     *                              good for selecting something from multiple options. Not supported in channels and for messages sent
     *                              on behalf of a Telegram Business account.
     * @param SwitchInlineQueryChosenChat|NULL $switch_inline_query_chosen_chat If set, pressing the button will prompt the user to select one of their chats of the specified type,
     *                              open that chat and insert the bot's username and the specified inline query in the input field. Not
     *                              supported for messages sent on behalf of a Telegram Business account.
     * @param CopyTextButton|NULL $copy_text Description of the button that copies the specified text to the clipboard.
     * @param CallbackGame|NULL $callback_game Description of the game that will be launched when the user presses the button.NOTE: This type of
     *                              button must always be the first button in the first row.
     * @param bool|NULL $pay Specify True, to send a Pay button. Substrings “⭐” and “XTR” in the buttons's text will be
     *                              replaced with a Telegram Star icon.NOTE: This type of button must always be the first button in the
     *                              first row and can only be used in invoice messages.
     *
     * @return array $args
     */
    public function InlineKeyboardButton ( string $text, ?string $url = NULL, ?string $callback_data = NULL, ?array $web_app = NULL, ?array $login_url = NULL, ?string $switch_inline_query = NULL, ?string $switch_inline_query_current_chat = NULL, ?array $switch_inline_query_chosen_chat = NULL, ?array $copy_text = NULL, ?array $callback_game = NULL, ?bool $pay = NULL ) : array {
      $args = [ 'text' => $text ]; 
      if ( $url !== NULL ) $args['url'] = $url;
      if ( $callback_data !== NULL ) $args['callback_data'] = $callback_data;
      if ( $web_app !== NULL ) $args['web_app'] = $web_app;
      if ( $login_url !== NULL ) $args['login_url'] = $login_url;
      if ( $switch_inline_query !== NULL ) $args['switch_inline_query'] = $switch_inline_query;
      if ( $switch_inline_query_current_chat !== NULL ) $args['switch_inline_query_current_chat'] = $switch_inline_query_current_chat;
      if ( $switch_inline_query_chosen_chat !== NULL ) $args['switch_inline_query_chosen_chat'] = $switch_inline_query_chosen_chat;
      if ( $copy_text !== NULL ) $args['copy_text'] = $copy_text;
      if ( $callback_game !== NULL ) $args['callback_game'] = $callback_game;
      if ( $pay !== NULL ) $args['pay'] = $pay;
      return $args;
    }

    /**
     * This object represents a parameter of the inline keyboard button used to automatically authorize a
     * user. Serves as a great replacement for the Telegram Login Widget when the user is coming from
     * Telegram. All the user needs to do is tap/click a button and confirm that they want to log in:
    
     * * Telegram apps support these buttons as of version 5.7.
     * 
     * @see https://core.telegram.org/bots/api#LoginUrl
     *
     * @param string $url An HTTPS URL to be opened with user authorization data added to the query string when the button is
     *                              pressed. If the user refuses to provide authorization data, the original URL without information
     *                              about the user will be opened. The data added is the same as described in Receiving authorization
     *                              data.NOTE: You must always check the hash of the received data to verify the authentication and the
     *                              integrity of the data as described in Checking authorization.
     * @param string|NULL $forward_text New text of the button in forwarded messages.
     * @param string|NULL $bot_username Username of a bot, which will be used for user authorization. See Setting up a bot for more details.
     *                              If not specified, the current bot's username will be assumed. The url's domain must be the same as
     *                              the domain linked with the bot. See Linking your domain to the bot for more details.
     * @param bool|NULL $request_write_access Pass True to request the permission for your bot to send messages to the user.
     *
     * @return array $args
     */
    public function LoginUrl ( string $url, ?string $forward_text = NULL, ?string $bot_username = NULL, ?bool $request_write_access = NULL ) : array {
      $args = [ 'url' => $url ]; 
      if ( $forward_text !== NULL ) $args['forward_text'] = $forward_text;
      if ( $bot_username !== NULL ) $args['bot_username'] = $bot_username;
      if ( $request_write_access !== NULL ) $args['request_write_access'] = $request_write_access;
      return $args;
    }

    /**
     * This object represents an inline button that switches the current user to inline mode in a chosen
     * chat, with an optional default inline query.
     * 
     * @see https://core.telegram.org/bots/api#SwitchInlineQueryChosenChat
     *
     * @param string|NULL $query The default inline query to be inserted in the input field. If left empty, only the bot's username
     *                              will be inserted
     * @param bool|NULL $allow_user_chats True, if private chats with users can be chosen
     * @param bool|NULL $allow_bot_chats True, if private chats with bots can be chosen
     * @param bool|NULL $allow_group_chats True, if group and supergroup chats can be chosen
     * @param bool|NULL $allow_channel_chats True, if channel chats can be chosen
     *
     * @return array $args
     */
    public function SwitchInlineQueryChosenChat ( ?string $query = NULL, ?bool $allow_user_chats = NULL, ?bool $allow_bot_chats = NULL, ?bool $allow_group_chats = NULL, ?bool $allow_channel_chats = NULL ) : array {
      $args = []; 
      if ( $query !== NULL ) $args['query'] = $query;
      if ( $allow_user_chats !== NULL ) $args['allow_user_chats'] = $allow_user_chats;
      if ( $allow_bot_chats !== NULL ) $args['allow_bot_chats'] = $allow_bot_chats;
      if ( $allow_group_chats !== NULL ) $args['allow_group_chats'] = $allow_group_chats;
      if ( $allow_channel_chats !== NULL ) $args['allow_channel_chats'] = $allow_channel_chats;
      return $args;
    }

    /**
     * This object represents an inline keyboard button that copies specified text to the clipboard.
     * 
     * @see https://core.telegram.org/bots/api#CopyTextButton
     *
     * @param string $text The text to be copied to the clipboard; 1-256 characters
     *
     * @return array $args
     */
    public function CopyTextButton ( string $text ) : array {
      return [ 'text' => $text ];
    }

    /**
     * This object represents an incoming callback query from a callback button in an inline keyboard. If
     * the button that originated the query was attached to a message sent by the bot, the field message
     * will be present. If the button was attached to a message sent via the bot (in inline mode), the
     * field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present.
     * 
     * @see https://core.telegram.org/bots/api#CallbackQuery
     *
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param MaybeInaccessibleMessage|NULL $message Message sent by the bot with the callback button that originated the query
     * @param string|NULL $inline_message_id Identifier of the message sent via the bot in inline mode, that originated the query.
     * @param string $chat_instance Global identifier, uniquely corresponding to the chat to which the message with the callback button
     *                              was sent. Useful for high scores in games.
     * @param string|NULL $data Data associated with the callback button. Be aware that the message originated the query can contain
     *                              no callback buttons with this data.
     * @param string|NULL $game_short_name Short name of a Game to be returned, serves as the unique identifier for the game
     *
     * @return array $args
     */
    public function CallbackQuery ( string $id, array $from, string $chat_instance, ?array $message = NULL, ?string $inline_message_id = NULL, ?string $data = NULL, ?string $game_short_name = NULL ) : array {
      $args = [ 'id' => $id, 'from' => $from, 'chat_instance' => $chat_instance ]; 
      if ( $message !== NULL ) $args['message'] = $message;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $data !== NULL ) $args['data'] = $data;
      if ( $game_short_name !== NULL ) $args['game_short_name'] = $game_short_name;
      return $args;
    }

    /**
     * Upon receiving a message with this object, Telegram clients will display a reply interface to the
     * user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely
     * useful if you want to create user-friendly step-by-step interfaces without having to sacrifice
     * privacy mode. Not supported in channels and for messages sent on behalf of a Telegram Business account.
     * 
     * @see https://core.telegram.org/bots/api#ForceReply
     *
     * @param bool $force_reply Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
     * @param string|NULL $input_field_placeholder The placeholder to be shown in the input field when the reply is active; 1-64 characters
     * @param bool|NULL $selective Use this parameter if you want to force reply from specific users only. Targets: 1) users that are
     *                              @mentioned in the text of the Message object; 2) if the bot's message is a reply to a message in the
     *                              same chat and forum topic, sender of the original message.
     *
     * @return array $args
     */
    public function ForceReply ( bool $force_reply, ?string $input_field_placeholder = NULL, ?bool $selective = NULL ) : array {
      $args = [ 'force_reply' => $force_reply ]; 
      if ( $input_field_placeholder !== NULL ) $args['input_field_placeholder'] = $input_field_placeholder;
      if ( $selective !== NULL ) $args['selective'] = $selective;
      return $args;
    }

    /**
     * This object represents a chat photo.
     * 
     * @see https://core.telegram.org/bots/api#ChatPhoto
     *
     * @param string $small_file_id File identifier of small (160x160) chat photo. This file_id can be used only for photo download and
     *                              only for as long as the photo is not changed.
     * @param string $small_file_unique_id Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and
     *                              for different bots. Can't be used to download or reuse the file.
     * @param string $big_file_id File identifier of big (640x640) chat photo. This file_id can be used only for photo download and
     *                              only for as long as the photo is not changed.
     * @param string $big_file_unique_id Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and
     *                              for different bots. Can't be used to download or reuse the file.
     *
     * @return array $args
     */
    public function ChatPhoto ( string $small_file_id, string $small_file_unique_id, string $big_file_id, string $big_file_unique_id ) : array {
      return [ 'small_file_id' => $small_file_id, 'small_file_unique_id' => $small_file_unique_id, 'big_file_id' => $big_file_id, 'big_file_unique_id' => $big_file_unique_id ];
    }

    /**
     * Represents an invite link for a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatInviteLink
     *
     * @param string $invite_link The invite link. If the link was created by another chat administrator, then the second part of the
     *                              link will be replaced with “…”.
     * @param User $creator Creator of the link
     * @param bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators
     * @param bool $is_primary True, if the link is primary
     * @param bool $is_revoked True, if the link is revoked
     * @param string|NULL $name Invite link name
     * @param int|NULL $expire_date Point in time (Unix timestamp) when the link will expire or has been expired
     * @param int|NULL $member_limit The maximum number of users that can be members of the chat simultaneously after joining the chat
     *                              via this invite link; 1-99999
     * @param int|NULL $pending_join_request_count Number of pending join requests created using this link
     * @param int|NULL $subscription_period The number of seconds the subscription will be active for before the next payment
     * @param int|NULL $subscription_price The amount of Telegram Stars a user must pay initially and after each subsequent subscription period
     *                              to be a member of the chat using the link
     *
     * @return array $args
     */
    public function ChatInviteLink ( string $invite_link, array $creator, bool $creates_join_request, bool $is_primary, bool $is_revoked, ?string $name = NULL, ?int $expire_date = NULL, ?int $member_limit = NULL, ?int $pending_join_request_count = NULL, ?int $subscription_period = NULL, ?int $subscription_price = NULL ) : array {
      $args = [ 'invite_link' => $invite_link, 'creator' => $creator, 'creates_join_request' => $creates_join_request, 'is_primary' => $is_primary, 'is_revoked' => $is_revoked ]; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $expire_date !== NULL ) $args['expire_date'] = $expire_date;
      if ( $member_limit !== NULL ) $args['member_limit'] = $member_limit;
      if ( $pending_join_request_count !== NULL ) $args['pending_join_request_count'] = $pending_join_request_count;
      if ( $subscription_period !== NULL ) $args['subscription_period'] = $subscription_period;
      if ( $subscription_price !== NULL ) $args['subscription_price'] = $subscription_price;
      return $args;
    }

    /**
     * Represents the rights of an administrator in a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatAdministratorRights
     *
     * @param bool $is_anonymous True, if the user's presence in the chat is hidden
     * @param bool $can_manage_chat True, if the administrator can access the chat event log, get boost list, see hidden supergroup and
     *                              channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool $can_delete_messages True, if the administrator can delete messages of other users
     * @param bool $can_manage_video_chats True, if the administrator can manage video chats
     * @param bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges or
     *                              demote administrators that they have promoted, directly or indirectly (promoted by administrators
     *                              that were appointed by the user)
     * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool $can_post_stories True, if the administrator can post stories to the chat
     * @param bool $can_edit_stories True, if the administrator can edit stories posted by other users, post stories to the chat page,
     *                              pin chat stories, and access the chat's story archive
     * @param bool $can_delete_stories True, if the administrator can delete stories posted by other users
     * @param bool|NULL $can_post_messages True, if the administrator can post messages in the channel, or access channel statistics; for
     *                              channels only
     * @param bool|NULL $can_edit_messages True, if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|NULL $can_pin_messages True, if the user is allowed to pin messages; for groups and supergroups only
     * @param bool|NULL $can_manage_topics True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     *
     * @return array $args
     */
    public function ChatAdministratorRights ( bool $is_anonymous = false, bool $can_manage_chat = false, bool $can_delete_messages = false, bool $can_manage_video_chats = false, bool $can_restrict_members = false, bool $can_promote_members = false, bool $can_change_info = false, bool $can_invite_users = false, bool $can_post_stories = false, bool $can_edit_stories = false, bool $can_delete_stories = false, ?bool $can_post_messages = NULL, ?bool $can_edit_messages = NULL, ?bool $can_pin_messages = NULL, ?bool $can_manage_topics = NULL ) : array {
      $args = [ 'is_anonymous' => $is_anonymous, 'can_manage_chat' => $can_manage_chat, 'can_delete_messages' => $can_delete_messages, 'can_manage_video_chats' => $can_manage_video_chats, 'can_restrict_members' => $can_restrict_members, 'can_promote_members' => $can_promote_members, 'can_change_info' => $can_change_info, 'can_invite_users' => $can_invite_users, 'can_post_stories' => $can_post_stories, 'can_edit_stories' => $can_edit_stories, 'can_delete_stories' => $can_delete_stories ]; 
      if ( $can_post_messages !== NULL ) $args['can_post_messages'] = $can_post_messages;
      if ( $can_edit_messages !== NULL ) $args['can_edit_messages'] = $can_edit_messages;
      if ( $can_pin_messages !== NULL ) $args['can_pin_messages'] = $can_pin_messages;
      if ( $can_manage_topics !== NULL ) $args['can_manage_topics'] = $can_manage_topics;
      return $args;
    }

    /**
     * This object represents changes in the status of a chat member.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberUpdated
     *
     * @param Chat $chat Chat the user belongs to
     * @param User $from Performer of the action, which resulted in the change
     * @param int $date Date the change was done in Unix time
     * @param ChatMember $old_chat_member Previous information about the chat member
     * @param ChatMember $new_chat_member New information about the chat member
     * @param ChatInviteLink|NULL $invite_link Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
     * @param bool|NULL $via_join_request True, if the user joined the chat after sending a direct join request without using an invite link
     *                              and being approved by an administrator
     * @param bool|NULL $via_chat_folder_invite_link True, if the user joined the chat via a chat folder invite link
     *
     * @return array $args
     */
    public function ChatMemberUpdated ( array $chat, array $from, int $date, array $old_chat_member, array $new_chat_member, ?array $invite_link = NULL, ?bool $via_join_request = NULL, ?bool $via_chat_folder_invite_link = NULL ) : array {
      $args = [ 'chat' => $chat, 'from' => $from, 'date' => $date, 'old_chat_member' => $old_chat_member, 'new_chat_member' => $new_chat_member ]; 
      if ( $invite_link !== NULL ) $args['invite_link'] = $invite_link;
      if ( $via_join_request !== NULL ) $args['via_join_request'] = $via_join_request;
      if ( $via_chat_folder_invite_link !== NULL ) $args['via_chat_folder_invite_link'] = $via_chat_folder_invite_link;
      return $args;
    }

    /**
     * This object contains information about one member of a chat. Currently, the following 6 types of
     * chat members are supported:
     * 
     * @see https://core.telegram.org/bots/api#ChatMember
     *
     *
     * @return array $args
     */
    public function ChatMember ( ) : array {
      return [];
    }

    /**
     * Represents a chat member that owns the chat and has all administrator privileges.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberOwner
     *
     * @param string $status The member's status in the chat, always “creator”
     * @param User $user Information about the user
     * @param bool $is_anonymous True, if the user's presence in the chat is hidden
     * @param string|NULL $custom_title Custom title for this user
     *
     * @return array $args
     */
    public function ChatMemberOwner ( string $status = 'creator', array $user, bool $is_anonymous, ?string $custom_title = NULL ) : array {
      $args = [ 'status' => $status, 'user' => $user, 'is_anonymous' => $is_anonymous ]; 
      if ( $custom_title !== NULL ) $args['custom_title'] = $custom_title;
      return $args;
    }

    /**
     * Represents a chat member that has some additional privileges.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberAdministrator
     *
     * @param string $status The member's status in the chat, always “administrator”
     * @param User $user Information about the user
     * @param bool $can_be_edited True, if the bot is allowed to edit administrator privileges of that user
     * @param bool $is_anonymous True, if the user's presence in the chat is hidden
     * @param bool $can_manage_chat True, if the administrator can access the chat event log, get boost list, see hidden supergroup and
     *                              channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool $can_delete_messages True, if the administrator can delete messages of other users
     * @param bool $can_manage_video_chats True, if the administrator can manage video chats
     * @param bool $can_restrict_members True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool $can_promote_members True, if the administrator can add new administrators with a subset of their own privileges or
     *                              demote administrators that they have promoted, directly or indirectly (promoted by administrators
     *                              that were appointed by the user)
     * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool $can_post_stories True, if the administrator can post stories to the chat
     * @param bool $can_edit_stories True, if the administrator can edit stories posted by other users, post stories to the chat page,
     *                              pin chat stories, and access the chat's story archive
     * @param bool $can_delete_stories True, if the administrator can delete stories posted by other users
     * @param bool|NULL $can_post_messages True, if the administrator can post messages in the channel, or access channel statistics; for
     *                              channels only
     * @param bool|NULL $can_edit_messages True, if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|NULL $can_pin_messages True, if the user is allowed to pin messages; for groups and supergroups only
     * @param bool|NULL $can_manage_topics True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     * @param string|NULL $custom_title Custom title for this user
     *
     * @return array $args
     */
    public function ChatMemberAdministrator ( string $status = 'administrator', array $user, bool $can_be_edited, bool $is_anonymous, bool $can_manage_chat, bool $can_delete_messages, bool $can_manage_video_chats, bool $can_restrict_members, bool $can_promote_members, bool $can_change_info, bool $can_invite_users, bool $can_post_stories, bool $can_edit_stories, bool $can_delete_stories, ?bool $can_post_messages = NULL, ?bool $can_edit_messages = NULL, ?bool $can_pin_messages = NULL, ?bool $can_manage_topics = NULL, ?string $custom_title = NULL ) : array {
      $args = [ 'status' => $status, 'user' => $user, 'can_be_edited' => $can_be_edited, 'is_anonymous' => $is_anonymous, 'can_manage_chat' => $can_manage_chat, 'can_delete_messages' => $can_delete_messages, 'can_manage_video_chats' => $can_manage_video_chats, 'can_restrict_members' => $can_restrict_members, 'can_promote_members' => $can_promote_members, 'can_change_info' => $can_change_info, 'can_invite_users' => $can_invite_users, 'can_post_stories' => $can_post_stories, 'can_edit_stories' => $can_edit_stories, 'can_delete_stories' => $can_delete_stories ]; 
      if ( $can_post_messages !== NULL ) $args['can_post_messages'] = $can_post_messages;
      if ( $can_edit_messages !== NULL ) $args['can_edit_messages'] = $can_edit_messages;
      if ( $can_pin_messages !== NULL ) $args['can_pin_messages'] = $can_pin_messages;
      if ( $can_manage_topics !== NULL ) $args['can_manage_topics'] = $can_manage_topics;
      if ( $custom_title !== NULL ) $args['custom_title'] = $custom_title;
      return $args;
    }

    /**
     * Represents a chat member that has no additional privileges or restrictions.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberMember
     *
     * @param string $status The member's status in the chat, always “member”
     * @param User $user Information about the user
     * @param int|NULL $until_date Date when the user's subscription will expire; Unix time
     *
     * @return array $args
     */
    public function ChatMemberMember ( string $status = 'member', array $user, ?int $until_date = NULL ) : array {
      $args = [ 'status' => $status, 'user' => $user ]; 
      if ( $until_date !== NULL ) $args['until_date'] = $until_date;
      return $args;
    }

    /**
     * Represents a chat member that is under certain restrictions in the chat. Supergroups only.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberRestricted
     *
     * @param string $status The member's status in the chat, always “restricted”
     * @param User $user Information about the user
     * @param bool $is_member True, if the user is a member of the chat at the moment of the request
     * @param bool $can_send_messages True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices,
     *                              locations and venues
     * @param bool $can_send_audios True, if the user is allowed to send audios
     * @param bool $can_send_documents True, if the user is allowed to send documents
     * @param bool $can_send_photos True, if the user is allowed to send photos
     * @param bool $can_send_videos True, if the user is allowed to send videos
     * @param bool $can_send_video_notes True, if the user is allowed to send video notes
     * @param bool $can_send_voice_notes True, if the user is allowed to send voice notes
     * @param bool $can_send_polls True, if the user is allowed to send polls
     * @param bool $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
     * @param bool $can_change_info True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool $can_pin_messages True, if the user is allowed to pin messages
     * @param bool $can_manage_topics True, if the user is allowed to create forum topics
     * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever
     *
     * @return array $args
     */
    public function ChatMemberRestricted ( string $status = 'restricted', array $user, bool $is_member, bool $can_send_messages, bool $can_send_audios, bool $can_send_documents, bool $can_send_photos, bool $can_send_videos, bool $can_send_video_notes, bool $can_send_voice_notes, bool $can_send_polls, bool $can_send_other_messages, bool $can_add_web_page_previews, bool $can_change_info, bool $can_invite_users, bool $can_pin_messages, bool $can_manage_topics, int $until_date ) : array {
      return [ 'status' => $status, 'user' => $user, 'is_member' => $is_member, 'can_send_messages' => $can_send_messages, 'can_send_audios' => $can_send_audios, 'can_send_documents' => $can_send_documents, 'can_send_photos' => $can_send_photos, 'can_send_videos' => $can_send_videos, 'can_send_video_notes' => $can_send_video_notes, 'can_send_voice_notes' => $can_send_voice_notes, 'can_send_polls' => $can_send_polls, 'can_send_other_messages' => $can_send_other_messages, 'can_add_web_page_previews' => $can_add_web_page_previews, 'can_change_info' => $can_change_info, 'can_invite_users' => $can_invite_users, 'can_pin_messages' => $can_pin_messages, 'can_manage_topics' => $can_manage_topics, 'until_date' => $until_date ];
    }

    /**
     * Represents a chat member that isn't currently a member of the chat, but may join it themselves.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberLeft
     *
     * @param string $status The member's status in the chat, always “left”
     * @param User $user Information about the user
     *
     * @return array $args
     */
    public function ChatMemberLeft ( string $status = 'left', array $user ) : array {
      return [ 'status' => $status, 'user' => $user ];
    }

    /**
     * Represents a chat member that was banned in the chat and can't return to the chat or view chat messages.
     * 
     * @see https://core.telegram.org/bots/api#ChatMemberBanned
     *
     * @param string $status The member's status in the chat, always “kicked”
     * @param User $user Information about the user
     * @param int $until_date Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
     *
     * @return array $args
     */
    public function ChatMemberBanned ( string $status = 'kicked', array $user, int $until_date ) : array {
      return [ 'status' => $status, 'user' => $user, 'until_date' => $until_date ];
    }

    /**
     * Represents a join request sent to a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatJoinRequest
     *
     * @param Chat $chat Chat to which the request was sent
     * @param User $from User that sent the join request
     * @param int $user_chat_id Identifier of a private chat with the user who sent the join request. This number may have more than
     *                              32 significant bits and some programming languages may have difficulty/silent defects in
     *                              interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision
     *                              float type are safe for storing this identifier. The bot can use this identifier for 5 minutes to
     *                              send messages until the join request is processed, assuming no other administrator contacted the user.
     * @param int $date Date the request was sent in Unix time
     * @param string|NULL $bio Bio of the user.
     * @param ChatInviteLink|NULL $invite_link Chat invite link that was used by the user to send the join request
     *
     * @return array $args
     */
    public function ChatJoinRequest ( array $chat, array $from, int $user_chat_id, int $date, ?string $bio = NULL, ?array $invite_link = NULL ) : array {
      $args = [ 'chat' => $chat, 'from' => $from, 'user_chat_id' => $user_chat_id, 'date' => $date ]; 
      if ( $bio !== NULL ) $args['bio'] = $bio;
      if ( $invite_link !== NULL ) $args['invite_link'] = $invite_link;
      return $args;
    }

    /**
     * Describes actions that a non-administrator user is allowed to take in a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatPermissions
     *
     * @param bool|NULL $can_send_messages True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices,
     *                              locations and venues
     * @param bool|NULL $can_send_audios True, if the user is allowed to send audios
     * @param bool|NULL $can_send_documents True, if the user is allowed to send documents
     * @param bool|NULL $can_send_photos True, if the user is allowed to send photos
     * @param bool|NULL $can_send_videos True, if the user is allowed to send videos
     * @param bool|NULL $can_send_video_notes True, if the user is allowed to send video notes
     * @param bool|NULL $can_send_voice_notes True, if the user is allowed to send voice notes
     * @param bool|NULL $can_send_polls True, if the user is allowed to send polls
     * @param bool|NULL $can_send_other_messages True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool|NULL $can_add_web_page_previews True, if the user is allowed to add web page previews to their messages
     * @param bool|NULL $can_change_info True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
     * @param bool|NULL $can_invite_users True, if the user is allowed to invite new users to the chat
     * @param bool|NULL $can_pin_messages True, if the user is allowed to pin messages. Ignored in public supergroups
     * @param bool|NULL $can_manage_topics True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
     *
     * @return array $args
     */
    public function ChatPermissions ( ?bool $can_send_messages = NULL, ?bool $can_send_audios = NULL, ?bool $can_send_documents = NULL, ?bool $can_send_photos = NULL, ?bool $can_send_videos = NULL, ?bool $can_send_video_notes = NULL, ?bool $can_send_voice_notes = NULL, ?bool $can_send_polls = NULL, ?bool $can_send_other_messages = NULL, ?bool $can_add_web_page_previews = NULL, ?bool $can_change_info = NULL, ?bool $can_invite_users = NULL, ?bool $can_pin_messages = NULL, ?bool $can_manage_topics = NULL ) : array {
      $args = []; 
      if ( $can_send_messages !== NULL ) $args['can_send_messages'] = $can_send_messages;
      if ( $can_send_audios !== NULL ) $args['can_send_audios'] = $can_send_audios;
      if ( $can_send_documents !== NULL ) $args['can_send_documents'] = $can_send_documents;
      if ( $can_send_photos !== NULL ) $args['can_send_photos'] = $can_send_photos;
      if ( $can_send_videos !== NULL ) $args['can_send_videos'] = $can_send_videos;
      if ( $can_send_video_notes !== NULL ) $args['can_send_video_notes'] = $can_send_video_notes;
      if ( $can_send_voice_notes !== NULL ) $args['can_send_voice_notes'] = $can_send_voice_notes;
      if ( $can_send_polls !== NULL ) $args['can_send_polls'] = $can_send_polls;
      if ( $can_send_other_messages !== NULL ) $args['can_send_other_messages'] = $can_send_other_messages;
      if ( $can_add_web_page_previews !== NULL ) $args['can_add_web_page_previews'] = $can_add_web_page_previews;
      if ( $can_change_info !== NULL ) $args['can_change_info'] = $can_change_info;
      if ( $can_invite_users !== NULL ) $args['can_invite_users'] = $can_invite_users;
      if ( $can_pin_messages !== NULL ) $args['can_pin_messages'] = $can_pin_messages;
      if ( $can_manage_topics !== NULL ) $args['can_manage_topics'] = $can_manage_topics;
      return $args;
    }

    /**
     * Describes the birthdate of a user.
     * 
     * @see https://core.telegram.org/bots/api#Birthdate
     *
     * @param int $day Day of the user's birth; 1-31
     * @param int $month Month of the user's birth; 1-12
     * @param int|NULL $year Year of the user's birth
     *
     * @return array $args
     */
    public function Birthdate ( int $day, int $month, ?int $year = NULL ) : array {
      $args = [ 'day' => $day, 'month' => $month ]; 
      if ( $year !== NULL ) $args['year'] = $year;
      return $args;
    }

    /**
     * Contains information about the start page settings of a Telegram Business account.
     * 
     * @see https://core.telegram.org/bots/api#BusinessIntro
     *
     * @param string|NULL $title Title text of the business intro
     * @param string|NULL $message Message text of the business intro
     * @param Sticker|NULL $sticker Sticker of the business intro
     *
     * @return array $args
     */
    public function BusinessIntro ( ?string $title = NULL, ?string $message = NULL, ?array $sticker = NULL ) : array {
      $args = []; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $message !== NULL ) $args['message'] = $message;
      if ( $sticker !== NULL ) $args['sticker'] = $sticker;
      return $args;
    }

    /**
     * Contains information about the location of a Telegram Business account.
     * 
     * @see https://core.telegram.org/bots/api#BusinessLocation
     *
     * @param string $address Address of the business
     * @param Location|NULL $location Location of the business
     *
     * @return array $args
     */
    public function BusinessLocation ( string $address, ?array $location = NULL ) : array {
      $args = [ 'address' => $address ]; 
      if ( $location !== NULL ) $args['location'] = $location;
      return $args;
    }

    /**
     * Describes an interval of time during which a business is open.
     * 
     * @see https://core.telegram.org/bots/api#BusinessOpeningHoursInterval
     *
     * @param int $opening_minute The minute's sequence number in a week, starting on Monday, marking the start of the time interval
     *                              during which the business is open; 0 - 7 * 24 * 60
     * @param int $closing_minute The minute's sequence number in a week, starting on Monday, marking the end of the time interval
     *                              during which the business is open; 0 - 8 * 24 * 60
     *
     * @return array $args
     */
    public function BusinessOpeningHoursInterval ( int $opening_minute, int $closing_minute ) : array {
      return [ 'opening_minute' => $opening_minute, 'closing_minute' => $closing_minute ];
    }

    /**
     * Describes the opening hours of a business.
     * 
     * @see https://core.telegram.org/bots/api#BusinessOpeningHours
     *
     * @param string $time_zone_name Unique name of the time zone for which the opening hours are defined
     * @param BusinessOpeningHoursInterval[] $opening_hours List of time intervals describing business opening hours
     *
     * @return array $args
     */
    public function BusinessOpeningHours ( string $time_zone_name, array $opening_hours ) : array {
      return [ 'time_zone_name' => $time_zone_name, 'opening_hours' => $opening_hours ];
    }

    /**
     * Describes the position of a clickable area within a story.
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaPosition
     *
     * @param float $x_percentage The abscissa of the area's center, as a percentage of the media width
     * @param float $y_percentage The ordinate of the area's center, as a percentage of the media height
     * @param float $width_percentage The width of the area's rectangle, as a percentage of the media width
     * @param float $height_percentage The height of the area's rectangle, as a percentage of the media height
     * @param float $rotation_angle The clockwise rotation angle of the rectangle, in degrees; 0-360
     * @param float $corner_radius_percentage The radius of the rectangle corner rounding, as a percentage of the media width
     *
     * @return array $args
     */
    public function StoryAreaPosition ( array $x_percentage, array $y_percentage, array $width_percentage, array $height_percentage, array $rotation_angle, array $corner_radius_percentage ) : array {
      return [ 'x_percentage' => $x_percentage, 'y_percentage' => $y_percentage, 'width_percentage' => $width_percentage, 'height_percentage' => $height_percentage, 'rotation_angle' => $rotation_angle, 'corner_radius_percentage' => $corner_radius_percentage ];
    }

    /**
     * Describes the physical address of a location.
     * 
     * @see https://core.telegram.org/bots/api#LocationAddress
     *
     * @param string $country_code The two-letter ISO 3166-1 alpha-2 country code of the country where the location is located
     * @param string|NULL $state State of the location
     * @param string|NULL $city City of the location
     * @param string|NULL $street Street address of the location
     *
     * @return array $args
     */
    public function LocationAddress ( string $country_code, ?string $state = NULL, ?string $city = NULL, ?string $street = NULL ) : array {
      $args = [ 'country_code' => $country_code ]; 
      if ( $state !== NULL ) $args['state'] = $state;
      if ( $city !== NULL ) $args['city'] = $city;
      if ( $street !== NULL ) $args['street'] = $street;
      return $args;
    }

    /**
     * Describes the type of a clickable area on a story. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaType
     *
     *
     * @return array $args
     */
    public function StoryAreaType ( ) : array {
      return [];
    }

    /**
     * Describes a story area pointing to a location. Currently, a story can have up to 10 location areas.
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaTypeLocation
     *
     * @param string $type Type of the area, always “location”
     * @param float $latitude Location latitude in degrees
     * @param float $longitude Location longitude in degrees
     * @param LocationAddress|NULL $address Address of the location
     *
     * @return array $args
     */
    public function StoryAreaTypeLocation ( string $type = 'location', array $latitude, array $longitude, ?array $address = NULL ) : array {
      $args = [ 'type' => $type, 'latitude' => $latitude, 'longitude' => $longitude ]; 
      if ( $address !== NULL ) $args['address'] = $address;
      return $args;
    }

    /**
     * Describes a story area pointing to a suggested reaction. Currently, a story can have up to 5
     * suggested reaction areas.
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaTypeSuggestedReaction
     *
     * @param string $type Type of the area, always “suggested_reaction”
     * @param ReactionType $reaction_type Type of the reaction
     * @param bool|NULL $is_dark Pass True if the reaction area has a dark background
     * @param bool|NULL $is_flipped Pass True if reaction area corner is flipped
     *
     * @return array $args
     */
    public function StoryAreaTypeSuggestedReaction ( string $type = 'suggested_reaction', array $reaction_type, ?bool $is_dark = NULL, ?bool $is_flipped = NULL ) : array {
      $args = [ 'type' => $type, 'reaction_type' => $reaction_type ]; 
      if ( $is_dark !== NULL ) $args['is_dark'] = $is_dark;
      if ( $is_flipped !== NULL ) $args['is_flipped'] = $is_flipped;
      return $args;
    }

    /**
     * Describes a story area pointing to an HTTP or tg:// link. Currently, a story can have up to 3 link areas.
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaTypeLink
     *
     * @param string $type Type of the area, always “link”
     * @param string $url HTTP or tg:// URL to be opened when the area is clicked
     *
     * @return array $args
     */
    public function StoryAreaTypeLink ( string $type = 'link', string $url ) : array {
      return [ 'type' => $type, 'url' => $url ];
    }

    /**
     * Describes a story area containing weather information. Currently, a story can have up to 3 weather areas.
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaTypeWeather
     *
     * @param string $type Type of the area, always “weather”
     * @param float $temperature Temperature, in degree Celsius
     * @param string $emoji Emoji representing the weather
     * @param int $background_color A color of the area background in the ARGB format
     *
     * @return array $args
     */
    public function StoryAreaTypeWeather ( string $type = 'weather', array $temperature, string $emoji, int $background_color ) : array {
      return [ 'type' => $type, 'temperature' => $temperature, 'emoji' => $emoji, 'background_color' => $background_color ];
    }

    /**
     * Describes a story area pointing to a unique gift. Currently, a story can have at most 1 unique gift area.
     * 
     * @see https://core.telegram.org/bots/api#StoryAreaTypeUniqueGift
     *
     * @param string $type Type of the area, always “unique_gift”
     * @param string $name Unique name of the gift
     *
     * @return array $args
     */
    public function StoryAreaTypeUniqueGift ( string $type = 'unique_gift', string $name ) : array {
      return [ 'type' => $type, 'name' => $name ];
    }

    /**
     * Describes a clickable area on a story media.
     * 
     * @see https://core.telegram.org/bots/api#StoryArea
     *
     * @param StoryAreaPosition $position Position of the area
     * @param StoryAreaType $type Type of the area
     *
     * @return array $args
     */
    public function StoryArea ( array $position, array $type ) : array {
      return [ 'position' => $position, 'type' => $type ];
    }

    /**
     * Represents a location to which a chat is connected.
     * 
     * @see https://core.telegram.org/bots/api#ChatLocation
     *
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string $address Location address; 1-64 characters, as defined by the chat owner
     *
     * @return array $args
     */
    public function ChatLocation ( array $location, string $address ) : array {
      return [ 'location' => $location, 'address' => $address ];
    }

    /**
     * This object describes the type of a reaction. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#ReactionType
     *
     *
     * @return array $args
     */
    public function ReactionType ( ) : array {
      return [];
    }

    /**
     * The reaction is based on an emoji.
     * 
     * @see https://core.telegram.org/bots/api#ReactionTypeEmoji
     *
     * @param string $type Type of the reaction, always “emoji”
     * @param string $emoji Reaction emoji. Currently, it can be one of "👍", "👎", "❤", "🔥", "🥰", "👏", "😁",
     *                              "🤔", "🤯", "😱", "🤬", "😢", "🎉", "🤩", "🤮", "💩", "🙏", "👌", "🕊",
     *                              "🤡", "🥱", "🥴", "😍", "🐳", "❤‍🔥", "🌚", "🌭", "💯", "🤣", "⚡", "🍌",
     *                              "🏆", "💔", "🤨", "😐", "🍓", "🍾", "💋", "🖕", "😈", "😴", "😭", "🤓",
     *                              "👻", "👨‍💻", "👀", "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗", "🫡",
     *                              "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄", "😘", "💊",
     *                              "🙊", "😎", "👾", "🤷‍♂", "🤷", "🤷‍♀", "😡"
     *
     * @return array $args
     */
    public function ReactionTypeEmoji ( string $type = 'emoji', string $emoji ) : array {
      return [ 'type' => $type, 'emoji' => $emoji ];
    }

    /**
     * The reaction is based on a custom emoji.
     * 
     * @see https://core.telegram.org/bots/api#ReactionTypeCustomEmoji
     *
     * @param string $type Type of the reaction, always “custom_emoji”
     * @param string $custom_emoji_id Custom emoji identifier
     *
     * @return array $args
     */
    public function ReactionTypeCustomEmoji ( string $type = 'custom_emoji', string $custom_emoji_id ) : array {
      return [ 'type' => $type, 'custom_emoji_id' => $custom_emoji_id ];
    }

    /**
     * The reaction is paid.
     * 
     * @see https://core.telegram.org/bots/api#ReactionTypePaid
     *
     * @param string $type Type of the reaction, always “paid”
     *
     * @return array $args
     */
    public function ReactionTypePaid ( string $type = 'paid' ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Represents a reaction added to a message along with the number of times it was added.
     * 
     * @see https://core.telegram.org/bots/api#ReactionCount
     *
     * @param ReactionType $type Type of the reaction
     * @param int $total_count Number of times the reaction was added
     *
     * @return array $args
     */
    public function ReactionCount ( array $type, int $total_count ) : array {
      return [ 'type' => $type, 'total_count' => $total_count ];
    }

    /**
     * This object represents a change of a reaction on a message performed by a user.
     * 
     * @see https://core.telegram.org/bots/api#MessageReactionUpdated
     *
     * @param Chat $chat The chat containing the message the user reacted to
     * @param int $message_id Unique identifier of the message inside the chat
     * @param User|NULL $user The user that changed the reaction, if the user isn't anonymous
     * @param Chat|NULL $actor_chat The chat on behalf of which the reaction was changed, if the user is anonymous
     * @param int $date Date of the change in Unix time
     * @param ReactionType[] $old_reaction Previous list of reaction types that were set by the user
     * @param ReactionType[] $new_reaction New list of reaction types that have been set by the user
     *
     * @return array $args
     */
    public function MessageReactionUpdated ( array $chat, int $message_id, int $date, array $old_reaction, array $new_reaction, ?array $user = NULL, ?array $actor_chat = NULL ) : array {
      $args = [ 'chat' => $chat, 'message_id' => $message_id, 'date' => $date, 'old_reaction' => $old_reaction, 'new_reaction' => $new_reaction ]; 
      if ( $user !== NULL ) $args['user'] = $user;
      if ( $actor_chat !== NULL ) $args['actor_chat'] = $actor_chat;
      return $args;
    }

    /**
     * This object represents reaction changes on a message with anonymous reactions.
     * 
     * @see https://core.telegram.org/bots/api#MessageReactionCountUpdated
     *
     * @param Chat $chat The chat containing the message
     * @param int $message_id Unique message identifier inside the chat
     * @param int $date Date of the change in Unix time
     * @param ReactionCount[] $reactions List of reactions that are present on the message
     *
     * @return array $args
     */
    public function MessageReactionCountUpdated ( array $chat, int $message_id, int $date, array $reactions ) : array {
      return [ 'chat' => $chat, 'message_id' => $message_id, 'date' => $date, 'reactions' => $reactions ];
    }

    /**
     * This object represents a forum topic.
     * 
     * @see https://core.telegram.org/bots/api#ForumTopic
     *
     * @param int $message_thread_id Unique identifier of the forum topic
     * @param string $name Name of the topic
     * @param int $icon_color Color of the topic icon in RGB format
     * @param string|NULL $icon_custom_emoji_id Unique identifier of the custom emoji shown as the topic icon
     *
     * @return array $args
     */
    public function ForumTopic ( int $message_thread_id, string $name, int $icon_color, ?string $icon_custom_emoji_id = NULL ) : array {
      $args = [ 'message_thread_id' => $message_thread_id, 'name' => $name, 'icon_color' => $icon_color ]; 
      if ( $icon_custom_emoji_id !== NULL ) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;
      return $args;
    }

    /**
     * This object represents a gift that can be sent by the bot.
     * 
     * @see https://core.telegram.org/bots/api#Gift
     *
     * @param string $id Unique identifier of the gift
     * @param Sticker $sticker The sticker that represents the gift
     * @param int $star_count The number of Telegram Stars that must be paid to send the sticker
     * @param int|NULL $upgrade_star_count The number of Telegram Stars that must be paid to upgrade the gift to a unique one
     * @param int|NULL $total_count The total number of the gifts of this type that can be sent; for limited gifts only
     * @param int|NULL $remaining_count The number of remaining gifts of this type that can be sent; for limited gifts only
     *
     * @return array $args
     */
    public function Gift ( string $id, array $sticker, int $star_count, ?int $upgrade_star_count = NULL, ?int $total_count = NULL, ?int $remaining_count = NULL ) : array {
      $args = [ 'id' => $id, 'sticker' => $sticker, 'star_count' => $star_count ]; 
      if ( $upgrade_star_count !== NULL ) $args['upgrade_star_count'] = $upgrade_star_count;
      if ( $total_count !== NULL ) $args['total_count'] = $total_count;
      if ( $remaining_count !== NULL ) $args['remaining_count'] = $remaining_count;
      return $args;
    }

    /**
     * This object represent a list of gifts.
     * 
     * @see https://core.telegram.org/bots/api#Gifts
     *
     * @param Gift[] $gifts The list of gifts
     *
     * @return array $args
     */
    public function Gifts ( array $gifts ) : array {
      return [ 'gifts' => $gifts ];
    }

    /**
     * This object describes the model of a unique gift.
     * 
     * @see https://core.telegram.org/bots/api#UniqueGiftModel
     *
     * @param string $name Name of the model
     * @param Sticker $sticker The sticker that represents the unique gift
     * @param int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
     *
     * @return array $args
     */
    public function UniqueGiftModel ( string $name, array $sticker, int $rarity_per_mille ) : array {
      return [ 'name' => $name, 'sticker' => $sticker, 'rarity_per_mille' => $rarity_per_mille ];
    }

    /**
     * This object describes the symbol shown on the pattern of a unique gift.
     * 
     * @see https://core.telegram.org/bots/api#UniqueGiftSymbol
     *
     * @param string $name Name of the symbol
     * @param Sticker $sticker The sticker that represents the unique gift
     * @param int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
     *
     * @return array $args
     */
    public function UniqueGiftSymbol ( string $name, array $sticker, int $rarity_per_mille ) : array {
      return [ 'name' => $name, 'sticker' => $sticker, 'rarity_per_mille' => $rarity_per_mille ];
    }

    /**
     * This object describes the colors of the backdrop of a unique gift.
     * 
     * @see https://core.telegram.org/bots/api#UniqueGiftBackdropColors
     *
     * @param int $center_color The color in the center of the backdrop in RGB format
     * @param int $edge_color The color on the edges of the backdrop in RGB format
     * @param int $symbol_color The color to be applied to the symbol in RGB format
     * @param int $text_color The color for the text on the backdrop in RGB format
     *
     * @return array $args
     */
    public function UniqueGiftBackdropColors ( int $center_color, int $edge_color, int $symbol_color, int $text_color ) : array {
      return [ 'center_color' => $center_color, 'edge_color' => $edge_color, 'symbol_color' => $symbol_color, 'text_color' => $text_color ];
    }

    /**
     * This object describes the backdrop of a unique gift.
     * 
     * @see https://core.telegram.org/bots/api#UniqueGiftBackdrop
     *
     * @param string $name Name of the backdrop
     * @param UniqueGiftBackdropColors $colors Colors of the backdrop
     * @param int $rarity_per_mille The number of unique gifts that receive this backdrop for every 1000 gifts upgraded
     *
     * @return array $args
     */
    public function UniqueGiftBackdrop ( string $name, array $colors, int $rarity_per_mille ) : array {
      return [ 'name' => $name, 'colors' => $colors, 'rarity_per_mille' => $rarity_per_mille ];
    }

    /**
     * This object describes a unique gift that was upgraded from a regular gift.
     * 
     * @see https://core.telegram.org/bots/api#UniqueGift
     *
     * @param string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
     * @param string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
     * @param int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
     * @param UniqueGiftModel $model Model of the gift
     * @param UniqueGiftSymbol $symbol Symbol of the gift
     * @param UniqueGiftBackdrop $backdrop Backdrop of the gift
     *
     * @return array $args
     */
    public function UniqueGift ( string $base_name, string $name, int $number, array $model, array $symbol, array $backdrop ) : array {
      return [ 'base_name' => $base_name, 'name' => $name, 'number' => $number, 'model' => $model, 'symbol' => $symbol, 'backdrop' => $backdrop ];
    }

    /**
     * Describes a service message about a regular gift that was sent or received.
     * 
     * @see https://core.telegram.org/bots/api#GiftInfo
     *
     * @param Gift $gift Information about the gift
     * @param string|NULL $owned_gift_id Unique identifier of the received gift for the bot; only present for gifts received on behalf of
     *                              business accounts
     * @param int|NULL $convert_star_count Number of Telegram Stars that can be claimed by the receiver by converting the gift; omitted if
     *                              conversion to Telegram Stars is impossible
     * @param int|NULL $prepaid_upgrade_star_count Number of Telegram Stars that were prepaid by the sender for the ability to upgrade the gift
     * @param bool|NULL $can_be_upgraded True, if the gift can be upgraded to a unique gift
     * @param string|NULL $text Text of the message that was added to the gift
     * @param MessageEntity[]|NULL $entities Special entities that appear in the text
     * @param bool|NULL $is_private True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone will be
     *                              able to see them
     *
     * @return array $args
     */
    public function GiftInfo ( array $gift, ?string $owned_gift_id = NULL, ?int $convert_star_count = NULL, ?int $prepaid_upgrade_star_count = NULL, ?bool $can_be_upgraded = NULL, ?string $text = NULL, ?array $entities = NULL, ?bool $is_private = NULL ) : array {
      $args = [ 'gift' => $gift ]; 
      if ( $owned_gift_id !== NULL ) $args['owned_gift_id'] = $owned_gift_id;
      if ( $convert_star_count !== NULL ) $args['convert_star_count'] = $convert_star_count;
      if ( $prepaid_upgrade_star_count !== NULL ) $args['prepaid_upgrade_star_count'] = $prepaid_upgrade_star_count;
      if ( $can_be_upgraded !== NULL ) $args['can_be_upgraded'] = $can_be_upgraded;
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $entities !== NULL ) $args['entities'] = $entities;
      if ( $is_private !== NULL ) $args['is_private'] = $is_private;
      return $args;
    }

    /**
     * Describes a service message about a unique gift that was sent or received.
     * 
     * @see https://core.telegram.org/bots/api#UniqueGiftInfo
     *
     * @param UniqueGift $gift Information about the gift
     * @param string $origin Origin of the gift. Currently, either “upgrade” or “transfer”
     * @param string|NULL $owned_gift_id Unique identifier of the received gift for the bot; only present for gifts received on behalf of
     *                              business accounts
     * @param int|NULL $transfer_star_count Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot transfer
     *                              the gift
     *
     * @return array $args
     */
    public function UniqueGiftInfo ( array $gift, string $origin, ?string $owned_gift_id = NULL, ?int $transfer_star_count = NULL ) : array {
      $args = [ 'gift' => $gift, 'origin' => $origin ]; 
      if ( $owned_gift_id !== NULL ) $args['owned_gift_id'] = $owned_gift_id;
      if ( $transfer_star_count !== NULL ) $args['transfer_star_count'] = $transfer_star_count;
      return $args;
    }

    /**
     * This object describes a gift received and owned by a user or a chat. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#OwnedGift
     *
     *
     * @return array $args
     */
    public function OwnedGift ( ) : array {
      return [];
    }

    /**
     * Describes a regular gift owned by a user or a chat.
     * 
     * @see https://core.telegram.org/bots/api#OwnedGiftRegular
     *
     * @param string $type Type of the gift, always “regular”
     * @param Gift $gift Information about the regular gift
     * @param string|NULL $owned_gift_id Unique identifier of the gift for the bot; for gifts received on behalf of business accounts only
     * @param User|NULL $sender_user Sender of the gift if it is a known user
     * @param int $send_date Date the gift was sent in Unix time
     * @param string|NULL $text Text of the message that was added to the gift
     * @param MessageEntity[]|NULL $entities Special entities that appear in the text
     * @param bool|NULL $is_private True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone will be
     *                              able to see them
     * @param bool|NULL $is_saved True, if the gift is displayed on the account's profile page; for gifts received on behalf of
     *                              business accounts only
     * @param bool|NULL $can_be_upgraded True, if the gift can be upgraded to a unique gift; for gifts received on behalf of business
     *                              accounts only
     * @param bool|NULL $was_refunded True, if the gift was refunded and isn't available anymore
     * @param int|NULL $convert_star_count Number of Telegram Stars that can be claimed by the receiver instead of the gift; omitted if the
     *                              gift cannot be converted to Telegram Stars
     * @param int|NULL $prepaid_upgrade_star_count Number of Telegram Stars that were paid by the sender for the ability to upgrade the gift
     *
     * @return array $args
     */
    public function OwnedGiftRegular ( string $type = 'regular', array $gift, int $send_date, ?string $owned_gift_id = NULL, ?array $sender_user = NULL, ?string $text = NULL, ?array $entities = NULL, ?bool $is_private = NULL, ?bool $is_saved = NULL, ?bool $can_be_upgraded = NULL, ?bool $was_refunded = NULL, ?int $convert_star_count = NULL, ?int $prepaid_upgrade_star_count = NULL ) : array {
      $args = [ 'type' => $type, 'gift' => $gift, 'send_date' => $send_date ]; 
      if ( $owned_gift_id !== NULL ) $args['owned_gift_id'] = $owned_gift_id;
      if ( $sender_user !== NULL ) $args['sender_user'] = $sender_user;
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $entities !== NULL ) $args['entities'] = $entities;
      if ( $is_private !== NULL ) $args['is_private'] = $is_private;
      if ( $is_saved !== NULL ) $args['is_saved'] = $is_saved;
      if ( $can_be_upgraded !== NULL ) $args['can_be_upgraded'] = $can_be_upgraded;
      if ( $was_refunded !== NULL ) $args['was_refunded'] = $was_refunded;
      if ( $convert_star_count !== NULL ) $args['convert_star_count'] = $convert_star_count;
      if ( $prepaid_upgrade_star_count !== NULL ) $args['prepaid_upgrade_star_count'] = $prepaid_upgrade_star_count;
      return $args;
    }

    /**
     * Describes a unique gift received and owned by a user or a chat.
     * 
     * @see https://core.telegram.org/bots/api#OwnedGiftUnique
     *
     * @param string $type Type of the gift, always “unique”
     * @param UniqueGift $gift Information about the unique gift
     * @param string|NULL $owned_gift_id Unique identifier of the received gift for the bot; for gifts received on behalf of business
     *                              accounts only
     * @param User|NULL $sender_user Sender of the gift if it is a known user
     * @param int $send_date Date the gift was sent in Unix time
     * @param bool|NULL $is_saved True, if the gift is displayed on the account's profile page; for gifts received on behalf of
     *                              business accounts only
     * @param bool|NULL $can_be_transferred True, if the gift can be transferred to another owner; for gifts received on behalf of business
     *                              accounts only
     * @param int|NULL $transfer_star_count Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot transfer
     *                              the gift
     *
     * @return array $args
     */
    public function OwnedGiftUnique ( string $type = 'unique', array $gift, int $send_date, ?string $owned_gift_id = NULL, ?array $sender_user = NULL, ?bool $is_saved = NULL, ?bool $can_be_transferred = NULL, ?int $transfer_star_count = NULL ) : array {
      $args = [ 'type' => $type, 'gift' => $gift, 'send_date' => $send_date ]; 
      if ( $owned_gift_id !== NULL ) $args['owned_gift_id'] = $owned_gift_id;
      if ( $sender_user !== NULL ) $args['sender_user'] = $sender_user;
      if ( $is_saved !== NULL ) $args['is_saved'] = $is_saved;
      if ( $can_be_transferred !== NULL ) $args['can_be_transferred'] = $can_be_transferred;
      if ( $transfer_star_count !== NULL ) $args['transfer_star_count'] = $transfer_star_count;
      return $args;
    }

    /**
     * Contains the list of gifts received and owned by a user or a chat.
     * 
     * @see https://core.telegram.org/bots/api#OwnedGifts
     *
     * @param int $total_count The total number of gifts owned by the user or the chat
     * @param OwnedGift[] $gifts The list of gifts
     * @param string|NULL $next_offset Offset for the next request. If empty, then there are no more results
     *
     * @return array $args
     */
    public function OwnedGifts ( int $total_count, array $gifts, ?string $next_offset = NULL ) : array {
      $args = [ 'total_count' => $total_count, 'gifts' => $gifts ]; 
      if ( $next_offset !== NULL ) $args['next_offset'] = $next_offset;
      return $args;
    }

    /**
     * This object describes the types of gifts that can be gifted to a user or a chat.
     * 
     * @see https://core.telegram.org/bots/api#AcceptedGiftTypes
     *
     * @param bool $unlimited_gifts True, if unlimited regular gifts are accepted
     * @param bool $limited_gifts True, if limited regular gifts are accepted
     * @param bool $unique_gifts True, if unique gifts or gifts that can be upgraded to unique for free are accepted
     * @param bool $premium_subscription True, if a Telegram Premium subscription is accepted
     *
     * @return array $args
     */
    public function AcceptedGiftTypes ( bool $unlimited_gifts, bool $limited_gifts, bool $unique_gifts, bool $premium_subscription ) : array {
      return [ 'unlimited_gifts' => $unlimited_gifts, 'limited_gifts' => $limited_gifts, 'unique_gifts' => $unique_gifts, 'premium_subscription' => $premium_subscription ];
    }

    /**
     * Describes an amount of Telegram Stars.
     * 
     * @see https://core.telegram.org/bots/api#StarAmount
     *
     * @param int $amount Integer amount of Telegram Stars, rounded to 0; can be negative
     * @param int|NULL $nanostar_amount The number of 1/1000000000 shares of Telegram Stars; from -999999999 to 999999999; can be negative
     *                              if and only if amount is non-positive
     *
     * @return array $args
     */
    public function StarAmount ( int $amount, ?int $nanostar_amount = NULL ) : array {
      $args = [ 'amount' => $amount ]; 
      if ( $nanostar_amount !== NULL ) $args['nanostar_amount'] = $nanostar_amount;
      return $args;
    }

    /**
     * This object represents a bot command.
     * 
     * @see https://core.telegram.org/bots/api#BotCommand
     *
     * @param string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     * @param string $description Description of the command; 1-256 characters.
     *
     * @return array $args
     */
    public function BotCommand ( string $command, string $description ) : array {
      return [ 'command' => $command, 'description' => $description ];
    }

    /**
     * This object represents the scope to which bot commands are applied. Currently, the following 7
     * scopes are supported:
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScope
     *
     *
     * @return array $args
     */
    public function BotCommandScope ( ) : array {
      return [];
    }

    /**
     * Represents the default scope of bot commands. Default commands are used if no commands with a
     * narrower scope are specified for the user.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeDefault
     *
     * @param string $type Scope type, must be default
     *
     * @return array $args
     */
    public function BotCommandScopeDefault ( string $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Represents the scope of bot commands, covering all private chats.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeAllPrivateChats
     *
     * @param string $type Scope type, must be all_private_chats
     *
     * @return array $args
     */
    public function BotCommandScopeAllPrivateChats ( string $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Represents the scope of bot commands, covering all group and supergroup chats.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeAllGroupChats
     *
     * @param string $type Scope type, must be all_group_chats
     *
     * @return array $args
     */
    public function BotCommandScopeAllGroupChats ( string $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Represents the scope of bot commands, covering all group and supergroup chat administrators.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeAllChatAdministrators
     *
     * @param string $type Scope type, must be all_chat_administrators
     *
     * @return array $args
     */
    public function BotCommandScopeAllChatAdministrators ( string $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Represents the scope of bot commands, covering a specific chat.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeChat
     *
     * @param string $type Scope type, must be chat
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return array $args
     */
    public function BotCommandScopeChat ( string $type, int|string $chat_id ) : array {
      return [ 'type' => $type, 'chat_id' => $chat_id ];
    }

    /**
     * Represents the scope of bot commands, covering all administrators of a specific group or supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeChatAdministrators
     *
     * @param string $type Scope type, must be chat_administrators
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return array $args
     */
    public function BotCommandScopeChatAdministrators ( string $type, int|string $chat_id ) : array {
      return [ 'type' => $type, 'chat_id' => $chat_id ];
    }

    /**
     * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#BotCommandScopeChatMember
     *
     * @param string $type Scope type, must be chat_member
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $user_id Unique identifier of the target user
     *
     * @return array $args
     */
    public function BotCommandScopeChatMember ( string $type, int|string $chat_id, int $user_id ) : array {
      return [ 'type' => $type, 'chat_id' => $chat_id, 'user_id' => $user_id ];
    }

    /**
     * This object represents the bot's name.
     * 
     * @see https://core.telegram.org/bots/api#BotName
     *
     * @param string $name The bot's name
     *
     * @return array $args
     */
    public function BotName ( string $name ) : array {
      return [ 'name' => $name ];
    }

    /**
     * This object represents the bot's description.
     * 
     * @see https://core.telegram.org/bots/api#BotDescription
     *
     * @param string $description The bot's description
     *
     * @return array $args
     */
    public function BotDescription ( string $description ) : array {
      return [ 'description' => $description ];
    }

    /**
     * This object represents the bot's short description.
     * 
     * @see https://core.telegram.org/bots/api#BotShortDescription
     *
     * @param string $short_description The bot's short description
     *
     * @return array $args
     */
    public function BotShortDescription ( string $short_description ) : array {
      return [ 'short_description' => $short_description ];
    }

    /**
     * This object describes the bot's menu button in a private chat. It should be one of
     * 
     * @see https://core.telegram.org/bots/api#MenuButton
     *
     *
     * @return array $args
     */
    public function MenuButton ( ) : array {
      return [];
    }

    /**
     * Represents a menu button, which opens the bot's list of commands.
     * 
     * @see https://core.telegram.org/bots/api#MenuButtonCommands
     *
     * @param string $type Type of the button, must be commands
     *
     * @return array $args
     */
    public function MenuButtonCommands ( string $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Represents a menu button, which launches a Web App.
     * 
     * @see https://core.telegram.org/bots/api#MenuButtonWebApp
     *
     * @param string $type Type of the button, must be web_app
     * @param string $text Text on the button
     * @param WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App will
     *                              be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
     *                              Alternatively, a t.me link to a Web App of the bot can be specified in the object instead of the Web
     *                              App's URL, in which case the Web App will be opened as if the user pressed the link.
     *
     * @return array $args
     */
    public function MenuButtonWebApp ( string $type, string $text, array $web_app ) : array {
      return [ 'type' => $type, 'text' => $text, 'web_app' => $web_app ];
    }

    /**
     * Describes that no specific value for the menu button was set.
     * 
     * @see https://core.telegram.org/bots/api#MenuButtonDefault
     *
     * @param string $type Type of the button, must be default
     *
     * @return array $args
     */
    public function MenuButtonDefault ( string $type ) : array {
      return [ 'type' => $type ];
    }

    /**
     * This object describes the source of a chat boost. It can be one of
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostSource
     *
     *
     * @return array $args
     */
    public function ChatBoostSource ( ) : array {
      return [];
    }

    /**
     * The boost was obtained by subscribing to Telegram Premium or by gifting a Telegram Premium
     * subscription to another user.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostSourcePremium
     *
     * @param string $source Source of the boost, always “premium”
     * @param User $user User that boosted the chat
     *
     * @return array $args
     */
    public function ChatBoostSourcePremium ( string $source = 'premium', array $user ) : array {
      return [ 'source' => $source, 'user' => $user ];
    }

    /**
     * The boost was obtained by the creation of Telegram Premium gift codes to boost a chat. Each such
     * code boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostSourceGiftCode
     *
     * @param string $source Source of the boost, always “gift_code”
     * @param User $user User for which the gift code was created
     *
     * @return array $args
     */
    public function ChatBoostSourceGiftCode ( string $source = 'gift_code', array $user ) : array {
      return [ 'source' => $source, 'user' => $user ];
    }

    /**
     * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This
     * boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription for
     * Telegram Premium giveaways and prize_star_count / 500 times for one year for Telegram Star giveaways.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostSourceGiveaway
     *
     * @param string $source Source of the boost, always “giveaway”
     * @param int $giveaway_message_id Identifier of a message in the chat with the giveaway; the message could have been deleted already.
     *                              May be 0 if the message isn't sent yet.
     * @param User|NULL $user User that won the prize in the giveaway if any; for Telegram Premium giveaways only
     * @param int|NULL $prize_star_count The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
     * @param bool|NULL $is_unclaimed True, if the giveaway was completed, but there was no user to win the prize
     *
     * @return array $args
     */
    public function ChatBoostSourceGiveaway ( string $source = 'giveaway', int $giveaway_message_id, ?array $user = NULL, ?int $prize_star_count = NULL, ?bool $is_unclaimed = NULL ) : array {
      $args = [ 'source' => $source, 'giveaway_message_id' => $giveaway_message_id ]; 
      if ( $user !== NULL ) $args['user'] = $user;
      if ( $prize_star_count !== NULL ) $args['prize_star_count'] = $prize_star_count;
      if ( $is_unclaimed !== NULL ) $args['is_unclaimed'] = $is_unclaimed;
      return $args;
    }

    /**
     * This object contains information about a chat boost.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoost
     *
     * @param string $boost_id Unique identifier of the boost
     * @param int $add_date Point in time (Unix timestamp) when the chat was boosted
     * @param int $expiration_date Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's
     *                              Telegram Premium subscription is prolonged
     * @param ChatBoostSource $source Source of the added boost
     *
     * @return array $args
     */
    public function ChatBoost ( string $boost_id, int $add_date, int $expiration_date, array $source ) : array {
      return [ 'boost_id' => $boost_id, 'add_date' => $add_date, 'expiration_date' => $expiration_date, 'source' => $source ];
    }

    /**
     * This object represents a boost added to a chat or changed.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostUpdated
     *
     * @param Chat $chat Chat which was boosted
     * @param ChatBoost $boost Information about the chat boost
     *
     * @return array $args
     */
    public function ChatBoostUpdated ( array $chat, array $boost ) : array {
      return [ 'chat' => $chat, 'boost' => $boost ];
    }

    /**
     * This object represents a boost removed from a chat.
     * 
     * @see https://core.telegram.org/bots/api#ChatBoostRemoved
     *
     * @param Chat $chat Chat which was boosted
     * @param string $boost_id Unique identifier of the boost
     * @param int $remove_date Point in time (Unix timestamp) when the boost was removed
     * @param ChatBoostSource $source Source of the removed boost
     *
     * @return array $args
     */
    public function ChatBoostRemoved ( array $chat, string $boost_id, int $remove_date, array $source ) : array {
      return [ 'chat' => $chat, 'boost_id' => $boost_id, 'remove_date' => $remove_date, 'source' => $source ];
    }

    /**
     * This object represents a list of boosts added to a chat by a user.
     * 
     * @see https://core.telegram.org/bots/api#UserChatBoosts
     *
     * @param ChatBoost[] $boosts The list of boosts added to the chat by the user
     *
     * @return array $args
     */
    public function UserChatBoosts ( array $boosts ) : array {
      return [ 'boosts' => $boosts ];
    }

    /**
     * Represents the rights of a business bot.
     * 
     * @see https://core.telegram.org/bots/api#BusinessBotRights
     *
     * @param bool|NULL $can_reply True, if the bot can send and edit messages in the private chats that had incoming messages in the
     *                              last 24 hours
     * @param bool|NULL $can_read_messages True, if the bot can mark incoming private messages as read
     * @param bool|NULL $can_delete_outgoing_messages True, if the bot can delete messages sent by the bot
     * @param bool|NULL $can_delete_all_messages True, if the bot can delete all private messages in managed chats
     * @param bool|NULL $can_edit_name True, if the bot can edit the first and last name of the business account
     * @param bool|NULL $can_edit_bio True, if the bot can edit the bio of the business account
     * @param bool|NULL $can_edit_profile_photo True, if the bot can edit the profile photo of the business account
     * @param bool|NULL $can_edit_username True, if the bot can edit the username of the business account
     * @param bool|NULL $can_change_gift_settings True, if the bot can change the privacy settings pertaining to gifts for the business account
     * @param bool|NULL $can_view_gifts_and_stars True, if the bot can view gifts and the amount of Telegram Stars owned by the business account
     * @param bool|NULL $can_convert_gifts_to_stars True, if the bot can convert regular gifts owned by the business account to Telegram Stars
     * @param bool|NULL $can_transfer_and_upgrade_gifts True, if the bot can transfer and upgrade gifts owned by the business account
     * @param bool|NULL $can_transfer_stars True, if the bot can transfer Telegram Stars received by the business account to its own account, or
     *                              use them to upgrade and transfer gifts
     * @param bool|NULL $can_manage_stories True, if the bot can post, edit and delete stories on behalf of the business account
     *
     * @return array $args
     */
    public function BusinessBotRights ( ?bool $can_reply = NULL, ?bool $can_read_messages = NULL, ?bool $can_delete_outgoing_messages = NULL, ?bool $can_delete_all_messages = NULL, ?bool $can_edit_name = NULL, ?bool $can_edit_bio = NULL, ?bool $can_edit_profile_photo = NULL, ?bool $can_edit_username = NULL, ?bool $can_change_gift_settings = NULL, ?bool $can_view_gifts_and_stars = NULL, ?bool $can_convert_gifts_to_stars = NULL, ?bool $can_transfer_and_upgrade_gifts = NULL, ?bool $can_transfer_stars = NULL, ?bool $can_manage_stories = NULL ) : array {
      $args = []; 
      if ( $can_reply !== NULL ) $args['can_reply'] = $can_reply;
      if ( $can_read_messages !== NULL ) $args['can_read_messages'] = $can_read_messages;
      if ( $can_delete_outgoing_messages !== NULL ) $args['can_delete_outgoing_messages'] = $can_delete_outgoing_messages;
      if ( $can_delete_all_messages !== NULL ) $args['can_delete_all_messages'] = $can_delete_all_messages;
      if ( $can_edit_name !== NULL ) $args['can_edit_name'] = $can_edit_name;
      if ( $can_edit_bio !== NULL ) $args['can_edit_bio'] = $can_edit_bio;
      if ( $can_edit_profile_photo !== NULL ) $args['can_edit_profile_photo'] = $can_edit_profile_photo;
      if ( $can_edit_username !== NULL ) $args['can_edit_username'] = $can_edit_username;
      if ( $can_change_gift_settings !== NULL ) $args['can_change_gift_settings'] = $can_change_gift_settings;
      if ( $can_view_gifts_and_stars !== NULL ) $args['can_view_gifts_and_stars'] = $can_view_gifts_and_stars;
      if ( $can_convert_gifts_to_stars !== NULL ) $args['can_convert_gifts_to_stars'] = $can_convert_gifts_to_stars;
      if ( $can_transfer_and_upgrade_gifts !== NULL ) $args['can_transfer_and_upgrade_gifts'] = $can_transfer_and_upgrade_gifts;
      if ( $can_transfer_stars !== NULL ) $args['can_transfer_stars'] = $can_transfer_stars;
      if ( $can_manage_stories !== NULL ) $args['can_manage_stories'] = $can_manage_stories;
      return $args;
    }

    /**
     * Describes the connection of the bot with a business account.
     * 
     * @see https://core.telegram.org/bots/api#BusinessConnection
     *
     * @param string $id Unique identifier of the business connection
     * @param User $user Business account user that created the business connection
     * @param int $user_chat_id Identifier of a private chat with the user who created the business connection. This number may have
     *                              more than 32 significant bits and some programming languages may have difficulty/silent defects in
     *                              interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision
     *                              float type are safe for storing this identifier.
     * @param int $date Date the connection was established in Unix time
     * @param BusinessBotRights|NULL $rights Rights of the business bot
     * @param bool $is_enabled True, if the connection is active
     *
     * @return array $args
     */
    public function BusinessConnection ( string $id, array $user, int $user_chat_id, int $date, bool $is_enabled, ?array $rights = NULL ) : array {
      $args = [ 'id' => $id, 'user' => $user, 'user_chat_id' => $user_chat_id, 'date' => $date, 'is_enabled' => $is_enabled ]; 
      if ( $rights !== NULL ) $args['rights'] = $rights;
      return $args;
    }

    /**
     * This object is received when messages are deleted from a connected business account.
     * 
     * @see https://core.telegram.org/bots/api#BusinessMessagesDeleted
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param Chat $chat Information about a chat in the business account. The bot may not have access to the chat or the
     *                              corresponding user.
     * @param int[] $message_ids The list of identifiers of deleted messages in the chat of the business account
     *
     * @return array $args
     */
    public function BusinessMessagesDeleted ( string $business_connection_id, array $chat, array $message_ids ) : array {
      return [ 'business_connection_id' => $business_connection_id, 'chat' => $chat, 'message_ids' => $message_ids ];
    }

    /**
     * Describes why a request was unsuccessful.
     * 
     * @see https://core.telegram.org/bots/api#ResponseParameters
     *
     * @param int|NULL $migrate_to_chat_id The group has been migrated to a supergroup with the specified identifier. This number may have more
     *                              than 32 significant bits and some programming languages may have difficulty/silent defects in
     *                              interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or
     *                              double-precision float type are safe for storing this identifier.
     * @param int|NULL $retry_after In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     *
     * @return array $args
     */
    public function ResponseParameters ( ?int $migrate_to_chat_id = NULL, ?int $retry_after = NULL ) : array {
      $args = []; 
      if ( $migrate_to_chat_id !== NULL ) $args['migrate_to_chat_id'] = $migrate_to_chat_id;
      if ( $retry_after !== NULL ) $args['retry_after'] = $retry_after;
      return $args;
    }

    /**
     * This object represents the content of a media message to be sent. It should be one of
     * 
     * @see https://core.telegram.org/bots/api#InputMedia
     *
     *
     * @return array $args
     */
    public function InputMedia ( ) : array {
      return [];
    }

    /**
     * Represents a photo to be sent.
     * 
     * @see https://core.telegram.org/bots/api#InputMediaPhoto
     *
     * @param string $type Type of the result, must be photo
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     * @param string|NULL $caption Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param bool|NULL $has_spoiler Pass True if the photo needs to be covered with a spoiler animation
     *
     * @return array $args
     */
    public function InputMediaPhoto ( string $type, string $media, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $has_spoiler = NULL ) : array {
      $args = [ 'type' => $type, 'media' => $media ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $has_spoiler !== NULL ) $args['has_spoiler'] = $has_spoiler;
      return $args;
    }

    /**
     * Represents a video to be sent.
     * 
     * @see https://core.telegram.org/bots/api#InputMediaVideo
     *
     * @param string $type Type of the result, must be video
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     * @param string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $cover Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram
     *                              servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass
     *                              “attach://<file_attach_name>” to upload a new one using multipart/form-data under
     *                              <file_attach_name> name. More information on Sending Files »
     * @param int|NULL $start_timestamp Start timestamp for the video in the message
     * @param string|NULL $caption Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the video caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param int|NULL $width Video width
     * @param int|NULL $height Video height
     * @param int|NULL $duration Video duration in seconds
     * @param bool|NULL $supports_streaming Pass True if the uploaded video is suitable for streaming
     * @param bool|NULL $has_spoiler Pass True if the video needs to be covered with a spoiler animation
     *
     * @return array $args
     */
    public function InputMediaVideo ( string $type, string $media, ?string $thumbnail = NULL, ?string $cover = NULL, ?int $start_timestamp = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?int $width = NULL, ?int $height = NULL, ?int $duration = NULL, ?bool $supports_streaming = NULL, ?bool $has_spoiler = NULL ) : array {
      $args = [ 'type' => $type, 'media' => $media ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $cover !== NULL ) $args['cover'] = $cover;
      if ( $start_timestamp !== NULL ) $args['start_timestamp'] = $start_timestamp;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $width !== NULL ) $args['width'] = $width;
      if ( $height !== NULL ) $args['height'] = $height;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $supports_streaming !== NULL ) $args['supports_streaming'] = $supports_streaming;
      if ( $has_spoiler !== NULL ) $args['has_spoiler'] = $has_spoiler;
      return $args;
    }

    /**
     * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
     * 
     * @see https://core.telegram.org/bots/api#InputMediaAnimation
     *
     * @param string $type Type of the result, must be animation
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     * @param string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $caption Caption of the animation to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the animation caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param int|NULL $width Animation width
     * @param int|NULL $height Animation height
     * @param int|NULL $duration Animation duration in seconds
     * @param bool|NULL $has_spoiler Pass True if the animation needs to be covered with a spoiler animation
     *
     * @return array $args
     */
    public function InputMediaAnimation ( string $type, string $media, ?string $thumbnail = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?int $width = NULL, ?int $height = NULL, ?int $duration = NULL, ?bool $has_spoiler = NULL ) : array {
      $args = [ 'type' => $type, 'media' => $media ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $width !== NULL ) $args['width'] = $width;
      if ( $height !== NULL ) $args['height'] = $height;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $has_spoiler !== NULL ) $args['has_spoiler'] = $has_spoiler;
      return $args;
    }

    /**
     * Represents an audio file to be treated as music to be sent.
     * 
     * @see https://core.telegram.org/bots/api#InputMediaAudio
     *
     * @param string $type Type of the result, must be audio
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     * @param string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $caption Caption of the audio to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the audio caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param int|NULL $duration Duration of the audio in seconds
     * @param string|NULL $performer Performer of the audio
     * @param string|NULL $title Title of the audio
     *
     * @return array $args
     */
    public function InputMediaAudio ( string $type, string $media, ?string $thumbnail = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?int $duration = NULL, ?string $performer = NULL, ?string $title = NULL ) : array {
      $args = [ 'type' => $type, 'media' => $media ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $performer !== NULL ) $args['performer'] = $performer;
      if ( $title !== NULL ) $args['title'] = $title;
      return $args;
    }

    /**
     * Represents a general file to be sent.
     * 
     * @see https://core.telegram.org/bots/api#InputMediaDocument
     *
     * @param string $type Type of the result, must be document
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     * @param string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $caption Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the document caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $disable_content_type_detection Disables automatic server-side content type detection for files uploaded using multipart/form-data.
     *                              Always True, if the document is sent as part of an album.
     *
     * @return array $args
     */
    public function InputMediaDocument ( string $type, string $media, ?string $thumbnail = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $disable_content_type_detection = NULL ) : array {
      $args = [ 'type' => $type, 'media' => $media ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $disable_content_type_detection !== NULL ) $args['disable_content_type_detection'] = $disable_content_type_detection;
      return $args;
    }

    /**
     * This object represents the contents of a file to be uploaded. Must be posted using
     * multipart/form-data in the usual way that files are uploaded via the browser.
     * 
     * @see https://core.telegram.org/bots/api#InputFile
     *
     *
     * @return array $args
     */
    public function InputFile ( ) : array {
      return [];
    }

    /**
     * This object describes the paid media to be sent. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#InputPaidMedia
     *
     *
     * @return array $args
     */
    public function InputPaidMedia ( ) : array {
      return [];
    }

    /**
     * The paid media to send is a photo.
     * 
     * @see https://core.telegram.org/bots/api#InputPaidMediaPhoto
     *
     * @param string $type Type of the media, must be photo
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     *
     * @return array $args
     */
    public function InputPaidMediaPhoto ( string $type, string $media ) : array {
      return [ 'type' => $type, 'media' => $media ];
    }

    /**
     * The paid media to send is a video.
     * 
     * @see https://core.telegram.org/bots/api#InputPaidMediaVideo
     *
     * @param string $type Type of the media, must be video
     * @param string $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass
     *                              an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>”
     *                              to upload a new one using multipart/form-data under <file_attach_name> name. More information on
     *                              Sending Files »
     * @param string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $cover Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram
     *                              servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass
     *                              “attach://<file_attach_name>” to upload a new one using multipart/form-data under
     *                              <file_attach_name> name. More information on Sending Files »
     * @param int|NULL $start_timestamp Start timestamp for the video in the message
     * @param int|NULL $width Video width
     * @param int|NULL $height Video height
     * @param int|NULL $duration Video duration in seconds
     * @param bool|NULL $supports_streaming Pass True if the uploaded video is suitable for streaming
     *
     * @return array $args
     */
    public function InputPaidMediaVideo ( string $type, string $media, ?string $thumbnail = NULL, ?string $cover = NULL, ?int $start_timestamp = NULL, ?int $width = NULL, ?int $height = NULL, ?int $duration = NULL, ?bool $supports_streaming = NULL ) : array {
      $args = [ 'type' => $type, 'media' => $media ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $cover !== NULL ) $args['cover'] = $cover;
      if ( $start_timestamp !== NULL ) $args['start_timestamp'] = $start_timestamp;
      if ( $width !== NULL ) $args['width'] = $width;
      if ( $height !== NULL ) $args['height'] = $height;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $supports_streaming !== NULL ) $args['supports_streaming'] = $supports_streaming;
      return $args;
    }

    /**
     * This object describes a profile photo to set. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#InputProfilePhoto
     *
     *
     * @return array $args
     */
    public function InputProfilePhoto ( ) : array {
      return [];
    }

    /**
     * A static profile photo in the .JPG format.
     * 
     * @see https://core.telegram.org/bots/api#InputProfilePhotoStatic
     *
     * @param string $type Type of the profile photo, must be “static”
     * @param string $photo The static profile photo. Profile photos can't be reused and can only be uploaded as a new file, so
     *                              you can pass “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data
     *                              under <file_attach_name>. More information on Sending Files »
     *
     * @return array $args
     */
    public function InputProfilePhotoStatic ( string $type, string $photo ) : array {
      return [ 'type' => $type, 'photo' => $photo ];
    }

    /**
     * An animated profile photo in the MPEG4 format.
     * 
     * @see https://core.telegram.org/bots/api#InputProfilePhotoAnimated
     *
     * @param string $type Type of the profile photo, must be “animated”
     * @param string $animation The animated profile photo. Profile photos can't be reused and can only be uploaded as a new file,
     *                              so you can pass “attach://<file_attach_name>” if the photo was uploaded using
     *                              multipart/form-data under <file_attach_name>. More information on Sending Files »
     * @param float|NULL $main_frame_timestamp Timestamp in seconds of the frame that will be used as the static profile photo. Defaults to 0.0.
     *
     * @return array $args
     */
    public function InputProfilePhotoAnimated ( string $type, string $animation, ?array $main_frame_timestamp = NULL ) : array {
      $args = [ 'type' => $type, 'animation' => $animation ]; 
      if ( $main_frame_timestamp !== NULL ) $args['main_frame_timestamp'] = $main_frame_timestamp;
      return $args;
    }

    /**
     * This object describes the content of a story to post. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#InputStoryContent
     *
     *
     * @return array $args
     */
    public function InputStoryContent ( ) : array {
      return [];
    }

    /**
     * Describes a photo to post as a story.
     * 
     * @see https://core.telegram.org/bots/api#InputStoryContentPhoto
     *
     * @param string $type Type of the content, must be “photo”
     * @param string $photo The photo to post as a story. The photo must be of the size 1080x1920 and must not exceed 10 MB. The
     *                              photo can't be reused and can only be uploaded as a new file, so you can pass
     *                              “attach://<file_attach_name>” if the photo was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     *
     * @return array $args
     */
    public function InputStoryContentPhoto ( string $type, string $photo ) : array {
      return [ 'type' => $type, 'photo' => $photo ];
    }

    /**
     * Describes a video to post as a story.
     * 
     * @see https://core.telegram.org/bots/api#InputStoryContentVideo
     *
     * @param string $type Type of the content, must be “video”
     * @param string $video The video to post as a story. The video must be of the size 720x1280, streamable, encoded with H.265
     *                              codec, with key frames added each second in the MPEG4 format, and must not exceed 30 MB. The video
     *                              can't be reused and can only be uploaded as a new file, so you can pass
     *                              “attach://<file_attach_name>” if the video was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param float|NULL $duration Precise duration of the video in seconds; 0-60
     * @param float|NULL $cover_frame_timestamp Timestamp in seconds of the frame that will be used as the static cover for the story. Defaults to 0.0.
     * @param bool|NULL $is_animation Pass True if the video has no sound
     *
     * @return array $args
     */
    public function InputStoryContentVideo ( string $type, string $video, ?array $duration = NULL, ?array $cover_frame_timestamp = NULL, ?bool $is_animation = NULL ) : array {
      $args = [ 'type' => $type, 'video' => $video ]; 
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $cover_frame_timestamp !== NULL ) $args['cover_frame_timestamp'] = $cover_frame_timestamp;
      if ( $is_animation !== NULL ) $args['is_animation'] = $is_animation;
      return $args;
    }

    /**
     * This object represents a sticker.
     * 
     * @see https://core.telegram.org/bots/api#Sticker
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param string $type Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the
     *                              sticker is independent from its format, which is determined by the fields is_animated and is_video.
     * @param int $width Sticker width
     * @param int $height Sticker height
     * @param bool $is_animated True, if the sticker is animated
     * @param bool $is_video True, if the sticker is a video sticker
     * @param PhotoSize|NULL $thumbnail Sticker thumbnail in the .WEBP or .JPG format
     * @param string|NULL $emoji Emoji associated with the sticker
     * @param string|NULL $set_name Name of the sticker set to which the sticker belongs
     * @param File|NULL $premium_animation For premium regular stickers, premium animation for the sticker
     * @param MaskPosition|NULL $mask_position For mask stickers, the position where the mask should be placed
     * @param string|NULL $custom_emoji_id For custom emoji stickers, unique identifier of the custom emoji
     * @param bool|NULL $needs_repainting True, if the sticker must be repainted to a text color in messages, the color of the Telegram
     *                              Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
     * @param int|NULL $file_size File size in bytes
     *
     * @return array $args
     */
    public function Sticker ( string $file_id, string $file_unique_id, string $type, int $width, int $height, bool $is_animated, bool $is_video, ?array $thumbnail = NULL, ?string $emoji = NULL, ?string $set_name = NULL, ?array $premium_animation = NULL, ?array $mask_position = NULL, ?string $custom_emoji_id = NULL, ?bool $needs_repainting = NULL, ?int $file_size = NULL ) : array {
      $args = [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'type' => $type, 'width' => $width, 'height' => $height, 'is_animated' => $is_animated, 'is_video' => $is_video ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $emoji !== NULL ) $args['emoji'] = $emoji;
      if ( $set_name !== NULL ) $args['set_name'] = $set_name;
      if ( $premium_animation !== NULL ) $args['premium_animation'] = $premium_animation;
      if ( $mask_position !== NULL ) $args['mask_position'] = $mask_position;
      if ( $custom_emoji_id !== NULL ) $args['custom_emoji_id'] = $custom_emoji_id;
      if ( $needs_repainting !== NULL ) $args['needs_repainting'] = $needs_repainting;
      if ( $file_size !== NULL ) $args['file_size'] = $file_size;
      return $args;
    }

    /**
     * This object represents a sticker set.
     * 
     * @see https://core.telegram.org/bots/api#StickerSet
     *
     * @param string $name Sticker set name
     * @param string $title Sticker set title
     * @param string $sticker_type Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji”
     * @param Sticker[] $stickers List of all set stickers
     * @param PhotoSize|NULL $thumbnail Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format
     *
     * @return array $args
     */
    public function StickerSet ( string $name, string $title, string $sticker_type, array $stickers, ?array $thumbnail = NULL ) : array {
      $args = [ 'name' => $name, 'title' => $title, 'sticker_type' => $sticker_type, 'stickers' => $stickers ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      return $args;
    }

    /**
     * This object describes the position on faces where a mask should be placed by default.
     * 
     * @see https://core.telegram.org/bots/api#MaskPosition
     *
     * @param string $point The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”,
     *                              “mouth”, or “chin”.
     * @param float $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For
     *                              example, choosing -1.0 will place mask just to the left of the default mask position.
     * @param float $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For
     *                              example, 1.0 will place the mask just below the default mask position.
     * @param float $scale Mask scaling coefficient. For example, 2.0 means double size.
     *
     * @return array $args
     */
    public function MaskPosition ( string $point, array $x_shift, array $y_shift, array $scale ) : array {
      return [ 'point' => $point, 'x_shift' => $x_shift, 'y_shift' => $y_shift, 'scale' => $scale ];
    }

    /**
     * This object describes a sticker to be added to a sticker set.
     * 
     * @see https://core.telegram.org/bots/api#InputSticker
     *
     * @param string $sticker The added sticker. Pass a file_id as a String to send a file that already exists on the Telegram
     *                              servers, pass an HTTP URL as a String for Telegram to get a file from the Internet, or pass
     *                              “attach://<file_attach_name>” to upload a new file using multipart/form-data under
     *                              <file_attach_name> name. Animated and video stickers can't be uploaded via HTTP URL. More
     *                              information on Sending Files »
     * @param string $format Format of the added sticker, must be one of “static” for a .WEBP or .PNG image, “animated”
     *                              for a .TGS animation, “video” for a .WEBM video
     * @param string[] $emoji_list List of 1-20 emoji associated with the sticker
     * @param MaskPosition|NULL $mask_position Position where the mask should be placed on faces. For “mask” stickers only.
     * @param string[]|NULL $keywords List of 0-20 search keywords for the sticker with total length of up to 64 characters. For
     *                              “regular” and “custom_emoji” stickers only.
     *
     * @return array $args
     */
    public function InputSticker ( string $sticker, string $format, array $emoji_list, ?array $mask_position = NULL, ?array $keywords = NULL ) : array {
      $args = [ 'sticker' => $sticker, 'format' => $format, 'emoji_list' => $emoji_list ]; 
      if ( $mask_position !== NULL ) $args['mask_position'] = $mask_position;
      if ( $keywords !== NULL ) $args['keywords'] = $keywords;
      return $args;
    }

    /**
     * This object represents an incoming inline query. When the user sends an empty query, your bot could
     * return some default or trending results.
     * 
     * @see https://core.telegram.org/bots/api#InlineQuery
     *
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param string $query Text of the query (up to 256 characters)
     * @param string $offset Offset of the results to be returned, can be controlled by the bot
     * @param string|NULL $chat_type Type of the chat from which the inline query was sent. Can be either “sender” for a private chat
     *                              with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The
     *                              chat type should be always known for requests sent from official clients and most third-party
     *                              clients, unless the request was sent from a secret chat
     * @param Location|NULL $location Sender location, only for bots that request user location
     *
     * @return array $args
     */
    public function InlineQuery ( string $id, array $from, string $query, string $offset, ?string $chat_type = NULL, ?array $location = NULL ) : array {
      $args = [ 'id' => $id, 'from' => $from, 'query' => $query, 'offset' => $offset ]; 
      if ( $chat_type !== NULL ) $args['chat_type'] = $chat_type;
      if ( $location !== NULL ) $args['location'] = $location;
      return $args;
    }

    /**
     * This object represents a button to be shown above inline query results. You must use exactly one of
     * the optional fields.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultsButton
     *
     * @param string $text Label text on the button
     * @param WebAppInfo|NULL $web_app Description of the Web App that will be launched when the user presses the button. The Web App will
     *                              be able to switch back to the inline mode using the method switchInlineQuery inside the Web App.
     * @param string|NULL $start_parameter Deep-linking parameter for the /start message sent to the bot when a user presses the button. 1-64
     *                              characters, only A-Z, a-z, 0-9, _ and - are allowed.Example: An inline bot that sends YouTube videos
     *                              can ask the user to connect the bot to their YouTube account to adapt search results accordingly. To
     *                              do this, it displays a 'Connect your YouTube account' button above the results, or even before
     *                              showing any. The user presses the button, switches to a private chat with the bot and, in doing so,
     *                              passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot can
     *                              offer a switch_inline button so that the user can easily return to the chat where they wanted to use
     *                              the bot's inline capabilities.
     *
     * @return array $args
     */
    public function InlineQueryResultsButton ( string $text, ?array $web_app = NULL, ?string $start_parameter = NULL ) : array {
      $args = [ 'text' => $text ]; 
      if ( $web_app !== NULL ) $args['web_app'] = $web_app;
      if ( $start_parameter !== NULL ) $args['start_parameter'] = $start_parameter;
      return $args;
    }

    /**
     * This object represents one result of an inline query. Telegram clients currently support results of
     * the following 20 types:
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResult
     *
     *
     * @return array $args
     */
    public function InlineQueryResult ( ) : array {
      return [];
    }

    /**
     * Represents a link to an article or web page.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultArticle
     *
     * @param string $type Type of the result, must be article
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param string $title Title of the result
     * @param InputMessageContent $input_message_content Content of the message to be sent
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param string|NULL $url URL of the result
     * @param string|NULL $description Short description of the result
     * @param string|NULL $thumbnail_url Url of the thumbnail for the result
     * @param int|NULL $thumbnail_width Thumbnail width
     * @param int|NULL $thumbnail_height Thumbnail height
     *
     * @return array $args
     */
    public function InlineQueryResultArticle ( string $type, string $id, string $title, array $input_message_content, ?array $reply_markup = NULL, ?string $url = NULL, ?string $description = NULL, ?string $thumbnail_url = NULL, ?int $thumbnail_width = NULL, ?int $thumbnail_height = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'title' => $title, 'input_message_content' => $input_message_content ]; 
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $url !== NULL ) $args['url'] = $url;
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $thumbnail_url !== NULL ) $args['thumbnail_url'] = $thumbnail_url;
      if ( $thumbnail_width !== NULL ) $args['thumbnail_width'] = $thumbnail_width;
      if ( $thumbnail_height !== NULL ) $args['thumbnail_height'] = $thumbnail_height;
      return $args;
    }

    /**
     * Represents a link to a photo. By default, this photo will be sent by the user with optional caption.
     * Alternatively, you can use input_message_content to send a message with the specified content
     * instead of the photo.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultPhoto
     *
     * @param string $type Type of the result, must be photo
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $photo_url A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
     * @param string $thumbnail_url URL of the thumbnail for the photo
     * @param int|NULL $photo_width Width of the photo
     * @param int|NULL $photo_height Height of the photo
     * @param string|NULL $title Title for the result
     * @param string|NULL $description Short description of the result
     * @param string|NULL $caption Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the photo
     *
     * @return array $args
     */
    public function InlineQueryResultPhoto ( string $type, string $id, string $photo_url, string $thumbnail_url, ?int $photo_width = NULL, ?int $photo_height = NULL, ?string $title = NULL, ?string $description = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'photo_url' => $photo_url, 'thumbnail_url' => $thumbnail_url ]; 
      if ( $photo_width !== NULL ) $args['photo_width'] = $photo_width;
      if ( $photo_height !== NULL ) $args['photo_height'] = $photo_height;
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the
     * user with optional caption. Alternatively, you can use input_message_content to send a message with
     * the specified content instead of the animation.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultGif
     *
     * @param string $type Type of the result, must be gif
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $gif_url A valid URL for the GIF file
     * @param int|NULL $gif_width Width of the GIF
     * @param int|NULL $gif_height Height of the GIF
     * @param int|NULL $gif_duration Duration of the GIF in seconds
     * @param string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     * @param string|NULL $thumbnail_mime_type MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”.
     *                              Defaults to “image/jpeg”
     * @param string|NULL $title Title for the result
     * @param string|NULL $caption Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the GIF animation
     *
     * @return array $args
     */
    public function InlineQueryResultGif ( string $type, string $id, string $gif_url, string $thumbnail_url, ?int $gif_width = NULL, ?int $gif_height = NULL, ?int $gif_duration = NULL, ?string $thumbnail_mime_type = NULL, ?string $title = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'gif_url' => $gif_url, 'thumbnail_url' => $thumbnail_url ]; 
      if ( $gif_width !== NULL ) $args['gif_width'] = $gif_width;
      if ( $gif_height !== NULL ) $args['gif_height'] = $gif_height;
      if ( $gif_duration !== NULL ) $args['gif_duration'] = $gif_duration;
      if ( $thumbnail_mime_type !== NULL ) $args['thumbnail_mime_type'] = $thumbnail_mime_type;
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this
     * animated MPEG-4 file will be sent by the user with optional caption. Alternatively, you can use
     * input_message_content to send a message with the specified content instead of the animation.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultMpeg4Gif
     *
     * @param string $type Type of the result, must be mpeg4_gif
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $mpeg4_url A valid URL for the MPEG4 file
     * @param int|NULL $mpeg4_width Video width
     * @param int|NULL $mpeg4_height Video height
     * @param int|NULL $mpeg4_duration Video duration in seconds
     * @param string $thumbnail_url URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
     * @param string|NULL $thumbnail_mime_type MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”.
     *                              Defaults to “image/jpeg”
     * @param string|NULL $title Title for the result
     * @param string|NULL $caption Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the video animation
     *
     * @return array $args
     */
    public function InlineQueryResultMpeg4Gif ( string $type, string $id, string $mpeg4_url, string $thumbnail_url, ?int $mpeg4_width = NULL, ?int $mpeg4_height = NULL, ?int $mpeg4_duration = NULL, ?string $thumbnail_mime_type = NULL, ?string $title = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'mpeg4_url' => $mpeg4_url, 'thumbnail_url' => $thumbnail_url ]; 
      if ( $mpeg4_width !== NULL ) $args['mpeg4_width'] = $mpeg4_width;
      if ( $mpeg4_height !== NULL ) $args['mpeg4_height'] = $mpeg4_height;
      if ( $mpeg4_duration !== NULL ) $args['mpeg4_duration'] = $mpeg4_duration;
      if ( $thumbnail_mime_type !== NULL ) $args['thumbnail_mime_type'] = $thumbnail_mime_type;
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a page containing an embedded video player or a video file. By default, this
     * video file will be sent by the user with an optional caption. Alternatively, you can use
     * input_message_content to send a message with the specified content instead of the video.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultVideo
     *
     * @param string $type Type of the result, must be video
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $video_url A valid URL for the embedded video player or video file
     * @param string $mime_type MIME type of the content of the video URL, “text/html” or “video/mp4”
     * @param string $thumbnail_url URL of the thumbnail (JPEG only) for the video
     * @param string $title Title for the result
     * @param string|NULL $caption Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the video caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param int|NULL $video_width Video width
     * @param int|NULL $video_height Video height
     * @param int|NULL $video_duration Video duration in seconds
     * @param string|NULL $description Short description of the result
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the video. This field is required if
     *                              InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
     *
     * @return array $args
     */
    public function InlineQueryResultVideo ( string $type, string $id, string $video_url, string $mime_type, string $thumbnail_url, string $title, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?int $video_width = NULL, ?int $video_height = NULL, ?int $video_duration = NULL, ?string $description = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'video_url' => $video_url, 'mime_type' => $mime_type, 'thumbnail_url' => $thumbnail_url, 'title' => $title ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $video_width !== NULL ) $args['video_width'] = $video_width;
      if ( $video_height !== NULL ) $args['video_height'] = $video_height;
      if ( $video_duration !== NULL ) $args['video_duration'] = $video_duration;
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to an MP3 audio file. By default, this audio file will be sent by the user.
     * Alternatively, you can use input_message_content to send a message with the specified content
     * instead of the audio.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultAudio
     *
     * @param string $type Type of the result, must be audio
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $audio_url A valid URL for the audio file
     * @param string $title Title
     * @param string|NULL $caption Caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the audio caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param string|NULL $performer Performer
     * @param int|NULL $audio_duration Audio duration in seconds
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the audio
     *
     * @return array $args
     */
    public function InlineQueryResultAudio ( string $type, string $id, string $audio_url, string $title, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?string $performer = NULL, ?int $audio_duration = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'audio_url' => $audio_url, 'title' => $title ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $performer !== NULL ) $args['performer'] = $performer;
      if ( $audio_duration !== NULL ) $args['audio_duration'] = $audio_duration;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this
     * voice recording will be sent by the user. Alternatively, you can use input_message_content to send a
     * message with the specified content instead of the the voice message.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultVoice
     *
     * @param string $type Type of the result, must be voice
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $voice_url A valid URL for the voice recording
     * @param string $title Recording title
     * @param string|NULL $caption Caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the voice message caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param int|NULL $voice_duration Recording duration in seconds
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the voice recording
     *
     * @return array $args
     */
    public function InlineQueryResultVoice ( string $type, string $id, string $voice_url, string $title, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?int $voice_duration = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'voice_url' => $voice_url, 'title' => $title ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $voice_duration !== NULL ) $args['voice_duration'] = $voice_duration;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a file. By default, this file will be sent by the user with an optional
     * caption. Alternatively, you can use input_message_content to send a message with the specified
     * content instead of the file. Currently, only .PDF and .ZIP files can be sent using this method.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultDocument
     *
     * @param string $type Type of the result, must be document
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $title Title for the result
     * @param string|NULL $caption Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the document caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param string $document_url A valid URL for the file
     * @param string $mime_type MIME type of the content of the file, either “application/pdf” or “application/zip”
     * @param string|NULL $description Short description of the result
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the file
     * @param string|NULL $thumbnail_url URL of the thumbnail (JPEG only) for the file
     * @param int|NULL $thumbnail_width Thumbnail width
     * @param int|NULL $thumbnail_height Thumbnail height
     *
     * @return array $args
     */
    public function InlineQueryResultDocument ( string $type, string $id, string $title, string $document_url, string $mime_type, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?string $description = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL, ?string $thumbnail_url = NULL, ?int $thumbnail_width = NULL, ?int $thumbnail_height = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'title' => $title, 'document_url' => $document_url, 'mime_type' => $mime_type ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      if ( $thumbnail_url !== NULL ) $args['thumbnail_url'] = $thumbnail_url;
      if ( $thumbnail_width !== NULL ) $args['thumbnail_width'] = $thumbnail_width;
      if ( $thumbnail_height !== NULL ) $args['thumbnail_height'] = $thumbnail_height;
      return $args;
    }

    /**
     * Represents a location on a map. By default, the location will be sent by the user. Alternatively,
     * you can use input_message_content to send a message with the specified content instead of the location.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultLocation
     *
     * @param string $type Type of the result, must be location
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Location latitude in degrees
     * @param float $longitude Location longitude in degrees
     * @param string $title Location title
     * @param float|NULL $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|NULL $live_period Period in seconds during which the location can be updated, should be between 60 and 86400, or
     *                              0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|NULL $heading For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360
     *                              if specified.
     * @param int|NULL $proximity_alert_radius For live locations, a maximum distance for proximity alerts about approaching another chat member,
     *                              in meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the location
     * @param string|NULL $thumbnail_url Url of the thumbnail for the result
     * @param int|NULL $thumbnail_width Thumbnail width
     * @param int|NULL $thumbnail_height Thumbnail height
     *
     * @return array $args
     */
    public function InlineQueryResultLocation ( string $type, string $id, array $latitude, array $longitude, string $title, ?array $horizontal_accuracy = NULL, ?int $live_period = NULL, ?int $heading = NULL, ?int $proximity_alert_radius = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL, ?string $thumbnail_url = NULL, ?int $thumbnail_width = NULL, ?int $thumbnail_height = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'latitude' => $latitude, 'longitude' => $longitude, 'title' => $title ]; 
      if ( $horizontal_accuracy !== NULL ) $args['horizontal_accuracy'] = $horizontal_accuracy;
      if ( $live_period !== NULL ) $args['live_period'] = $live_period;
      if ( $heading !== NULL ) $args['heading'] = $heading;
      if ( $proximity_alert_radius !== NULL ) $args['proximity_alert_radius'] = $proximity_alert_radius;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      if ( $thumbnail_url !== NULL ) $args['thumbnail_url'] = $thumbnail_url;
      if ( $thumbnail_width !== NULL ) $args['thumbnail_width'] = $thumbnail_width;
      if ( $thumbnail_height !== NULL ) $args['thumbnail_height'] = $thumbnail_height;
      return $args;
    }

    /**
     * Represents a venue. By default, the venue will be sent by the user. Alternatively, you can use
     * input_message_content to send a message with the specified content instead of the venue.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultVenue
     *
     * @param string $type Type of the result, must be venue
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param float $latitude Latitude of the venue location in degrees
     * @param float $longitude Longitude of the venue location in degrees
     * @param string $title Title of the venue
     * @param string $address Address of the venue
     * @param string|NULL $foursquare_id Foursquare identifier of the venue if known
     * @param string|NULL $foursquare_type Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     *                              “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|NULL $google_place_id Google Places identifier of the venue
     * @param string|NULL $google_place_type Google Places type of the venue. (See supported types.)
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the venue
     * @param string|NULL $thumbnail_url Url of the thumbnail for the result
     * @param int|NULL $thumbnail_width Thumbnail width
     * @param int|NULL $thumbnail_height Thumbnail height
     *
     * @return array $args
     */
    public function InlineQueryResultVenue ( string $type, string $id, array $latitude, array $longitude, string $title, string $address, ?string $foursquare_id = NULL, ?string $foursquare_type = NULL, ?string $google_place_id = NULL, ?string $google_place_type = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL, ?string $thumbnail_url = NULL, ?int $thumbnail_width = NULL, ?int $thumbnail_height = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'latitude' => $latitude, 'longitude' => $longitude, 'title' => $title, 'address' => $address ]; 
      if ( $foursquare_id !== NULL ) $args['foursquare_id'] = $foursquare_id;
      if ( $foursquare_type !== NULL ) $args['foursquare_type'] = $foursquare_type;
      if ( $google_place_id !== NULL ) $args['google_place_id'] = $google_place_id;
      if ( $google_place_type !== NULL ) $args['google_place_type'] = $google_place_type;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      if ( $thumbnail_url !== NULL ) $args['thumbnail_url'] = $thumbnail_url;
      if ( $thumbnail_width !== NULL ) $args['thumbnail_width'] = $thumbnail_width;
      if ( $thumbnail_height !== NULL ) $args['thumbnail_height'] = $thumbnail_height;
      return $args;
    }

    /**
     * Represents a contact with a phone number. By default, this contact will be sent by the user.
     * Alternatively, you can use input_message_content to send a message with the specified content
     * instead of the contact.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultContact
     *
     * @param string $type Type of the result, must be contact
     * @param string $id Unique identifier for this result, 1-64 Bytes
     * @param string $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param string|NULL $last_name Contact's last name
     * @param string|NULL $vcard Additional data about the contact in the form of a vCard, 0-2048 bytes
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the contact
     * @param string|NULL $thumbnail_url Url of the thumbnail for the result
     * @param int|NULL $thumbnail_width Thumbnail width
     * @param int|NULL $thumbnail_height Thumbnail height
     *
     * @return array $args
     */
    public function InlineQueryResultContact ( string $type, string $id, string $phone_number, string $first_name, ?string $last_name = NULL, ?string $vcard = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL, ?string $thumbnail_url = NULL, ?int $thumbnail_width = NULL, ?int $thumbnail_height = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'phone_number' => $phone_number, 'first_name' => $first_name ]; 
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $vcard !== NULL ) $args['vcard'] = $vcard;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      if ( $thumbnail_url !== NULL ) $args['thumbnail_url'] = $thumbnail_url;
      if ( $thumbnail_width !== NULL ) $args['thumbnail_width'] = $thumbnail_width;
      if ( $thumbnail_height !== NULL ) $args['thumbnail_height'] = $thumbnail_height;
      return $args;
    }

    /**
     * Represents a Game.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultGame
     *
     * @param string $type Type of the result, must be game
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $game_short_name Short name of the game
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     *
     * @return array $args
     */
    public function InlineQueryResultGame ( string $type, string $id, string $game_short_name, ?array $reply_markup = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'game_short_name' => $game_short_name ]; 
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      return $args;
    }

    /**
     * Represents a link to a photo stored on the Telegram servers. By default, this photo will be sent by
     * the user with an optional caption. Alternatively, you can use input_message_content to send a
     * message with the specified content instead of the photo.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedPhoto
     *
     * @param string $type Type of the result, must be photo
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $photo_file_id A valid file identifier of the photo
     * @param string|NULL $title Title for the result
     * @param string|NULL $description Short description of the result
     * @param string|NULL $caption Caption of the photo to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the photo
     *
     * @return array $args
     */
    public function InlineQueryResultCachedPhoto ( string $type, string $id, string $photo_file_id, ?string $title = NULL, ?string $description = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'photo_file_id' => $photo_file_id ]; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to an animated GIF file stored on the Telegram servers. By default, this animated
     * GIF file will be sent by the user with an optional caption. Alternatively, you can use
     * input_message_content to send a message with specified content instead of the animation.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedGif
     *
     * @param string $type Type of the result, must be gif
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $gif_file_id A valid file identifier for the GIF file
     * @param string|NULL $title Title for the result
     * @param string|NULL $caption Caption of the GIF file to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the GIF animation
     *
     * @return array $args
     */
    public function InlineQueryResultCachedGif ( string $type, string $id, string $gif_file_id, ?string $title = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'gif_file_id' => $gif_file_id ]; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram
     * servers. By default, this animated MPEG-4 file will be sent by the user with an optional caption.
     * Alternatively, you can use input_message_content to send a message with the specified content
     * instead of the animation.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedMpeg4Gif
     *
     * @param string $type Type of the result, must be mpeg4_gif
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $mpeg4_file_id A valid file identifier for the MPEG4 file
     * @param string|NULL $title Title for the result
     * @param string|NULL $caption Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the video animation
     *
     * @return array $args
     */
    public function InlineQueryResultCachedMpeg4Gif ( string $type, string $id, string $mpeg4_file_id, ?string $title = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'mpeg4_file_id' => $mpeg4_file_id ]; 
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a sticker stored on the Telegram servers. By default, this sticker will be sent
     * by the user. Alternatively, you can use input_message_content to send a message with the specified
     * content instead of the sticker.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedSticker
     *
     * @param string $type Type of the result, must be sticker
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $sticker_file_id A valid file identifier of the sticker
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the sticker
     *
     * @return array $args
     */
    public function InlineQueryResultCachedSticker ( string $type, string $id, string $sticker_file_id, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'sticker_file_id' => $sticker_file_id ]; 
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by
     * the user with an optional caption. Alternatively, you can use input_message_content to send a
     * message with the specified content instead of the file.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedDocument
     *
     * @param string $type Type of the result, must be document
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $title Title for the result
     * @param string $document_file_id A valid file identifier for the file
     * @param string|NULL $description Short description of the result
     * @param string|NULL $caption Caption of the document to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the document caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the file
     *
     * @return array $args
     */
    public function InlineQueryResultCachedDocument ( string $type, string $id, string $title, string $document_file_id, ?string $description = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'title' => $title, 'document_file_id' => $document_file_id ]; 
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a video file stored on the Telegram servers. By default, this video file will
     * be sent by the user with an optional caption. Alternatively, you can use input_message_content to
     * send a message with the specified content instead of the video.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedVideo
     *
     * @param string $type Type of the result, must be video
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $video_file_id A valid file identifier for the video file
     * @param string $title Title for the result
     * @param string|NULL $description Short description of the result
     * @param string|NULL $caption Caption of the video to be sent, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the video caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the video
     *
     * @return array $args
     */
    public function InlineQueryResultCachedVideo ( string $type, string $id, string $video_file_id, string $title, ?string $description = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'video_file_id' => $video_file_id, 'title' => $title ]; 
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to a voice message stored on the Telegram servers. By default, this voice message
     * will be sent by the user. Alternatively, you can use input_message_content to send a message with
     * the specified content instead of the voice message.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedVoice
     *
     * @param string $type Type of the result, must be voice
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $voice_file_id A valid file identifier for the voice message
     * @param string $title Voice message title
     * @param string|NULL $caption Caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the voice message caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the voice message
     *
     * @return array $args
     */
    public function InlineQueryResultCachedVoice ( string $type, string $id, string $voice_file_id, string $title, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'voice_file_id' => $voice_file_id, 'title' => $title ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * Represents a link to an MP3 audio file stored on the Telegram servers. By default, this audio file
     * will be sent by the user. Alternatively, you can use input_message_content to send a message with
     * the specified content instead of the audio.
     * 
     * @see https://core.telegram.org/bots/api#InlineQueryResultCachedAudio
     *
     * @param string $type Type of the result, must be audio
     * @param string $id Unique identifier for this result, 1-64 bytes
     * @param string $audio_file_id A valid file identifier for the audio file
     * @param string|NULL $caption Caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the audio caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities List of special entities that appear in the caption, which can be specified instead of parse_mode
     * @param InlineKeyboardMarkup|NULL $reply_markup Inline keyboard attached to the message
     * @param InputMessageContent|NULL $input_message_content Content of the message to be sent instead of the audio
     *
     * @return array $args
     */
    public function InlineQueryResultCachedAudio ( string $type, string $id, string $audio_file_id, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?array $reply_markup = NULL, ?array $input_message_content = NULL ) : array {
      $args = [ 'type' => $type, 'id' => $id, 'audio_file_id' => $audio_file_id ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = $caption_entities;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = $reply_markup;
      if ( $input_message_content !== NULL ) $args['input_message_content'] = $input_message_content;
      return $args;
    }

    /**
     * This object represents the content of a message to be sent as a result of an inline query. Telegram
     * clients currently support the following 5 types:
     * 
     * @see https://core.telegram.org/bots/api#InputMessageContent
     *
     *
     * @return array $args
     */
    public function InputMessageContent ( ) : array {
      return [];
    }

    /**
     * Represents the content of a text message to be sent as the result of an inline query.
     * 
     * @see https://core.telegram.org/bots/api#InputTextMessageContent
     *
     * @param string $message_text Text of the message to be sent, 1-4096 characters
     * @param string|NULL $parse_mode Mode for parsing entities in the message text. See formatting options for more details.
     * @param MessageEntity[]|NULL $entities List of special entities that appear in message text, which can be specified instead of parse_mode
     * @param LinkPreviewOptions|NULL $link_preview_options Link preview generation options for the message
     *
     * @return array $args
     */
    public function InputTextMessageContent ( string $message_text, ?string $parse_mode = NULL, ?array $entities = NULL, ?array $link_preview_options = NULL ) : array {
      $args = [ 'message_text' => $message_text ]; 
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $entities !== NULL ) $args['entities'] = $entities;
      if ( $link_preview_options !== NULL ) $args['link_preview_options'] = $link_preview_options;
      return $args;
    }

    /**
     * Represents the content of a location message to be sent as the result of an inline query.
     * 
     * @see https://core.telegram.org/bots/api#InputLocationMessageContent
     *
     * @param float $latitude Latitude of the location in degrees
     * @param float $longitude Longitude of the location in degrees
     * @param float|NULL $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|NULL $live_period Period in seconds during which the location can be updated, should be between 60 and 86400, or
     *                              0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|NULL $heading For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360
     *                              if specified.
     * @param int|NULL $proximity_alert_radius For live locations, a maximum distance for proximity alerts about approaching another chat member,
     *                              in meters. Must be between 1 and 100000 if specified.
     *
     * @return array $args
     */
    public function InputLocationMessageContent ( array $latitude, array $longitude, ?array $horizontal_accuracy = NULL, ?int $live_period = NULL, ?int $heading = NULL, ?int $proximity_alert_radius = NULL ) : array {
      $args = [ 'latitude' => $latitude, 'longitude' => $longitude ]; 
      if ( $horizontal_accuracy !== NULL ) $args['horizontal_accuracy'] = $horizontal_accuracy;
      if ( $live_period !== NULL ) $args['live_period'] = $live_period;
      if ( $heading !== NULL ) $args['heading'] = $heading;
      if ( $proximity_alert_radius !== NULL ) $args['proximity_alert_radius'] = $proximity_alert_radius;
      return $args;
    }

    /**
     * Represents the content of a venue message to be sent as the result of an inline query.
     * 
     * @see https://core.telegram.org/bots/api#InputVenueMessageContent
     *
     * @param float $latitude Latitude of the venue in degrees
     * @param float $longitude Longitude of the venue in degrees
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     * @param string|NULL $foursquare_id Foursquare identifier of the venue, if known
     * @param string|NULL $foursquare_type Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     *                              “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|NULL $google_place_id Google Places identifier of the venue
     * @param string|NULL $google_place_type Google Places type of the venue. (See supported types.)
     *
     * @return array $args
     */
    public function InputVenueMessageContent ( array $latitude, array $longitude, string $title, string $address, ?string $foursquare_id = NULL, ?string $foursquare_type = NULL, ?string $google_place_id = NULL, ?string $google_place_type = NULL ) : array {
      $args = [ 'latitude' => $latitude, 'longitude' => $longitude, 'title' => $title, 'address' => $address ]; 
      if ( $foursquare_id !== NULL ) $args['foursquare_id'] = $foursquare_id;
      if ( $foursquare_type !== NULL ) $args['foursquare_type'] = $foursquare_type;
      if ( $google_place_id !== NULL ) $args['google_place_id'] = $google_place_id;
      if ( $google_place_type !== NULL ) $args['google_place_type'] = $google_place_type;
      return $args;
    }

    /**
     * Represents the content of a contact message to be sent as the result of an inline query.
     * 
     * @see https://core.telegram.org/bots/api#InputContactMessageContent
     *
     * @param string $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param string|NULL $last_name Contact's last name
     * @param string|NULL $vcard Additional data about the contact in the form of a vCard, 0-2048 bytes
     *
     * @return array $args
     */
    public function InputContactMessageContent ( string $phone_number, string $first_name, ?string $last_name = NULL, ?string $vcard = NULL ) : array {
      $args = [ 'phone_number' => $phone_number, 'first_name' => $first_name ]; 
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $vcard !== NULL ) $args['vcard'] = $vcard;
      return $args;
    }

    /**
     * Represents the content of an invoice message to be sent as the result of an inline query.
     * 
     * @see https://core.telegram.org/bots/api#InputInvoiceMessageContent
     *
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your
     *                              internal processes.
     * @param string|NULL $provider_token Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
     * @param string $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram
     *                              Stars.
     * @param LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
     *                              cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param int|NULL $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not
     *                              float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp
     *                              parameter in currencies.json, it shows the number of digits past the decimal point for each currency
     *                              (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
     * @param int[]|NULL $suggested_tip_amounts A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer,
     *                              not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must
     *                              be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|NULL $provider_data A JSON-serialized object for data about the invoice, which will be shared with the payment provider.
     *                              A detailed description of the required fields should be provided by the payment provider.
     * @param string|NULL $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service.
     * @param int|NULL $photo_size Photo size in bytes
     * @param int|NULL $photo_width Photo width
     * @param int|NULL $photo_height Photo height
     * @param bool|NULL $need_name Pass True if you require the user's full name to complete the order. Ignored for payments in
     *                              Telegram Stars.
     * @param bool|NULL $need_phone_number Pass True if you require the user's phone number to complete the order. Ignored for payments in
     *                              Telegram Stars.
     * @param bool|NULL $need_email Pass True if you require the user's email address to complete the order. Ignored for payments in
     *                              Telegram Stars.
     * @param bool|NULL $need_shipping_address Pass True if you require the user's shipping address to complete the order. Ignored for payments in
     *                              Telegram Stars.
     * @param bool|NULL $send_phone_number_to_provider Pass True if the user's phone number should be sent to the provider. Ignored for payments in
     *                              Telegram Stars.
     * @param bool|NULL $send_email_to_provider Pass True if the user's email address should be sent to the provider. Ignored for payments in
     *                              Telegram Stars.
     * @param bool|NULL $is_flexible Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
     *
     * @return array $args
     */
    public function InputInvoiceMessageContent ( string $title, string $description, string $payload, string $currency, array $prices, ?string $provider_token = NULL, ?int $max_tip_amount = NULL, ?array $suggested_tip_amounts = NULL, ?string $provider_data = NULL, ?string $photo_url = NULL, ?int $photo_size = NULL, ?int $photo_width = NULL, ?int $photo_height = NULL, ?bool $need_name = NULL, ?bool $need_phone_number = NULL, ?bool $need_email = NULL, ?bool $need_shipping_address = NULL, ?bool $send_phone_number_to_provider = NULL, ?bool $send_email_to_provider = NULL, ?bool $is_flexible = NULL ) : array {
      $args = [ 'title' => $title, 'description' => $description, 'payload' => $payload, 'currency' => $currency, 'prices' => $prices ]; 
      if ( $provider_token !== NULL ) $args['provider_token'] = $provider_token;
      if ( $max_tip_amount !== NULL ) $args['max_tip_amount'] = $max_tip_amount;
      if ( $suggested_tip_amounts !== NULL ) $args['suggested_tip_amounts'] = $suggested_tip_amounts;
      if ( $provider_data !== NULL ) $args['provider_data'] = $provider_data;
      if ( $photo_url !== NULL ) $args['photo_url'] = $photo_url;
      if ( $photo_size !== NULL ) $args['photo_size'] = $photo_size;
      if ( $photo_width !== NULL ) $args['photo_width'] = $photo_width;
      if ( $photo_height !== NULL ) $args['photo_height'] = $photo_height;
      if ( $need_name !== NULL ) $args['need_name'] = $need_name;
      if ( $need_phone_number !== NULL ) $args['need_phone_number'] = $need_phone_number;
      if ( $need_email !== NULL ) $args['need_email'] = $need_email;
      if ( $need_shipping_address !== NULL ) $args['need_shipping_address'] = $need_shipping_address;
      if ( $send_phone_number_to_provider !== NULL ) $args['send_phone_number_to_provider'] = $send_phone_number_to_provider;
      if ( $send_email_to_provider !== NULL ) $args['send_email_to_provider'] = $send_email_to_provider;
      if ( $is_flexible !== NULL ) $args['is_flexible'] = $is_flexible;
      return $args;
    }

    /**
     * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
     * 
     * @see https://core.telegram.org/bots/api#ChosenInlineResult
     *
     * @param string $result_id The unique identifier for the result that was chosen
     * @param User $from The user that chose the result
     * @param Location|NULL $location Sender location, only for bots that require user location
     * @param string|NULL $inline_message_id Identifier of the sent inline message. Available only if there is an inline keyboard attached to the
     *                              message. Will be also received in callback queries and can be used to edit the message.
     * @param string $query The query that was used to obtain the result
     *
     * @return array $args
     */
    public function ChosenInlineResult ( string $result_id, array $from, string $query, ?array $location = NULL, ?string $inline_message_id = NULL ) : array {
      $args = [ 'result_id' => $result_id, 'from' => $from, 'query' => $query ]; 
      if ( $location !== NULL ) $args['location'] = $location;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      return $args;
    }

    /**
     * Describes an inline message sent by a Web App on behalf of a user.
     * 
     * @see https://core.telegram.org/bots/api#SentWebAppMessage
     *
     * @param string|NULL $inline_message_id Identifier of the sent inline message. Available only if there is an inline keyboard attached to the
     *                              message.
     *
     * @return array $args
     */
    public function SentWebAppMessage ( ?string $inline_message_id = NULL ) : array {
      $args = []; 
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      return $args;
    }

    /**
     * Describes an inline message to be sent by a user of a Mini App.
     * 
     * @see https://core.telegram.org/bots/api#PreparedInlineMessage
     *
     * @param string $id Unique identifier of the prepared message
     * @param int $expiration_date Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be used
     *
     * @return array $args
     */
    public function PreparedInlineMessage ( string $id, int $expiration_date ) : array {
      return [ 'id' => $id, 'expiration_date' => $expiration_date ];
    }

    /**
     * This object represents a portion of the price for goods or services.
     * 
     * @see https://core.telegram.org/bots/api#LabeledPrice
     *
     * @param string $label Portion label
     * @param int $amount Price of the product in the smallest units of the currency (integer, not float/double). For example,
     *                              for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the
     *                              number of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @return array $args
     */
    public function LabeledPrice ( string $label, int $amount ) : array {
      return [ 'label' => $label, 'amount' => $amount ];
    }

    /**
     * This object contains basic information about an invoice.
     * 
     * @see https://core.telegram.org/bots/api#Invoice
     *
     * @param string $title Product name
     * @param string $description Product description
     * @param string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     *                              price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number
     *                              of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @return array $args
     */
    public function Invoice ( string $title, string $description, string $start_parameter, string $currency, int $total_amount ) : array {
      return [ 'title' => $title, 'description' => $description, 'start_parameter' => $start_parameter, 'currency' => $currency, 'total_amount' => $total_amount ];
    }

    /**
     * This object represents a shipping address.
     * 
     * @see https://core.telegram.org/bots/api#ShippingAddress
     *
     * @param string $country_code Two-letter ISO 3166-1 alpha-2 country code
     * @param string $state State, if applicable
     * @param string $city City
     * @param string $street_line1 First line for the address
     * @param string $street_line2 Second line for the address
     * @param string $post_code Address post code
     *
     * @return array $args
     */
    public function ShippingAddress ( string $country_code, string $state, string $city, string $street_line1, string $street_line2, string $post_code ) : array {
      return [ 'country_code' => $country_code, 'state' => $state, 'city' => $city, 'street_line1' => $street_line1, 'street_line2' => $street_line2, 'post_code' => $post_code ];
    }

    /**
     * This object represents information about an order.
     * 
     * @see https://core.telegram.org/bots/api#OrderInfo
     *
     * @param string|NULL $name User name
     * @param string|NULL $phone_number User's phone number
     * @param string|NULL $email User email
     * @param ShippingAddress|NULL $shipping_address User shipping address
     *
     * @return array $args
     */
    public function OrderInfo ( ?string $name = NULL, ?string $phone_number = NULL, ?string $email = NULL, ?array $shipping_address = NULL ) : array {
      $args = []; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $phone_number !== NULL ) $args['phone_number'] = $phone_number;
      if ( $email !== NULL ) $args['email'] = $email;
      if ( $shipping_address !== NULL ) $args['shipping_address'] = $shipping_address;
      return $args;
    }

    /**
     * This object represents one shipping option.
     * 
     * @see https://core.telegram.org/bots/api#ShippingOption
     *
     * @param string $id Shipping option identifier
     * @param string $title Option title
     * @param LabeledPrice[] $prices List of price portions
     *
     * @return array $args
     */
    public function ShippingOption ( string $id, string $title, array $prices ) : array {
      return [ 'id' => $id, 'title' => $title, 'prices' => $prices ];
    }

    /**
     * This object contains basic information about a successful payment. Note that if the buyer initiates
     * a chargeback with the relevant payment provider following this transaction, the funds may be debited
     * from your balance. This is outside of Telegram's control.
     * 
     * @see https://core.telegram.org/bots/api#SuccessfulPayment
     *
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     *                              price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number
     *                              of digits past the decimal point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot-specified invoice payload
     * @param int|NULL $subscription_expiration_date Expiration date of the subscription, in Unix time; for recurring payments only
     * @param bool|NULL $is_recurring True, if the payment is a recurring payment for a subscription
     * @param bool|NULL $is_first_recurring True, if the payment is the first payment for a subscription
     * @param string|NULL $shipping_option_id Identifier of the shipping option chosen by the user
     * @param OrderInfo|NULL $order_info Order information provided by the user
     * @param string $telegram_payment_charge_id Telegram payment identifier
     * @param string $provider_payment_charge_id Provider payment identifier
     *
     * @return array $args
     */
    public function SuccessfulPayment ( string $currency, int $total_amount, string $invoice_payload, string $telegram_payment_charge_id, string $provider_payment_charge_id, ?int $subscription_expiration_date = NULL, ?bool $is_recurring = NULL, ?bool $is_first_recurring = NULL, ?string $shipping_option_id = NULL, ?array $order_info = NULL ) : array {
      $args = [ 'currency' => $currency, 'total_amount' => $total_amount, 'invoice_payload' => $invoice_payload, 'telegram_payment_charge_id' => $telegram_payment_charge_id, 'provider_payment_charge_id' => $provider_payment_charge_id ]; 
      if ( $subscription_expiration_date !== NULL ) $args['subscription_expiration_date'] = $subscription_expiration_date;
      if ( $is_recurring !== NULL ) $args['is_recurring'] = $is_recurring;
      if ( $is_first_recurring !== NULL ) $args['is_first_recurring'] = $is_first_recurring;
      if ( $shipping_option_id !== NULL ) $args['shipping_option_id'] = $shipping_option_id;
      if ( $order_info !== NULL ) $args['order_info'] = $order_info;
      return $args;
    }

    /**
     * This object contains basic information about a refunded payment.
     * 
     * @see https://core.telegram.org/bots/api#RefundedPayment
     *
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always “XTR”
     * @param int $total_amount Total refunded price in the smallest units of the currency (integer, not float/double). For example,
     *                              for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the
     *                              number of digits past the decimal point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot-specified invoice payload
     * @param string $telegram_payment_charge_id Telegram payment identifier
     * @param string|NULL $provider_payment_charge_id Provider payment identifier
     *
     * @return array $args
     */
    public function RefundedPayment ( string $currency = 'XTR', int $total_amount, string $invoice_payload, string $telegram_payment_charge_id, ?string $provider_payment_charge_id = NULL ) : array {
      $args = [ 'currency' => $currency, 'total_amount' => $total_amount, 'invoice_payload' => $invoice_payload, 'telegram_payment_charge_id' => $telegram_payment_charge_id ]; 
      if ( $provider_payment_charge_id !== NULL ) $args['provider_payment_charge_id'] = $provider_payment_charge_id;
      return $args;
    }

    /**
     * This object contains information about an incoming shipping query.
     * 
     * @see https://core.telegram.org/bots/api#ShippingQuery
     *
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $invoice_payload Bot-specified invoice payload
     * @param ShippingAddress $shipping_address User specified shipping address
     *
     * @return array $args
     */
    public function ShippingQuery ( string $id, array $from, string $invoice_payload, array $shipping_address ) : array {
      return [ 'id' => $id, 'from' => $from, 'invoice_payload' => $invoice_payload, 'shipping_address' => $shipping_address ];
    }

    /**
     * This object contains information about an incoming pre-checkout query.
     * 
     * @see https://core.telegram.org/bots/api#PreCheckoutQuery
     *
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $total_amount Total price in the smallest units of the currency (integer, not float/double). For example, for a
     *                              price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number
     *                              of digits past the decimal point for each currency (2 for the majority of currencies).
     * @param string $invoice_payload Bot-specified invoice payload
     * @param string|NULL $shipping_option_id Identifier of the shipping option chosen by the user
     * @param OrderInfo|NULL $order_info Order information provided by the user
     *
     * @return array $args
     */
    public function PreCheckoutQuery ( string $id, array $from, string $currency, int $total_amount, string $invoice_payload, ?string $shipping_option_id = NULL, ?array $order_info = NULL ) : array {
      $args = [ 'id' => $id, 'from' => $from, 'currency' => $currency, 'total_amount' => $total_amount, 'invoice_payload' => $invoice_payload ]; 
      if ( $shipping_option_id !== NULL ) $args['shipping_option_id'] = $shipping_option_id;
      if ( $order_info !== NULL ) $args['order_info'] = $order_info;
      return $args;
    }

    /**
     * This object contains information about a paid media purchase.
     * 
     * @see https://core.telegram.org/bots/api#PaidMediaPurchased
     *
     * @param User $from User who purchased the media
     * @param string $paid_media_payload Bot-specified paid media payload
     *
     * @return array $args
     */
    public function PaidMediaPurchased ( array $from, string $paid_media_payload ) : array {
      return [ 'from' => $from, 'paid_media_payload' => $paid_media_payload ];
    }

    /**
     * This object describes the state of a revenue withdrawal operation. Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#RevenueWithdrawalState
     *
     *
     * @return array $args
     */
    public function RevenueWithdrawalState ( ) : array {
      return [];
    }

    /**
     * The withdrawal is in progress.
     * 
     * @see https://core.telegram.org/bots/api#RevenueWithdrawalStatePending
     *
     * @param string $type Type of the state, always “pending”
     *
     * @return array $args
     */
    public function RevenueWithdrawalStatePending ( string $type = 'pending' ) : array {
      return [ 'type' => $type ];
    }

    /**
     * The withdrawal succeeded.
     * 
     * @see https://core.telegram.org/bots/api#RevenueWithdrawalStateSucceeded
     *
     * @param string $type Type of the state, always “succeeded”
     * @param int $date Date the withdrawal was completed in Unix time
     * @param string $url An HTTPS URL that can be used to see transaction details
     *
     * @return array $args
     */
    public function RevenueWithdrawalStateSucceeded ( string $type = 'succeeded', int $date, string $url ) : array {
      return [ 'type' => $type, 'date' => $date, 'url' => $url ];
    }

    /**
     * The withdrawal failed and the transaction was refunded.
     * 
     * @see https://core.telegram.org/bots/api#RevenueWithdrawalStateFailed
     *
     * @param string $type Type of the state, always “failed”
     *
     * @return array $args
     */
    public function RevenueWithdrawalStateFailed ( string $type = 'failed' ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Contains information about the affiliate that received a commission via this transaction.
     * 
     * @see https://core.telegram.org/bots/api#AffiliateInfo
     *
     * @param User|NULL $affiliate_user The bot or the user that received an affiliate commission if it was received by a bot or a user
     * @param Chat|NULL $affiliate_chat The chat that received an affiliate commission if it was received by a chat
     * @param int $commission_per_mille The number of Telegram Stars received by the affiliate for each 1000 Telegram Stars received by the
     *                              bot from referred users
     * @param int $amount Integer amount of Telegram Stars received by the affiliate from the transaction, rounded to 0; can
     *                              be negative for refunds
     * @param int|NULL $nanostar_amount The number of 1/1000000000 shares of Telegram Stars received by the affiliate; from -999999999 to
     *                              999999999; can be negative for refunds
     *
     * @return array $args
     */
    public function AffiliateInfo ( int $commission_per_mille, int $amount, ?array $affiliate_user = NULL, ?array $affiliate_chat = NULL, ?int $nanostar_amount = NULL ) : array {
      $args = [ 'commission_per_mille' => $commission_per_mille, 'amount' => $amount ]; 
      if ( $affiliate_user !== NULL ) $args['affiliate_user'] = $affiliate_user;
      if ( $affiliate_chat !== NULL ) $args['affiliate_chat'] = $affiliate_chat;
      if ( $nanostar_amount !== NULL ) $args['nanostar_amount'] = $nanostar_amount;
      return $args;
    }

    /**
     * This object describes the source of a transaction, or its recipient for outgoing transactions.
     * Currently, it can be one of
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartner
     *
     *
     * @return array $args
     */
    public function TransactionPartner ( ) : array {
      return [];
    }

    /**
     * Describes a transaction with a user.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerUser
     *
     * @param string $type Type of the transaction partner, always “user”
     * @param string $transaction_type Type of the transaction, currently one of “invoice_payment” for payments via invoices,
     *                              “paid_media_payment” for payments for paid media, “gift_purchase” for gifts sent by the bot,
     *                              “premium_purchase” for Telegram Premium subscriptions gifted by the bot,
     *                              “business_account_transfer” for direct transfers from managed business accounts
     * @param User $user Information about the user
     * @param AffiliateInfo|NULL $affiliate Information about the affiliate that received a commission via this transaction. Can be available
     *                              only for “invoice_payment” and “paid_media_payment” transactions.
     * @param string|NULL $invoice_payload Bot-specified invoice payload. Can be available only for “invoice_payment” transactions.
     * @param int|NULL $subscription_period The duration of the paid subscription. Can be available only for “invoice_payment” transactions.
     * @param PaidMedia[]|NULL $paid_media Information about the paid media bought by the user; for “paid_media_payment” transactions only
     * @param string|NULL $paid_media_payload Bot-specified paid media payload. Can be available only for “paid_media_payment” transactions.
     * @param Gift|NULL $gift The gift sent to the user by the bot; for “gift_purchase” transactions only
     * @param int|NULL $premium_subscription_duration Number of months the gifted Telegram Premium subscription will be active for; for
     *                              “premium_purchase” transactions only
     *
     * @return array $args
     */
    public function TransactionPartnerUser ( string $type = 'user', string $transaction_type, array $user, ?array $affiliate = NULL, ?string $invoice_payload = NULL, ?int $subscription_period = NULL, ?array $paid_media = NULL, ?string $paid_media_payload = NULL, ?array $gift = NULL, ?int $premium_subscription_duration = NULL ) : array {
      $args = [ 'type' => $type, 'transaction_type' => $transaction_type, 'user' => $user ]; 
      if ( $affiliate !== NULL ) $args['affiliate'] = $affiliate;
      if ( $invoice_payload !== NULL ) $args['invoice_payload'] = $invoice_payload;
      if ( $subscription_period !== NULL ) $args['subscription_period'] = $subscription_period;
      if ( $paid_media !== NULL ) $args['paid_media'] = $paid_media;
      if ( $paid_media_payload !== NULL ) $args['paid_media_payload'] = $paid_media_payload;
      if ( $gift !== NULL ) $args['gift'] = $gift;
      if ( $premium_subscription_duration !== NULL ) $args['premium_subscription_duration'] = $premium_subscription_duration;
      return $args;
    }

    /**
     * Describes a transaction with a chat.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerChat
     *
     * @param string $type Type of the transaction partner, always “chat”
     * @param Chat $chat Information about the chat
     * @param Gift|NULL $gift The gift sent to the chat by the bot
     *
     * @return array $args
     */
    public function TransactionPartnerChat ( string $type = 'chat', array $chat, ?array $gift = NULL ) : array {
      $args = [ 'type' => $type, 'chat' => $chat ]; 
      if ( $gift !== NULL ) $args['gift'] = $gift;
      return $args;
    }

    /**
     * Describes the affiliate program that issued the affiliate commission received via this transaction.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerAffiliateProgram
     *
     * @param string $type Type of the transaction partner, always “affiliate_program”
     * @param User|NULL $sponsor_user Information about the bot that sponsored the affiliate program
     * @param int $commission_per_mille The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by the
     *                              affiliate program sponsor from referred users
     *
     * @return array $args
     */
    public function TransactionPartnerAffiliateProgram ( string $type = 'affiliate_program', int $commission_per_mille, ?array $sponsor_user = NULL ) : array {
      $args = [ 'type' => $type, 'commission_per_mille' => $commission_per_mille ]; 
      if ( $sponsor_user !== NULL ) $args['sponsor_user'] = $sponsor_user;
      return $args;
    }

    /**
     * Describes a withdrawal transaction with Fragment.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerFragment
     *
     * @param string $type Type of the transaction partner, always “fragment”
     * @param RevenueWithdrawalState|NULL $withdrawal_state State of the transaction if the transaction is outgoing
     *
     * @return array $args
     */
    public function TransactionPartnerFragment ( string $type = 'fragment', ?array $withdrawal_state = NULL ) : array {
      $args = [ 'type' => $type ]; 
      if ( $withdrawal_state !== NULL ) $args['withdrawal_state'] = $withdrawal_state;
      return $args;
    }

    /**
     * Describes a withdrawal transaction to the Telegram Ads platform.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerTelegramAds
     *
     * @param string $type Type of the transaction partner, always “telegram_ads”
     *
     * @return array $args
     */
    public function TransactionPartnerTelegramAds ( string $type = 'telegram_ads' ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Describes a transaction with payment for paid broadcasting.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerTelegramApi
     *
     * @param string $type Type of the transaction partner, always “telegram_api”
     * @param int $request_count The number of successful requests that exceeded regular limits and were therefore billed
     *
     * @return array $args
     */
    public function TransactionPartnerTelegramApi ( string $type = 'telegram_api', int $request_count ) : array {
      return [ 'type' => $type, 'request_count' => $request_count ];
    }

    /**
     * Describes a transaction with an unknown source or recipient.
     * 
     * @see https://core.telegram.org/bots/api#TransactionPartnerOther
     *
     * @param string $type Type of the transaction partner, always “other”
     *
     * @return array $args
     */
    public function TransactionPartnerOther ( string $type = 'other' ) : array {
      return [ 'type' => $type ];
    }

    /**
     * Describes a Telegram Star transaction. Note that if the buyer initiates a chargeback with the
     * payment provider from whom they acquired Stars (e.g., Apple, Google) following this transaction, the
     * refunded Stars will be deducted from the bot's balance. This is outside of Telegram's control.
     * 
     * @see https://core.telegram.org/bots/api#StarTransaction
     *
     * @param string $id Unique identifier of the transaction. Coincides with the identifier of the original transaction for
     *                              refund transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful
     *                              incoming payments from users.
     * @param int $amount Integer amount of Telegram Stars transferred by the transaction
     * @param int|NULL $nanostar_amount The number of 1/1000000000 shares of Telegram Stars transferred by the transaction; from 0 to 999999999
     * @param int $date Date the transaction was created in Unix time
     * @param TransactionPartner|NULL $source Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a
     *                              failed withdrawal). Only for incoming transactions
     * @param TransactionPartner|NULL $receiver Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal).
     *                              Only for outgoing transactions
     *
     * @return array $args
     */
    public function StarTransaction ( string $id, int $amount, int $date, ?int $nanostar_amount = NULL, ?array $source = NULL, ?array $receiver = NULL ) : array {
      $args = [ 'id' => $id, 'amount' => $amount, 'date' => $date ]; 
      if ( $nanostar_amount !== NULL ) $args['nanostar_amount'] = $nanostar_amount;
      if ( $source !== NULL ) $args['source'] = $source;
      if ( $receiver !== NULL ) $args['receiver'] = $receiver;
      return $args;
    }

    /**
     * Contains a list of Telegram Star transactions.
     * 
     * @see https://core.telegram.org/bots/api#StarTransactions
     *
     * @param StarTransaction[] $transactions The list of transactions
     *
     * @return array $args
     */
    public function StarTransactions ( array $transactions ) : array {
      return [ 'transactions' => $transactions ];
    }

    /**
     * Describes Telegram Passport data shared with the bot by the user.
     * 
     * @see https://core.telegram.org/bots/api#PassportData
     *
     * @param EncryptedPassportElement[] $data Array with information about documents and other Telegram Passport elements that was shared with the
     *                              bot
     * @param EncryptedCredentials $credentials Encrypted credentials required to decrypt the data
     *
     * @return array $args
     */
    public function PassportData ( array $data, array $credentials ) : array {
      return [ 'data' => $data, 'credentials' => $credentials ];
    }

    /**
     * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files
     * are in JPEG format when decrypted and don't exceed 10MB.
     * 
     * @see https://core.telegram.org/bots/api#PassportFile
     *
     * @param string $file_id Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
     *                              Can't be used to download or reuse the file.
     * @param int $file_size File size in bytes
     * @param int $file_date Unix time when the file was uploaded
     *
     * @return array $args
     */
    public function PassportFile ( string $file_id, string $file_unique_id, int $file_size, int $file_date ) : array {
      return [ 'file_id' => $file_id, 'file_unique_id' => $file_unique_id, 'file_size' => $file_size, 'file_date' => $file_date ];
    }

    /**
     * Describes documents or other Telegram Passport elements shared with the bot by the user.
     * 
     * @see https://core.telegram.org/bots/api#EncryptedPassportElement
     *
     * @param string $type Element type. One of “personal_details”, “passport”, “driver_license”,
     *                              “identity_card”, “internal_passport”, “address”, “utility_bill”,
     *                              “bank_statement”, “rental_agreement”, “passport_registration”,
     *                              “temporary_registration”, “phone_number”, “email”.
     * @param string|NULL $data Base64-encoded encrypted Telegram Passport element data provided by the user; available only for
     *                              “personal_details”, “passport”, “driver_license”, “identity_card”,
     *                              “internal_passport” and “address” types. Can be decrypted and verified using the
     *                              accompanying EncryptedCredentials.
     * @param string|NULL $phone_number User's verified phone number; available only for “phone_number” type
     * @param string|NULL $email User's verified email address; available only for “email” type
     * @param PassportFile[]|NULL $files Array of encrypted files with documents provided by the user; available only for “utility_bill”,
     *                              “bank_statement”, “rental_agreement”, “passport_registration” and
     *                              “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile|NULL $front_side Encrypted file with the front side of the document, provided by the user; available only for
     *                              “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can
     *                              be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile|NULL $reverse_side Encrypted file with the reverse side of the document, provided by the user; available only for
     *                              “driver_license” and “identity_card”. The file can be decrypted and verified using the
     *                              accompanying EncryptedCredentials.
     * @param PassportFile|NULL $selfie Encrypted file with the selfie of the user holding a document, provided by the user; available if
     *                              requested for “passport”, “driver_license”, “identity_card” and “internal_passport”.
     *                              The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFile[]|NULL $translation Array of encrypted files with translated versions of documents provided by the user; available if
     *                              requested for “passport”, “driver_license”, “identity_card”, “internal_passport”,
     *                              “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and
     *                              “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param string $hash Base64-encoded element hash for using in PassportElementErrorUnspecified
     *
     * @return array $args
     */
    public function EncryptedPassportElement ( string $type, string $hash, ?string $data = NULL, ?string $phone_number = NULL, ?string $email = NULL, ?array $files = NULL, ?array $front_side = NULL, ?array $reverse_side = NULL, ?array $selfie = NULL, ?array $translation = NULL ) : array {
      $args = [ 'type' => $type, 'hash' => $hash ]; 
      if ( $data !== NULL ) $args['data'] = $data;
      if ( $phone_number !== NULL ) $args['phone_number'] = $phone_number;
      if ( $email !== NULL ) $args['email'] = $email;
      if ( $files !== NULL ) $args['files'] = $files;
      if ( $front_side !== NULL ) $args['front_side'] = $front_side;
      if ( $reverse_side !== NULL ) $args['reverse_side'] = $reverse_side;
      if ( $selfie !== NULL ) $args['selfie'] = $selfie;
      if ( $translation !== NULL ) $args['translation'] = $translation;
      return $args;
    }

    /**
     * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram
     * Passport Documentation for a complete description of the data decryption and authentication processes.
     * 
     * @see https://core.telegram.org/bots/api#EncryptedCredentials
     *
     * @param string $data Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets
     *                              required for EncryptedPassportElement decryption and authentication
     * @param string $hash Base64-encoded data hash for data authentication
     * @param string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
     *
     * @return array $args
     */
    public function EncryptedCredentials ( string $data, string $hash, string $secret ) : array {
      return [ 'data' => $data, 'hash' => $hash, 'secret' => $secret ];
    }

    /**
     * This object represents an error in the Telegram Passport element which was submitted that should be
     * resolved by the user. It should be one of:
     * 
     * @see https://core.telegram.org/bots/api#PassportElementError
     *
     *
     * @return array $args
     */
    public function PassportElementError ( ) : array {
      return [];
    }

    /**
     * Represents an issue in one of the data fields that was provided by the user. The error is considered
     * resolved when the field's value changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorDataField
     *
     * @param string $source Error source, must be data
     * @param string $type The section of the user's Telegram Passport which has the error, one of “personal_details”,
     *                              “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
     * @param string $field_name Name of the data field which has the error
     * @param string $data_hash Base64-encoded data hash
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorDataField ( string $source, string $type, string $field_name, string $data_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'field_name' => $field_name, 'data_hash' => $data_hash, 'message' => $message ];
    }

    /**
     * Represents an issue with the front side of a document. The error is considered resolved when the
     * file with the front side of the document changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorFrontSide
     *
     * @param string $source Error source, must be front_side
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “passport”,
     *                              “driver_license”, “identity_card”, “internal_passport”
     * @param string $file_hash Base64-encoded hash of the file with the front side of the document
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorFrontSide ( string $source, string $type, string $file_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hash' => $file_hash, 'message' => $message ];
    }

    /**
     * Represents an issue with the reverse side of a document. The error is considered resolved when the
     * file with reverse side of the document changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorReverseSide
     *
     * @param string $source Error source, must be reverse_side
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “driver_license”, “identity_card”
     * @param string $file_hash Base64-encoded hash of the file with the reverse side of the document
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorReverseSide ( string $source, string $type, string $file_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hash' => $file_hash, 'message' => $message ];
    }

    /**
     * Represents an issue with the selfie with a document. The error is considered resolved when the file
     * with the selfie changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorSelfie
     *
     * @param string $source Error source, must be selfie
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “passport”,
     *                              “driver_license”, “identity_card”, “internal_passport”
     * @param string $file_hash Base64-encoded hash of the file with the selfie
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorSelfie ( string $source, string $type, string $file_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hash' => $file_hash, 'message' => $message ];
    }

    /**
     * Represents an issue with a document scan. The error is considered resolved when the file with the
     * document scan changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorFile
     *
     * @param string $source Error source, must be file
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”,
     *                              “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string $file_hash Base64-encoded file hash
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorFile ( string $source, string $type, string $file_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hash' => $file_hash, 'message' => $message ];
    }

    /**
     * Represents an issue with a list of scans. The error is considered resolved when the list of files
     * containing the scans changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorFiles
     *
     * @param string $source Error source, must be files
     * @param string $type The section of the user's Telegram Passport which has the issue, one of “utility_bill”,
     *                              “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string[] $file_hashes List of base64-encoded file hashes
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorFiles ( string $source, string $type, array $file_hashes, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hashes' => $file_hashes, 'message' => $message ];
    }

    /**
     * Represents an issue with one of the files that constitute the translation of a document. The error
     * is considered resolved when the file changes.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorTranslationFile
     *
     * @param string $source Error source, must be translation_file
     * @param string $type Type of element of the user's Telegram Passport which has the issue, one of “passport”,
     *                              “driver_license”, “identity_card”, “internal_passport”, “utility_bill”,
     *                              “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string $file_hash Base64-encoded file hash
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorTranslationFile ( string $source, string $type, string $file_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hash' => $file_hash, 'message' => $message ];
    }

    /**
     * Represents an issue with the translated version of a document. The error is considered resolved when
     * a file with the document translation change.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorTranslationFiles
     *
     * @param string $source Error source, must be translation_files
     * @param string $type Type of element of the user's Telegram Passport which has the issue, one of “passport”,
     *                              “driver_license”, “identity_card”, “internal_passport”, “utility_bill”,
     *                              “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
     * @param string[] $file_hashes List of base64-encoded file hashes
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorTranslationFiles ( string $source, string $type, array $file_hashes, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'file_hashes' => $file_hashes, 'message' => $message ];
    }

    /**
     * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
     * 
     * @see https://core.telegram.org/bots/api#PassportElementErrorUnspecified
     *
     * @param string $source Error source, must be unspecified
     * @param string $type Type of element of the user's Telegram Passport which has the issue
     * @param string $element_hash Base64-encoded element hash
     * @param string $message Error message
     *
     * @return array $args
     */
    public function PassportElementErrorUnspecified ( string $source, string $type, string $element_hash, string $message ) : array {
      return [ 'source' => $source, 'type' => $type, 'element_hash' => $element_hash, 'message' => $message ];
    }

    /**
     * This object represents a game. Use BotFather to create and edit games, their short names will act as
     * unique identifiers.
     * 
     * @see https://core.telegram.org/bots/api#Game
     *
     * @param string $title Title of the game
     * @param string $description Description of the game
     * @param PhotoSize[] $photo Photo that will be displayed in the game message in chats.
     * @param string|NULL $text Brief description of the game or high scores included in the game message. Can be automatically
     *                              edited to include current high scores for the game when the bot calls setGameScore, or manually
     *                              edited using editMessageText. 0-4096 characters.
     * @param MessageEntity[]|NULL $text_entities Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     * @param Animation|NULL $animation Animation that will be displayed in the game message in chats. Upload via BotFather
     *
     * @return array $args
     */
    public function Game ( string $title, string $description, array $photo, ?string $text = NULL, ?array $text_entities = NULL, ?array $animation = NULL ) : array {
      $args = [ 'title' => $title, 'description' => $description, 'photo' => $photo ]; 
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $text_entities !== NULL ) $args['text_entities'] = $text_entities;
      if ( $animation !== NULL ) $args['animation'] = $animation;
      return $args;
    }

    /**
     * A placeholder, currently holds no information. Use BotFather to set up your game.
     * 
     * @see https://core.telegram.org/bots/api#CallbackGame
     *
     *
     * @return array $args
     */
    public function CallbackGame ( ) : array {
      return [];
    }

    /**
     * This object represents one row of the high scores table for a game.
     * 
     * @see https://core.telegram.org/bots/api#GameHighScore
     *
     * @param int $position Position in high score table for the game
     * @param User $user User
     * @param int $score Score
     *
     * @return array $args
     */
    public function GameHighScore ( int $position, array $user, int $score ) : array {
      return [ 'position' => $position, 'user' => $user, 'score' => $score ];
    }

  }