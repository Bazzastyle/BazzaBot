<?php
	namespace BazzaBot;

	class EasyVars {
		private array $update_types = [
			'message',
			'edited_message',
			'channel_post',
			'edited_channel_post',
			'business_connection',
			'business_message',
			'edited_business_message',
			'deleted_business_messages',
			'message_reaction',
			'message_reaction_count',
			'inline_query',
			'chosen_inline_result',
			'callback_query',
			'shipping_query',
			'pre_checkout_query',
			'purchased_paid_media',
			'poll',
			'poll_answer',
			'my_chat_member',
			'chat_member',
			'chat_join_request',
			'chat_boost',
			'removed_chat_boost',
		];
		private string $update_type;

		public function __construct ( object $update ) {
			foreach ( $this->update_types as $update_type ) {
				if ( isset( $update->{$update_type} ) ) {
					$this->update_type = $update_type;
					break;
				}
			}

			if ( isset ( $this->update_type ) ) {
				$this->update_id = $update->update_id ?? null;
				$update = $update->{$this->update_type};

				if ( in_array( $this->update_type, [ 'message', 'edited_message', 'channel_post', 'edited_channel_post', 'business_message', 'edited_business_message' ] ) ) $this->Message( $update );
				elseif ( $this->update_type === 'business_connection' ) $this->BusinessConnection( $update );
				elseif ( $this->update_type === 'deleted_business_messages' ) $this->BusinessMessagesDeleted( $update );
				elseif ( $this->update_type === 'message_reaction' ) $this->MessageReactionUpdated( $update );
				elseif ( $this->update_type === 'message_reaction_count' ) $this->MessageReactionCountUpdated( $update );
				elseif ( $this->update_type === 'inline_query' ) $this->InlineQuery( $update );
				elseif ( $this->update_type === 'chosen_inline_result' ) $this->ChosenInlineResult( $update );
				elseif ( $this->update_type === 'callback_query' ) $this->CallbackQuery( $update );
				elseif ( $this->update_type === 'shipping_query' ) $this->ShippingQuery( $update );
				elseif ( $this->update_type === 'pre_checkout_query' ) $this->PreCheckoutQuery( $update );
				elseif ( $this->update_type === 'purchased_paid_media' ) $this->PaidMediaPurchased( $update );
				elseif ( $this->update_type === 'poll' ) $this->Poll( $update );
				elseif ( $this->update_type === 'poll_answer' ) $this->PollAnswer( $update );
				elseif ( in_array( $this->update_type, [ 'my_chat_member', 'chat_member' ] ) ) $this->ChatMemberUpdated( $update );
				elseif ( $this->update_type === 'chat_join_request' ) $this->ChatJoinRequest( $update );
				elseif ( $this->update_type === 'chat_boost' ) $this->ChatBoostUpdated( $update );
				elseif ( $this->update_type === 'removed_chat_boost' ) $this->ChatBoostRemoved( $update );
			}
		}

		public function User ( object|array $update, string $prefix ) {
			if ( is_array( $update ) ) $update = $update[0];
			$this->{$prefix . '_id'}                          = $update->id ?? NULL;
			$this->{$prefix . '_is_bot'}                      = $update->is_bot ?? NULL;
			$this->{$prefix . '_first_name'}                  = $update->first_name ?? NULL;
			$this->{$prefix . '_last_name'}                   = $update->last_name ?? NULL;
			$this->{$prefix . '_username'}                    = $update->username ?? NULL;
			$this->{$prefix . '_language_code'}               = $update->language_code ?? NULL;
			$this->{$prefix . '_is_premium'}                  = $update->is_premium ?? NULL;
			$this->{$prefix . '_added_to_attachment_menu'}    = $update->added_to_attachment_menu ?? NULL;
			$this->{$prefix . '_can_join_groups'}             = $update->can_join_groups ?? NULL;
			$this->{$prefix . '_can_read_all_group_messages'} = $update->can_read_all_group_messages ?? NULL;
			$this->{$prefix . '_supports_inline_queries'}     = $update->supports_inline_queries ?? NULL;
			$this->{$prefix . '_can_connect_to_business'}     = $update->can_connect_to_business ?? NULL;
			$this->{$prefix . '_has_main_web_app'}            = $update->has_main_web_app ?? NULL;
		} 

		public function Chat ( object $update, string $prefix ) {
			$this->{$prefix . '_id'}         = $update->id ?? NULL;
			$this->{$prefix . '_type'}       = $update->type ?? NULL;
			$this->{$prefix . '_title'}      = $update->title ?? NULL;
			$this->{$prefix . '_username'}   = $update->username ?? NULL;
			$this->{$prefix . '_first_name'} = $update->first_name ?? NULL;
			$this->{$prefix . '_last_name'}  = $update->last_name ?? NULL;
			$this->{$prefix . '_is_forum'}   = $update->is_forum ?? NULL;
		}

		public function ChatFullInfo () {}

		public function Message ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'message_id'}             = $update->message_id ?? NULL;
			$this->{$prefix . 'message_thread_id'}      = $update->message_thread_id ?? NULL;
			$this->{$prefix . 'from'}                   = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, ! empty( $prefix ) ? $prefix . 'from' : 'from' );
			$this->{$prefix . 'sender_chat'}            = $update->sender_chat ?? NULL;
			if ( isset( $update->sender_chat ) ) $this->Chat( $update->sender_chat, ! empty( $prefix ) ? $prefix . 'sender_chat' : 'sender_chat' );
			$this->{$prefix . 'sender_boost_count'}     = $update->sender_boost_count ?? NULL;
			$this->{$prefix . 'sender_business_bot'}    = $update->sender_business_bot ?? NULL;
			if ( isset( $update->sender_business_bot ) ) $this->User( $update->sender_business_bot, ! empty( $prefix ) ? $prefix . 'sender_business_bot' : 'sender_business_bot' );
			$this->{$prefix . 'date'} = $update->date ?? NULL;
			$this->{$prefix . 'business_connection_id'} = $update->business_connection_id ?? NULL;
			$this->{$prefix . 'chat'} = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, 'chat' );
			$this->{$prefix . 'forward_origin'}         = $update->forward_origin ?? NULL;
			if ( isset( $update->forward_origin ) ) $this->MessageOrigin( $update->forward_origin,  ! empty( $prefix ) ? $prefix . 'forward_origin' : 'forward_origin' );
			$this->{$prefix . 'is_topic_message'}       = $update->is_topic_message ?? NULL;
			$this->{$prefix . 'is_automatic_forward'}   = $update->is_automatic_forward ?? NULL;
			$this->reply_to_message = $update->reply_to_message ?? NULL;
			if ( isset( $update->reply_to_message ) ) $this->Message( $update->reply_to_message, 'reply_to_message_' );
			if ( $prefix === 'reply_to_message_' ) $this->reply_to_message = $update;
			$this->{$prefix . 'external_reply'}         = $update->external_reply ?? NULL;
			if ( isset( $update->external_reply ) ) $this->ExternalReplyInfo( $update->external_reply, ! empty( $prefix ) ? $prefix . 'external_reply' : 'external_reply' );
			$this->{$prefix . 'quote'}                  = $update->quote ?? NULL;
			if ( isset( $update->quote ) ) $this->TextQuote( $update->quote, ! empty( $prefix ) ? $prefix . 'quote' : 'quote' );
			$this->{$prefix . 'reply_to_story'}         = $update->reply_to_story ?? NULL;
			if ( isset( $update->reply_to_story ) ) $this->Story( $update->reply_to_story, ! empty( $prefix ) ? $prefix . 'reply_to_story' : 'reply_to_story'  );
			$this->{$prefix . 'via_bot'}                = $update->via_bot ?? NULL;
			if ( isset( $update->via_bot ) ) $this->User( $update->via_bot, ! empty( $prefix ) ? $prefix . 'via_bot' : 'via_bot' );
			$this->{$prefix . 'edit_date'} = $update->edit_date ?? NULL;
			$this->{$prefix . 'has_protected_content'}  = $update->has_protected_content ?? NULL;
			$this->{$prefix . 'is_from_offline'}        = $update->is_from_offline ?? NULL;
			$this->{$prefix . 'media_group_id'}         = $update->media_group_id ?? NULL;
			$this->{$prefix . 'author_signature'}       = $update->author_signature ?? NULL;
			$this->{$prefix . 'paid_star_count'}        = $update->paid_star_count ?? NULL;
			$this->{$prefix . 'text'}                   = $update->text ?? NULL;
			$this->{$prefix . 'entities'}               = $update->entities ?? NULL;
			if ( isset( $update->entities ) ) $this->MessageEntity( $update->entities, ! empty( $prefix ) ? $prefix . 'entities' : 'entities' );
			$this->{$prefix . 'link_preview_options'}   = $update->link_preview_options ?? NULL;
			if ( isset( $update->link_preview_options ) ) $this->LinkPreviewOptions( $update->link_preview_options, ! empty( $prefix ) ? $prefix . 'link_preview_options' : 'link_preview_options' );
			$this->{$prefix . 'effect_id'}              = $update->effect_id ?? NULL;
			$this->{$prefix . 'animation'}              = $update->animation ?? NULL;
			if ( isset( $update->animation ) ) $this->Animation( $update->animation, ! empty( $prefix ) ? $prefix . 'animation' : 'animation' );
			$this->{$prefix . 'audio'}                  = $update->audio ?? NULL;
			if ( isset( $update->audio ) ) $this->Audio( $update->audio, ! empty( $prefix ) ? $prefix . 'audio' : 'audio' );
			$this->{$prefix . 'document'}               = $update->document ?? NULL;
			if ( isset( $update->document ) ) $this->Document( $update->document, ! empty( $prefix ) ? $prefix . 'document' : 'document' );
			$this->{$prefix . 'paid_media'}             = $update->paid_media ?? NULL;
			if ( isset( $update->paid_media ) ) $this->PaidMediaInfo( $update->paid_media, ! empty( $prefix ) ? $prefix . 'paid_media' : 'paid_media' );
			$this->{$prefix . 'photo'}                  = $update->photo ?? NULL;
			if ( isset( $update->photo ) ) $this->PhotoSize( $update->photo, ! empty( $prefix ) ? $prefix . 'photo' : 'photo' );
			$this->{$prefix . 'sticker'}                = $update->sticker ?? NULL;
			if ( isset( $update->sticker ) ) $this->Sticker( $update->sticker, ! empty( $prefix ) ? $prefix . 'sticker' : 'sticker' );
			$this->{$prefix . 'story'}                  = $update->story ?? NULL;
			if ( isset( $update->story ) ) $this->Story( $update->story, ! empty( $prefix ) ? $prefix . 'story' : 'story' );
			$this->{$prefix . 'video'} = $update->video ?? NULL;
			if ( isset( $update->video ) ) $this->Video( $update->video, ! empty( $prefix ) ? $prefix . 'video' : 'video' );
			$this->{$prefix . 'video_note'} = $update->video_note ?? NULL;
			if ( isset( $update->video_note ) ) $this->VideoNote( $update->video_note, ! empty( $prefix ) ? $prefix . 'video_note' : 'video_note' );
			$this->{$prefix . 'voice'} = $update->voice ?? NULL;
			if ( isset( $update->voice ) ) $this->Voice( $update->voice, ! empty( $prefix ) ? $prefix . 'voice' : 'voice' );
			$this->{$prefix . 'caption'} = $update->caption ?? NULL;
			$this->{$prefix . 'caption_entities'} = $update->caption_entities ?? NULL;
			$this->{$prefix . 'has_media_spoiler'} = $update->has_media_spoiler ?? NULL;
			$this->{$prefix . 'contact'} = $update->contact ?? NULL;
			if ( isset( $update->contact ) ) $this->Contact( $update->contact, ! empty( $prefix ) ? $prefix . 'contact' : 'contact' );
			$this->{$prefix . 'dice'} = $update->dice ?? NULL;
			if ( isset( $update->dice ) ) $this->Dice( $update->dice, ! empty( $prefix ) ? $prefix . 'dice' : 'dice' );
			$this->{$prefix . 'game'} = $update->game ?? NULL;
			if ( isset( $update->game ) ) $this->Game( $update->game, ! empty( $prefix ) ? $prefix . 'game' : 'game' );
			$this->{$prefix . 'poll'} = $update->poll ?? NULL;
			if ( isset( $update->poll ) ) $this->Poll( $update->poll, 'poll_' );
			$this->{$prefix . 'venue'} = $update->venue ?? NULL;
			if ( isset( $update->venue ) ) $this->Venue( $update->venue, ! empty( $prefix ) ? $prefix . 'venue' : 'venue' );
			$this->{$prefix . 'location'} = $update->location ?? NULL;
			if ( isset( $update->location ) ) $this->Location( $update->location, ! empty( $prefix ) ? $prefix . 'location' : 'location' );
			$this->{$prefix . 'new_chat_members'} = $update->new_chat_members ?? NULL;
			if ( isset( $update->new_chat_members ) ) $this->User( $update->new_chat_members, ! empty( $prefix ) ? $prefix . 'new_chat_members' : 'new_chat_members' );
			$this->{$prefix . 'left_chat_member'} = $update->left_chat_member ?? NULL;
			if ( isset( $update->left_chat_member ) ) $this->User( $update->left_chat_member, ! empty( $prefix ) ? $prefix . 'left_chat_member' : 'left_chat_member' );
			$this->{$prefix . 'new_chat_title'} = $update->new_chat_title ?? NULL;
			$this->{$prefix . 'new_chat_photo'} = $update->new_chat_photo ?? NULL;
			if ( isset( $update->new_chat_photo ) ) $this->PhotoSize( $update->new_chat_photo, ! empty( $prefix ) ? $prefix . 'new_chat_photo' : 'new_chat_photo' );
			$this->{$prefix . 'delete_chat_photo'} = $update->delete_chat_photo ?? NULL;
			$this->{$prefix . 'group_chat_created'} = $update->group_chat_created ?? NULL;
			$this->{$prefix . 'supergroup_chat_created'} = $update->supergroup_chat_created ?? NULL;
			$this->{$prefix . 'channel_chat_created'} = $update->channel_chat_created ?? NULL;
			$this->{$prefix . 'message_auto_delete_timer_changed'} = $update->message_auto_delete_timer_changed ?? NULL;
			if ( isset( $update->message_auto_delete_timer_changed ) ) $this->MessageAutoDeleteTimerChanged( $update->message_auto_delete_timer_changed, ! empty( $prefix ) ? $prefix . 'message_auto_delete_timer_changed' : 'message_auto_delete_timer_changed' );
			$this->{$prefix . 'migrate_to_chat_id'} = $update->migrate_to_chat_id ?? NULL;
			$this->{$prefix . 'migrate_from_chat_id'} = $update->migrate_from_chat_id ?? NULL;
			$this->{$prefix . 'pinned_message'} = $update->pinned_message ?? NULL;
			if ( isset( $update->pinned_message ) ) $this->Message( $update->pinned_message, ! empty( $prefix ) ? $prefix . 'pinned_message' : 'pinned_message' );
			if ( $prefix === 'pinned_message' ) $this->pinned_message = $update;
			$this->{$prefix . 'invoice'} = $update->invoice ?? NULL;
			if ( isset( $update->invoice ) ) $this->Invoice( $update->invoice, ! empty( $prefix ) ? $prefix . 'invoice' : 'invoice' );
			$this->{$prefix . 'successful_payment'} = $update->successful_payment ?? NULL;
			if ( isset( $update->successful_payment ) ) $this->SuccessfulPayment( $update->successful_payment, ! empty( $prefix ) ? $prefix . 'successful_payment' : 'successful_payment' );
			$this->{$prefix . 'refunded_payment'} = $update->refunded_payment ?? NULL;
			if ( isset( $update->refunded_payment ) ) $this->RefundedPayment( $update->refunded_payment, ! empty( $prefix ) ? $prefix . 'refunded_payment' : 'refunded_payment' );
			$this->{$prefix . 'users_shared'} = $update->users_shared ?? NULL;
			if ( isset( $update->users_shared ) ) $this->UsersShared( $update->users_shared, ! empty( $prefix ) ? $prefix . 'users_shared' : 'users_shared' );
			$this->{$prefix . 'chat_shared'} = $update->chat_shared ?? NULL;
			if ( isset( $update->chat_shared ) ) $this->ChatShared( $update->chat_shared, ! empty( $prefix ) ? $prefix . 'chat_shared' : 'chat_shared' );
			$this->{$prefix . 'gift'} = $update->gift ?? NULL;
			if ( isset( $update->gift ) ) $this->GiftInfo( $update->gift, ! empty( $prefix ) ? $prefix . 'gift' : 'gift' );
			$this->{$prefix . 'unique_gift'} = $update->unique_gift ?? NULL;
			if ( isset( $update->unique_gift ) ) $this->UniqueGiftInfo( $update->unique_gift, ! empty( $prefix ) ? $prefix . 'unique_gift' : 'unique_gift' );
			$this->{$prefix . 'connected_website'} = $update->connected_website ?? NULL;
			$this->{$prefix . 'write_access_allowed'} = $update->write_access_allowed ?? NULL;
			if ( isset( $update->write_access_allowed ) ) $this->WriteAccessAllowed( $update->write_access_allowed, ! empty( $prefix ) ? $prefix . 'write_access_allowed' : 'write_access_allowed' );
			$this->{$prefix . 'passport_data'} = $update->passport_data ?? NULL;
			if ( isset( $update->passport_data ) ) $this->PassportData( $update->passport_data, ! empty( $prefix ) ? $prefix . 'passport_data' : 'passport_data' );
			$this->{$prefix . 'proximity_alert_triggered'} = $update->proximity_alert_triggered ?? NULL;
			if ( isset( $update->proximity_alert_triggered ) ) $this->ProximityAlertTriggered( $update->proximity_alert_triggered, ! empty( $prefix ) ? $prefix . 'proximity_alert_triggered' : 'proximity_alert_triggered' );
			$this->{$prefix . 'boost_added'} = $update->boost_added ?? NULL;
			if ( isset( $update->boost_added ) ) $this->ChatBoostAdded( $update->boost_added, ! empty( $prefix ) ? $prefix . 'boost_added' : 'boost_added' );
			$this->{$prefix . 'chat_background_set'} = $update->chat_background_set ?? NULL;
			if ( isset( $update->chat_background_set ) ) $this->ChatBackground( $update->chat_background_set, ! empty( $prefix ) ? $prefix . 'chat_background_set' : 'chat_background_set' );
			$this->{$prefix . 'forum_topic_created'} = $update->forum_topic_created ?? NULL;
			if ( isset( $update->forum_topic_created ) ) $this->ForumTopicCreated( $update->forum_topic_created, ! empty( $prefix ) ? $prefix . 'forum_topic_created' : 'forum_topic_created' );
			$this->{$prefix . 'forum_topic_edited'} = $update->forum_topic_edited ?? NULL;
			if ( isset( $update->forum_topic_edited ) ) $this->ForumTopicEdited( $update->forum_topic_edited, ! empty( $prefix ) ? $prefix . 'forum_topic_edited' : 'forum_topic_edited' );
			$this->{$prefix . 'forum_topic_closed'} = $update->forum_topic_closed ?? NULL;
			if ( isset( $update->forum_topic_closed ) ) $this->ForumTopicClosed( $update->forum_topic_closed, ! empty( $prefix ) ? $prefix . 'forum_topic_closed' : 'forum_topic_closed' );
			$this->{$prefix . 'forum_topic_reopened'} = $update->forum_topic_reopened ?? NULL;
			if ( isset( $update->forum_topic_reopened ) ) $this->ForumTopicReopened( $update->forum_topic_reopened, ! empty( $prefix ) ? $prefix . 'forum_topic_reopened' : 'forum_topic_reopened' );
			$this->{$prefix . 'general_forum_topic_hidden'} = $update->general_forum_topic_hidden ?? NULL;
			if ( isset( $update->general_forum_topic_hidden ) ) $this->GeneralForumTopicHidden( $update->general_forum_topic_hidden, ! empty( $prefix ) ? $prefix . 'general_forum_topic_hidden' : 'general_forum_topic_hidden' );
			$this->{$prefix . 'giveaway_created'} = $update->giveaway_created ?? NULL;
			if ( isset( $update->giveaway_created ) ) $this->GiveawayCreated( $update->giveaway_created, ! empty( $prefix ) ? $prefix . 'giveaway_created' : 'giveaway_created' );
			$this->{$prefix . 'giveaway'} = $update->giveaway ?? NULL;
			if ( isset( $update->giveaway ) ) $this->Giveaway( $update->giveaway, ! empty( $prefix ) ? $prefix . 'giveaway' : 'giveaway' );
			$this->{$prefix . 'giveaway_winners'} = $update->giveaway_winners ?? NULL;
			if ( isset( $update->giveaway_winners ) ) $this->GiveawayWinners( $update->giveaway_winners, ! empty( $prefix ) ? $prefix . 'giveaway_winners' : 'giveaway_winners' );
			$this->{$prefix . 'giveaway_completed'} = $update->giveaway_completed ?? NULL;
			if ( isset( $update->giveaway_completed ) ) $this->GiveawayCompleted( $update->giveaway_completed, ! empty( $prefix ) ? $prefix . 'giveaway_completed' : 'giveaway_completed' );
			$this->{$prefix . 'paid_message_price_changed'} = $update->paid_message_price_changed ?? NULL;
			if ( isset( $update->paid_message_price_changed ) ) $this->PaidMessagePriceChanged( $update->paid_message_price_changed, ! empty( $prefix ) ? $prefix . 'paid_message_price_changed' : 'paid_message_price_changed' );
			$this->{$prefix . 'video_chat_scheduled'} = $update->video_chat_scheduled ?? NULL;
			if ( isset( $update->video_chat_scheduled ) ) $this->VideoChatScheduled( $update->video_chat_scheduled, ! empty( $prefix ) ? $prefix . 'video_chat_scheduled' : 'video_chat_scheduled' );
			$this->{$prefix . 'video_chat_started'} = $update->video_chat_started ?? NULL;
			if ( isset( $update->video_chat_started ) ) $this->VideoChatStarted( $update->video_chat_started, ! empty( $prefix ) ? $prefix . 'video_chat_started' : 'video_chat_started' );
			$this->{$prefix . 'video_chat_ended'} = $update->video_chat_ended ?? NULL;
			if ( isset( $update->video_chat_ended ) ) $this->VideoChatEnded( $update->video_chat_ended, ! empty( $prefix ) ? $prefix . 'video_chat_ended' : 'video_chat_ended' );
			$this->{$prefix . 'video_chat_participants_invited'} = $update->video_chat_participants_invited ?? NULL;
			if ( isset( $update->video_chat_participants_invited ) ) $this->VideoChatParticipantsInvited( $update->video_chat_participants_invited, ! empty( $prefix ) ? $prefix . 'video_chat_participants_invited' : 'video_chat_participants_invited' );
			$this->{$prefix . 'web_app_data'} = $update->web_app_data ?? NULL;
			if ( isset( $update->web_app_data ) ) $this->WebAppData( $update->web_app_data, ! empty( $prefix ) ? $prefix . 'web_app_data' : 'web_app_data' );
			$this->{$prefix . 'reply_markup'} = $update->reply_markup ?? NULL;
			if ( isset( $update->reply_markup ) ) $this->InlineKeyboardMarkup( $update->reply_markup, ! empty( $prefix ) ? $prefix . 'reply_markup' : 'reply_markup' );
		}

		public function MessageId () {}
		public function InaccessibleMessage () {}
		public function MaybeInaccessibleMessage () {}

		public function MessageEntity ( array $update, string $prefix ) {
			foreach( $update as $entity ) {
				$this->{$prefix . '_type'}            = $entity->type ?? NULL;
				$this->{$prefix . '_offset'}          = $entity->offset ?? NULL;
				$this->{$prefix . '_length'}          = $entity->length ?? NULL;
				$this->{$prefix . '_url'}             = $entity->url ?? NULL;
				$this->{$prefix . '_user'}            = $entity->user ?? NULL;
				if ( isset( $entity->user ) ) $this->User( $entity->user, $prefix . '_user' );
				$this->{$prefix . '_language'}        = $entity->language ?? NULL;
				$this->{$prefix . '_custom_emoji_id'} = $entity->custom_emoji_id ?? NULL;
			}
		}

		public function TextQuote ( object $update, string $prefix ) {
			$this->{$prefix . '_text'} = $update->text ?? NULL;
			$this->{$prefix . '_entities'} = $update->entities ?? NULL;
			if ( isset( $update->entities ) ) $this->MessageOrigin( $update->entities, $prefix . '_entities' );
			$this->{$prefix . '_position'} = $update->position ?? NULL;
			$this->{$prefix . '_is_manual'} = $update->is_manual ?? NULL;
		}

		public function ExternalReplyInfo ( object $update, string $prefix ) {
			$this->{$prefix . '_origin'}               = $update->origin ?? NULL;
			if ( isset( $update->origin ) ) $this->MessageOrigin( $update->origin, $prefix . '_origin' );
			$this->{$prefix . '_chat'}                 = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix . '_chat' );
			$this->{$prefix . '_message_id'}           = $update->message_id ?? NULL;
			$this->{$prefix . '_link_preview_options'} = $update->link_preview_options ?? NULL;
			if ( isset( $update->link_preview_options ) ) $this->LinkPreviewOptions( $update->link_preview_options, $prefix . '_link_preview_options' );
			$this->{$prefix . '_animation'}            = $update->animation ?? NULL;
			if ( isset( $update->animation ) ) $this->Animation( $update->animation, $prefix . '_animation' );
			$this->{$prefix . '_audio'}                = $update->audio ?? NULL;
			if ( isset( $update->audio ) ) $this->Audio( $update->audio, $prefix . '_audio' );
			$this->{$prefix . '_document'}             = $update->document ?? NULL;
			if ( isset( $update->document ) ) $this->Document( $update->document, $prefix . '_document' );
			$this->{$prefix . '_paid_media'}           = $update->paid_media ?? NULL;
			if ( isset( $update->paid_media ) ) $this->PaidMediaInfo( $update->paid_media, $prefix . '_paid_media' );
			$this->{$prefix . '_photo'}                = $update->photo ?? NULL;
			if ( isset( $update->photo ) ) $this->PhotoSize( $update->photo, $prefix . '_photo' );
			$this->{$prefix . '_sticker'}              = $update->sticker ?? NULL;
			if ( isset( $update->sticker ) ) $this->Sticker( $update->sticker, $prefix . '_sticker' );
			$this->{$prefix . '_story'}                = $update->story ?? NULL;
			if ( isset( $update->story ) ) $this->Story( $update->story, $prefix . '_story' );
			$this->{$prefix . '_video'}                = $update->video ?? NULL;
			if ( isset( $update->video ) ) $this->Video( $update->video, $prefix . '_video' );
			$this->{$prefix . '_video_note'}           = $update->video_note ?? NULL;
			if ( isset( $update->video_note ) ) $this->VideoNote( $update->video_note, $prefix . '_video_note' );
			$this->{$prefix . '_voice'}                = $update->voice ?? NULL;
			if ( isset( $update->voice ) ) $this->Voice( $update->voice, $prefix . '_voice' );
			$this->{$prefix . '_has_media_spoiler'}    = $update->has_media_spoiler ?? NULL;
			$this->{$prefix . '_contact'}              = $update->contact ?? NULL;
			if ( isset( $update->contact ) ) $this->Contact( $update->contact, $prefix . '_contact' );
			$this->{$prefix . '_dice'}                 = $update->dice ?? NULL;
			if ( isset( $update->dice ) ) $this->Dice( $update->dice, $prefix . '_dice' );
			$this->{$prefix . '_game'}                 = $update->game ?? NULL;
			if ( isset( $update->game ) ) $this->Game( $update->game, $prefix . '_game' );
			$this->{$prefix . '_giveaway'}             = $update->giveaway ?? NULL;
			if ( isset( $update->giveaway ) ) $this->Giveaway( $update->giveaway, $prefix . '_giveaway' );
			$this->{$prefix . '_giveaway_winners'}     = $update->giveaway_winners ?? NULL;
			if ( isset( $update->giveaway_winners ) ) $this->GiveawayWinners( $update->giveaway_winners, $prefix . '_giveaway_winners' );
			$this->{$prefix . '_invoice'}              = $update->invoice ?? NULL;
			if ( isset( $update->invoice ) ) $this->Invoice( $update->invoice, $prefix . '_invoice' );
			$this->{$prefix . '_location'}             = $update->location ?? NULL;
			if ( isset( $update->location ) ) $this->Location( $update->location, $prefix . '_location' );
			$this->{$prefix . '_poll'}                 = $update->poll ?? NULL;
			if ( isset( $update->poll ) ) $this->Poll( $update->poll, $prefix . '_poll_' );
			$this->{$prefix . '_venue'}                = $update->venue ?? NULL;
			if ( isset( $update->venue ) ) $this->Venue( $update->venue, $prefix . '_venue' );
		}

		public function ReplyParameters () {}

		public function MessageOrigin ( object|array $update, string $prefix ) {
			if ( is_array( $update ) ) $update = (object) $update;
			$this->{$prefix . '_type'}              = $update->type ?? NULL;
			$this->{$prefix . '_date'}              = $update->date ?? NULL;
			$this->{$prefix . '_sender_user'}       = $update->sender_user ?? NULL;
			if ( isset( $update->sender_user ) ) $this->User( $update->sender_user, $prefix . '_sender_user' );
			$this->{$prefix . '_sender_user_name'}  = $update->sender_user_name ?? NULL;
			$this->{$prefix . '_sender_chat'}       = $update->sender_chat ?? NULL;
			if ( isset( $update->sender_chat ) ) $this->Chat( $update->sender_chat, $prefix . '_sender_chat' );
			$this->{$prefix . '_author_signature'}  = $update->author_signature ?? NULL;
			$this->{$prefix . '_chat'}              = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix . '_chat' );
			$this->{$prefix . '_sender_message_id'} = $update->sender_message_id ?? NULL;
		}

		public function PhotoSize ( array|object $update, string $prefix ) {
			if ( is_array( $update ) ) $update = end( $update );
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_width'}          = $update->width ?? NULL;
			$this->{$prefix . '_height'}         = $update->height ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
		}

		public function Animation ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_width'}          = $update->width ?? NULL;
			$this->{$prefix . '_height'}         = $update->height ?? NULL;
			$this->{$prefix . '_duration'}       = $update->duration ?? NULL;
			$this->{$prefix . '_thumb'}          = $update->thumbnail ?? NULL;
			if ( isset( $update->thumbnail ) ) $this->PhotoSize( $update->thumbnail, $prefix . '_thumbnail' );
			$this->{$prefix . '_file_name'}      = $update->file_name ?? NULL;
			$this->{$prefix . '_mime_type'}      = $update->mime_type ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
		}

		public function Audio ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_duration'}       = $update->duration ?? NULL;
			$this->{$prefix . '_performer'}      = $update->performer ?? NULL;
			$this->{$prefix . '_title'}          = $update->title ?? NULL;
			$this->{$prefix . '_file_name'}      = $update->file_name ?? NULL;
			$this->{$prefix . '_mime_type'}      = $update->mime_type ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
			$this->{$prefix . '_thumbnail'}      = $update->thumbnail ?? NULL;
			if ( isset( $update->thumbnail ) ) $this->PhotoSize( $update->thumbnail, $prefix . '_thumbnail' );
		}

		public function Document ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_thumbnail'}      = $update->thumbnail ?? NULL;
			if ( isset( $update->thumbnail ) ) $this->PhotoSize( $update->thumbnail, $prefix . '_thumbnail' );
			$this->{$prefix . '_file_name'}      = $update->file_name ?? NULL;
			$this->{$prefix . '_mime_type'}      = $update->mime_type ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
		}

		public function Story ( object $update, string $prefix ) {
			$this->{$prefix . '_chat'} = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix . '_chat' );
			$this->{$prefix . '_id'}   = $update->id ?? NULL;
		}

		public function Video ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}         = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'}  = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_width'}           = $update->width ?? NULL;
			$this->{$prefix . '_height'}          = $update->height ?? NULL;
			$this->{$prefix . '_duration'}        = $update->duration ?? NULL;
			$this->{$prefix . '_thumbnail'}       = $update->thumbnail ?? NULL;
			if ( isset( $update->thumbnail ) ) $this->PhotoSize( $update->thumbnail, $prefix . '_thumbnail' );
			$this->{$prefix . '_cover'}           = $update->cover ?? NULL;
			if ( isset( $update->cover ) ) $this->PhotoSize( $update->cover, $prefix . '_cover' );
			$this->{$prefix . '_start_timestamp'} = $update->start_timestamp ?? NULL;
			$this->{$prefix . '_file_name'}       = $update->file_name ?? NULL;
			$this->{$prefix . '_mime_type'}       = $update->mime_type ?? NULL;
			$this->{$prefix . '_file_size'}       = $update->file_size ?? NULL;
		}

		public function VideoNote ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_length'}         = $update->length ?? NULL;
			$this->{$prefix . '_duration'}       = $update->duration ?? NULL;
			$this->{$prefix . '_thumbnail'}      = $update->thumbnail ?? NULL;
			if ( isset( $update->thumbnail ) ) $this->PhotoSize( $update->thumbnail, $prefix . '_thumbnail' );
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
		}

		public function Voice ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_duration'}       = $update->duration ?? NULL;
			$this->{$prefix . '_mime_type'}      = $update->mime_type ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
		}

		public function PaidMediaInfo ( object $update, string $prefix ) {
			$this->{$prefix . '_star_count'} = $update->star_count ?? NULL;
			$this->{$prefix . '_paid_media'} = $update->paid_media ?? NULL;
			if ( isset( $update->paid_media ) ) $this->PaidMedia( $update->paid_media, $prefix . '_paid_media' );
		}

		public function PaidMedia ( object $update, string $prefix ) {
			$this->{$prefix . '_type'}     = $update->type ?? NULL;
			$this->{$prefix . '_width'}    = $update->width ?? NULL;
			$this->{$prefix . '_height'}   = $update->height ?? NULL;
			$this->{$prefix . '_duration'} = $update->duration ?? NULL;
			$this->{$prefix . '_photo'}    = $update->photo ?? NULL;
			if ( isset( $update->photo ) ) $this->PhotoSize( $update->photo, $prefix . '_photo' );
			$this->{$prefix . '_video'}    = $update->video ?? NULL;
			if ( isset( $update->video ) ) $this->Video( $update->video, $prefix . '_video' );
		}

		public function Contact ( object $update, string $prefix ) {
			$this->{$prefix . '_phone_number'} = $update->phone_number ?? NULL;
			$this->{$prefix . '_first_name'}   = $update->first_name ?? NULL;
			$this->{$prefix . '_last_name'}    = $update->last_name ?? NULL;
			$this->{$prefix . '_user_id'}      = $update->user_id ?? NULL;
			$this->{$prefix . '_vcard'}        = $update->vcard ?? NULL;
		}

		public function Dice ( object $update, string $prefix ) {
			$this->{$prefix . '_emoji'} = $update->emoji ?? NULL;
			$this->{$prefix . '_value'} = $update->value ?? NULL;
		}

		public function PollOption ( object|array $update, string $prefix ) {
			if ( is_array( $update ) ) $update = (object) $update;
			$this->{$prefix . '_text'}          = $update->text ?? NULL;
			$this->{$prefix . '_text_entities'} = $update->text_entities ?? NULL;
			if ( isset( $update->text_entities ) ) $this->MessageEntity( $update->text_entities, $prefix . '_text_entities' );
			$this->{$prefix . '_voter_count'}   = $update->voter_count ?? NULL;
		}

		public function InputPollOption () {}

		public function PollAnswer ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'poll_id'}      = $update->poll_id ?? NULL;
			$this->{$prefix . 'voter_chat'}   = $update->voter_chat ?? NULL;
			if ( isset( $update->voter_chat ) ) $this->Chat( $update->voter_chat, $prefix ? $prefix . '_voter_chat' : 'voter_chat' );
			$this->{$prefix . 'user'}         = $update->user ?? NULL;
			if ( isset( $update->user ) ) $this->User( $update->user, $prefix ? $prefix . '_user' : 'user' );
			$this->{$prefix . 'poll_options'} = $update->option_ids ?? NULL;
		}

		public function Poll ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'id'}                      = $update->id ?? NULL;
			$this->{$prefix . 'question'}                = $update->question ?? NULL;
			$this->{$prefix . 'question_entities'}       = $update->question_entities ?? NULL;
			if ( isset( $update->question_entities ) ) $this->MessageEntity( $update->question_entities, $prefix . 'question_entities' );
			$this->{$prefix . 'options'}                 = $update->options ?? NULL;
			if ( isset( $update->options ) ) $this->PollOption( $update->options, $prefix . 'options' );
			$this->{$prefix . 'total_voter_count'}       = $update->total_voter_count ?? NULL;
			$this->{$prefix . 'is_closed'}               = $update->is_closed ?? NULL;
			$this->{$prefix . 'is_anonymous'}            = $update->is_anonymous ?? NULL;
			$this->{$prefix . 'type'}                    = $update->type ?? NULL;
			$this->{$prefix . 'allows_multiple_answers'} = $update->allows_multiple_answers ?? NULL;
			$this->{$prefix . 'correct_option_id'}       = $update->correct_option_id ?? NULL;
			$this->{$prefix . 'explanation'}             = $update->explanation ?? NULL;
			$this->{$prefix . 'explanation_entities'}    = $update->explanation_entities ?? NULL;
			if ( isset( $update->explanation_entities ) ) $this->MessageEntity( $update->explanation_entities, $prefix . 'explanation_entities' );
			$this->{$prefix . 'open_period'}             = $update->open_period ?? NULL;
			$this->{$prefix . 'close_date'}              = $update->close_date ?? NULL;
		}

		public function Location ( object $update, string $prefix ) {
			$this->{$prefix . '_latitude'} = $update->latitude ?? NULL;
			$this->{$prefix . '_longitude'} = $update->longitude ?? NULL;
			$this->{$prefix . '_horizontal_accuracy'} = $update->horizontal_accuracy ?? NULL;
			$this->{$prefix . '_live_period'} = $update->live_period ?? NULL;
			$this->{$prefix . '_heading'} = $update->heading ?? NULL;
			$this->{$prefix . '_proximity_alert_radius'} = $update->proximity_alert_radius ?? NULL;
		}

		public function Venue ( object $update, string $prefix ) {
			$this->{$prefix . '_location'}          = $update->location ?? NULL;
			if ( isset( $update->location ) ) $this->Location( $update->location, $prefix . '_location' );
			$this->{$prefix . '_title'}             = $update->title ?? NULL;
			$this->{$prefix . '_address'}           = $update->address ?? NULL;
			$this->{$prefix . '_foursquare_id'}     = $update->foursquare_id ?? NULL;
			$this->{$prefix . '_foursquare_type'}   = $update->foursquare_type ?? NULL;
			$this->{$prefix . '_google_place_id'}   = $update->google_place_id ?? NULL;
			$this->{$prefix . '_google_place_type'} = $update->google_place_type ?? NULL;
		}

		public function WebAppData ( object $update, string $prefix ) {
			$this->{$prefix . '_data'} = $update->data ?? NULL;
			$this->{$prefix . '_text'} = $update->button_text ?? NULL;
		}

		public function ProximityAlertTriggered ( object $update, string $prefix ) {
			$this->{$prefix . '_traveler'} = $update->traveler ?? NULL;
			if ( isset( $update->traveler ) ) $this->User( $update->traveler, $prefix . '_traveler' );
			$this->{$prefix . '_watcher'}  = $update->watcher ?? NULL;
			if ( isset( $update->watcher ) ) $this->User( $update->watcher, $prefix . '_watcher' );
			$this->{$prefix . '_distance'} = $update->distance ?? NULL;
		}

		public function MessageAutoDeleteTimerChanged ( object $update, string $prefix ) {
			$this->{$prefix . '_message_auto_delete_time'} = $update->message_auto_delete_time ?? NULL;
		}

		public function ChatBoostAdded ( object $update, string $prefix ) {
			$this->{$prefix . '_boost_count'} = $update->boost_count ?? NULL;
		}

		public function BackgroundFill ( object $update, string $prefix ) {
			$this->{$prefix . '_type'} = $update->type ?? NULL;
			$this->{$prefix . '_color'} = $update->color ?? NULL;
			$this->{$prefix . '_top_color'} = $update->top_color ?? NULL;
			$this->{$prefix . '_bottom_color'} = $update->bottom_color ?? NULL;
			$this->{$prefix . '_rotation_angle'} = $update->rotation_angle ?? NULL;
			$this->{$prefix . '_colors'} = $update->colors ?? NULL;
		}

		public function BackgroundType ( object $update, string $prefix ) {
			$this->{$prefix . '_type'} = $update->type ?? NULL;
			$this->{$prefix . '_fill'} = $update->fill ?? NULL;
			if ( isset( $update->fill ) ) $this->BackgroundFill( $update->fill, $prefix . '_fill' );
			$this->{$prefix . '_dark_theme_dimming'} = $update->dark_theme_dimming ?? NULL;
			$this->{$prefix . '_document'} = $update->document ?? NULL;
			if ( isset( $update->document ) ) $this->Document( $update->document, $prefix . '_document' );
			$this->{$prefix . '_is_blurred'} = $update->is_blurred ?? NULL;
			$this->{$prefix . '_is_moving'} = $update->is_moving ?? NULL;
			$this->{$prefix . '_intensity'} = $update->intensity ?? NULL;
			$this->{$prefix . '_is_inverted'} = $update->is_inverted ?? NULL;
			$this->{$prefix . '_theme_name'} = $update->theme_name ?? NULL;
		}

		public function ChatBackground ( object $update, string $prefix ) {
			$this->{$prefix . '_type'} = $update->type ?? NULL;
			if ( isset( $update->type ) ) $this->BackgroundType( $update->type, $prefix . '_type' );
		}

		public function ForumTopicCreated ( object $update, string $prefix ) {
			$this->{$prefix . '_name'}                 = $update->name ?? NULL;
			$this->{$prefix . '_icon_color'}           = $update->icon_color ?? NULL;
			$this->{$prefix . '_icon_custom_emoji_id'} = $update->icon_custom_emoji_id ?? NULL;
		}

		public function ForumTopicClosed () {}

		public function ForumTopicEdited ( object $update, string $prefix ) {
			$this->{$prefix . '_name'}                 = $update->name ?? NULL;
			$this->{$prefix . '_icon_custom_emoji_id'} = $update->icon_custom_emoji_id ?? NULL;
		}

		public function ForumTopicReopened () {}

		public function GeneralForumTopicHidden () {}

		public function GeneralForumTopicUnhidden () {}

		public function SharedUser ( object $update, string $prefix ) {
			$this->{$prefix . '_user_id'}    = $update->user_id ?? NULL;
			$this->{$prefix . '_first_name'} = $update->first_name ?? NULL;
			$this->{$prefix . '_last_name'}  = $update->last_name ?? NULL;
			$this->{$prefix . '_username'}   = $update->username ?? NULL;
			$this->{$prefix . '_photo'}      = $update->photo ?? NULL;
			if ( isset( $update->photo ) ) $this->PhotoSize( $update->photo, $prefix . '_photo' );
		}

		public function UsersShared ( object $update, string $prefix ) {
			$this->{$prefix . '_request_id'} = $update->request_id ?? NULL;
			$this->{$prefix . '_users'}      = $update->users ?? NULL;
			if ( isset( $update->users ) ) $this->SharedUser( $update->users, $prefix . '_users' );
		}

		public function ChatShared ( object $update, string $prefix ) {
			$this->{$prefix . '_request_id'} = $update->request_id ?? NULL;
			$this->{$prefix . '_chat_id'}    = $update->chat_id ?? NULL;
			$this->{$prefix . '_title'}      = $update->title ?? NULL;
			$this->{$prefix . '_username'}   = $update->username ?? NULL;
			$this->{$prefix . '_photo'}      = $update->photo ?? NULL;
			if ( isset( $update->photo ) ) $this->PhotoSize( $update->photo, $prefix . '_photo' );
		}

		public function WriteAccessAllowed ( object $update, string $prefix ) {
			$this->{$prefix . '_from_request'}         = $update->from_request ?? NULL;
			$this->{$prefix . '_web_app_name'}         = $update->web_app_name ?? NULL;
			$this->{$prefix . '_from_attachment_menu'} = $update->from_attachment_menu ?? NULL;
		}

		public function VideoChatScheduled ( object $update, string $prefix ) {
			$this->{$prefix . '_start_date'} = $update->start_date ?? NULL;
		}

		public function VideoChatStarted () {}

		public function VideoChatEnded ( object $update, string $prefix ) {
			$this->{$prefix . '_duration'} = $update->duration ?? NULL;
		}

		public function VideoChatParticipantsInvited ( object $update, string $prefix ) {
			$this->{$prefix . '_users'} = $update->users ?? NULL;
			if ( isset( $update->users ) ) $this->User( $update->users, $prefix . '_users' );
		}

		public function PaidMessagePriceChanged ( object $update, string $prefix ) {
			$this->{$prefix . '_paid_message_star_count'} = $update->paid_message_star_count ?? NULL;
		}

		public function GiveawayCreated ( object $update, string $prefix ) {
			$this->{$prefix . '_prize_star_count'} = $update->prize_star_count ?? NULL;
		}

		public function Giveaway ( object $update, string $prefix ) {
			$this->{$prefix . '_chats'}                            = $update->chats ?? NULL;
			if ( isset( $update->chats ) ) $this->Chat( $update->chats, $prefix . '_chats' );
			$this->{$prefix . '_winners_selection_date'}           = $update->winners_selection_date ?? NULL;
			$this->{$prefix . '_winner_count'}                     = $update->winner_count ?? NULL;
			$this->{$prefix . '_only_new_members'}                 = $update->only_new_members ?? NULL;
			$this->{$prefix . '_has_public_winners'}               = $update->has_public_winners ?? NULL;
			$this->{$prefix . '_prize_description'}                = $update->prize_description ?? NULL;
			$this->{$prefix . '_country_codes'}                    = $update->country_codes ?? NULL;
			$this->{$prefix . '_prize_star_count'}                 = $update->prize_star_count ?? NULL;
			$this->{$prefix . '_premium_subscription_month_count'} = $update->premium_subscription_month_count ?? NULL;
		}

		public function GiveawayWinners ( object $update, string $prefix ) {
			$this->{$prefix . '_chats'}                            = $update->chats ?? NULL;
			if ( isset( $update->chats ) ) $this->Chat( $update->chats, $prefix . '_chats' );
			$this->{$prefix . '_giveaway_message_id'}              = $update->giveaway_message_id ?? NULL;
			$this->{$prefix . '_winners_selection_date'}           = $update->winners_selection_date ?? NULL;
			$this->{$prefix . '_winner_count'}                     = $update->winner_count ?? NULL;
			$this->{$prefix . '_winners'}                          = $update->winners ?? NULL;
			if ( isset( $update->winners ) ) $this->User( $update->winners, $prefix . '_winners' );
			$this->{$prefix . '_additional_chat_count'}            = $update->additional_chat_count ?? NULL;
			$this->{$prefix . '_prize_star_count'}                 = $update->prize_star_count ?? NULL;
			$this->{$prefix . '_premium_subscription_month_count'} = $update->premium_subscription_month_count ?? NULL;
			$this->{$prefix . '_unclaimed_prize_count'}            = $update->unclaimed_prize_count ?? NULL;
			$this->{$prefix . '_only_new_members'}                 = $update->only_new_members ?? NULL;
			$this->{$prefix . '_was_refunded'}                     = $update->was_refunded ?? NULL;
			$this->{$prefix . '_prize_description'}                = $update->prize_description ?? NULL;
		}

		public function GiveawayCompleted ( object $update, string $prefix ) {
			$this->{$prefix . '_winner_count'}          = $update->winner_count ?? NULL;
			$this->{$prefix . '_unclaimed_prize_count'} = $update->unclaimed_prize_count ?? NULL;
			$this->{$prefix . '_giveaway_message'}      = $update->giveaway_message ?? NULL;
			if ( isset( $update->giveaway_message ) ) $this->Message( $update->giveaway_message, $prefix . '_giveaway_message' );
			$this->{$prefix . '_is_star_giveaway'}      = $update->is_star_giveaway ?? NULL;
		}

		public function LinkPreviewOptions ( object $update, string $prefix ) {
			$this->{$prefix . '_is_disabled'}        = $update->is_disabled ?? NULL;
			$this->{$prefix . '_url'}                = $update->url ?? NULL;
			$this->{$prefix . '_prefer_small_media'} = $update->prefer_small_media ?? NULL;
			$this->{$prefix . '_prefer_large_media'} = $update->prefer_large_media ?? NULL;
			$this->{$prefix . '_show_above_text'}    = $update->show_above_text ?? NULL;
		}

		public function UserProfilePhotos () {}

		public function File ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
			$this->{$prefix . '_file_path'}      = $update->file_path ?? NULL;
		}

		public function WebAppInfo ( object $update, string $prefix ) {
			$this->{$prefix . '_url'} = $update->url ?? NULL;
		}

		public function ReplyKeyboardMarkup () {}

		public function KeyboardButton () {}

		public function KeyboardButtonRequestUsers () {}
		public function KeyboardButtonRequestChat () {}

		public function KeyboardButtonPollType () {}

		public function ReplyKeyboardRemove () {}

		public function InlineKeyboardMarkup ( array|object $update, string $prefix ) {
			$this->{$prefix . '_inline_keyboard'} = $update->inline_keyboard ?? NULL;
			//if ( isset( $update->inline_keyboard[0][0] ) ) $this->InlineKeyboardButton( $update->inline_keyboard[0], $prefix . '_inline_keyboard' );
		}
		
		public function InlineKeyboardButton ( object $update, string $prefix ) {
			$this->{$prefix . '_text'}                             = $update->text ?? NULL;
			$this->{$prefix . '_url'}                              = $update->url ?? NULL;
			$this->{$prefix . '_callback_data'}                    = $update->callback_data ?? NULL;
			$this->{$prefix . '_web_app'}                          = $update->web_app ?? NULL;
			if ( isset( $update->web_app ) ) $this->WebAppInfo( $update->web_app, $prefix . '_web_app' );
			$this->{$prefix . '_login_url'}                        = $update->login_url ?? NULL;
			if ( isset( $update->login_url ) ) $this->LoginUrl( $update->login_url, $prefix . '_login_url' );
			$this->{$prefix . '_switch_inline_query'}              = $update->switch_inline_query ?? NULL;
			$this->{$prefix . '_switch_inline_query_current_chat'} = $update->switch_inline_query_current_chat ?? NULL;
			$this->{$prefix . '_switch_inline_query_chosen_chat'}  = $update->switch_inline_query_chosen_chat ?? NULL;
			if ( isset( $update->switch_inline_query_chosen_chat ) ) $this->SwitchInlineQueryChosenChat( $update->switch_inline_query_chosen_chat, $prefix . '_switch_inline_query_chosen_chat' );
			$this->{$prefix . '_copy_text'}                        = $update->copy_text ?? NULL;
			if ( isset( $update->copy_text ) ) $this->CopyTextButton( $update->copy_text, $prefix . '_copy_text' );
			$this->{$prefix . '_callback_game'}                    = $update->callback_game ?? NULL;
			if ( isset( $update->callback_game ) ) $this->CallbackGame( $update->callback_game, $prefix . '_callback_game' );
			$this->{$prefix . '_pay'}                              = $update->pay ?? NULL;
		}

		public function LoginUrl ( object $update, string $prefix ) {
			$this->{$prefix . '_url'}                  = $update->url ?? NULL;
			$this->{$prefix . '_forward_text'}         = $update->forward_text ?? NULL;
			$this->{$prefix . '_bot_username'}         = $update->bot_username ?? NULL;
			$this->{$prefix . '_request_write_access'} = $update->request_write_access ?? NULL;
		}

		public function SwitchInlineQueryChosenChat ( object $update, string $prefix ) {
			$this->{$prefix . '_query'}               = $update->query ?? NULL;
			$this->{$prefix . '_allow_user_chats'}    = $update->allow_user_chats ?? NULL;
			$this->{$prefix . '_allow_bot_chats'}     = $update->allow_bot_chats ?? NULL;
			$this->{$prefix . '_allow_group_chats'}   = $update->allow_group_chats ?? NULL;
			$this->{$prefix . '_allow_channel_chats'} = $update->allow_channel_chats ?? NULL;
		}

		public function CopyTextButton ( object $update, string $prefix ) {
			$this->{$prefix . '_text'} = $update->text ?? NULL;
		}
		
		public function CallbackQuery ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'id'} = $update->id ?? NULL;
			$this->{$prefix . 'from'} = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix ? $prefix . '_from' : 'from' );
			$this->{$prefix . 'message'} = $update->message ?? NULL;
			if ( isset( $update->message ) ) $this->Message( $update->message, $prefix ? $prefix . '_message_' : 'message_' );
			$this->{$prefix . 'inline_message_id'} = $update->inline_message_id ?? NULL;
			$this->{$prefix . 'chat_instance'} = $update->chat_instance ?? NULL;
			$this->{$prefix . 'data'} = $update->data ?? NULL;
			$this->{$prefix . 'game_short_name'} = $update->game_short_name ?? NULL;
		}

		public function ForceReply () {}

		public function ChatPhoto () {}

		public function ChatInviteLink ( object $update, string $prefix ) {
			$this->{$prefix . '_invite_link'} = $update->invite_link ?? NULL;
			$this->{$prefix . '_creator'} = $update->creator ?? NULL;
			if ( isset( $update->creator ) ) $this->User( $update->creator, $prefix . '_creator' );
			$this->{$prefix . '_creates_join_request'} = $update->creates_join_request ?? NULL;
			$this->{$prefix . '_is_primary'} = $update->is_primary ?? NULL;
			$this->{$prefix . '_is_revoked'} = $update->is_revoked ?? NULL;
			$this->{$prefix . '_name'} = $update->name ?? NULL;
			$this->{$prefix . '_expire_date'} = $update->expire_date ?? NULL;
			$this->{$prefix . '_member_limit'} = $update->member_limit ?? NULL;
			$this->{$prefix . '_pending_join_request_count'} = $update->pending_join_request_count ?? NULL;
			$this->{$prefix . '_subscription_period'} = $update->subscription_period ?? NULL;
			$this->{$prefix . '_subscription_price'} = $update->subscription_price ?? NULL;
		}

		public function ChatAdministratorRights () {}

		public function ChatMemberUpdated ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'chat'} = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix ? $prefix . '_chat' : 'chat' );
			$this->{$prefix . 'from'} = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix ? $prefix . '_from' : 'from' );
			$this->{$prefix . 'date'} = $update->date ?? NULL;
			$this->{$prefix . 'old_chat_member'} = $update->old_chat_member ?? NULL;
			if ( isset( $update->old_chat_member ) ) $this->ChatMember( $update->old_chat_member, $prefix ? $prefix . '_old_chat_member' : 'old_chat_member' );
			$this->{$prefix . 'new_chat_member'} = $update->new_chat_member ?? NULL;
			if ( isset( $update->new_chat_member ) ) $this->ChatMember( $update->new_chat_member, $prefix ? $prefix . '_new_chat_member' : 'new_chat_member' );
			$this->{$prefix . 'invite_link'} = $update->invite_link ?? NULL;
			if ( isset( $update->invite_link ) ) $this->ChatInviteLink( $update->invite_link, $prefix ? $prefix . '_invite_link' : 'invite_link' );
			$this->{$prefix . 'via_join_request'} = $update->via_join_request ?? NULL;
			$this->{$prefix . 'via_chat_folder_invite_link'} = $update->via_chat_folder_invite_link ?? NULL;
		}

		public function ChatMember ( object $update, string $prefix ) {
			$this->{$prefix . '_status'} = $update->status ?? NULL;
			$this->{$prefix . '_user'} = $update->user ?? NULL;
			if ( isset( $update->user ) ) $this->User( $update->user, $prefix . '_user' );
			$this->{$prefix . '_is_anonymous'} = $update->is_anonymous ?? NULL;
			$this->{$prefix . '_custom_title'} = $update->custom_title ?? NULL;
			$this->{$prefix . '_can_be_edited'} = $update->can_be_edited ?? NULL;
			$this->{$prefix . '_can_delete_messages'} = $update->can_delete_messages ?? NULL;
			$this->{$prefix . '_can_manage_video_chats'} = $update->can_manage_video_chats ?? NULL;
			$this->{$prefix . '_can_restrict_members'} = $update->can_restrict_members ?? NULL;
			$this->{$prefix . '_can_promote_members'} = $update->can_promote_members ?? NULL;
			$this->{$prefix . '_can_change_info'} = $update->can_change_info ?? NULL;
			$this->{$prefix . '_can_invite_users'} = $update->can_invite_users ?? NULL;
			$this->{$prefix . '_can_post_stories'} = $update->can_post_stories ?? NULL;
			$this->{$prefix . '_can_delete_stories'} = $update->can_delete_stories ?? NULL;
			$this->{$prefix . '_can_post_messages'} = $update->can_post_messages ?? NULL;
			$this->{$prefix . '_can_edit_messages'} = $update->can_edit_messages ?? NULL;
			$this->{$prefix . '_can_pin_messages'} = $update->can_pin_messages ?? NULL;
			$this->{$prefix . '_can_manage_topics'} = $update->can_manage_topics ?? NULL;
			$this->{$prefix . '_custom_title'} = $update->custom_title ?? NULL;
			$this->{$prefix . '_until_date'} = $update->until_date ?? NULL;
			$this->{$prefix . '_is_member'} = $update->is_member ?? NULL;
			$this->{$prefix . '_can_send_messages'} = $update->can_send_messages ?? NULL;
			$this->{$prefix . '_can_send_audios'} = $update->can_send_audios ?? NULL;
			$this->{$prefix . '_can_send_documents'} = $update->can_send_documents ?? NULL;
			$this->{$prefix . '_can_send_photos'} = $update->can_send_photos ?? NULL;
			$this->{$prefix . '_can_send_videos'} = $update->can_send_videos ?? NULL;
			$this->{$prefix . '_can_send_video_notes'} = $update->can_send_video_notes ?? NULL;
			$this->{$prefix . '_can_send_voice_notes'} = $update->can_send_voice_notes ?? NULL;
			$this->{$prefix . '_can_send_polls'} = $update->can_send_polls ?? NULL;
			$this->{$prefix . '_can_send_other_messages'} = $update->can_send_other_messages ?? NULL;
			$this->{$prefix . '_can_add_web_page_previews'} = $update->can_add_web_page_previews ?? NULL;
		}

		public function ChatJoinRequest ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'chat'} = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix ? $prefix . '_chat' : 'chat' );
			$this->{$prefix . 'from'} = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix ? $prefix . '_from' : 'from' );
			$this->{$prefix . 'user_chat_id'} = $update->user_chat_id ?? NULL;
			$this->{$prefix . 'date'} = $update->date ?? NULL;
			$this->{$prefix . 'bio'} = $update->bio ?? NULL;
			$this->{$prefix . 'invite_link'} = $update->invite_link ?? NULL;
			if ( isset( $update->invite_link ) ) $this->ChatInviteLink( $update->invite_link, $prefix ? $prefix . '_invite_link' : 'invite_link' );
		}

		public function ChatPermissions () {}
		public function Birthdate () {}
		public function BusinessIntro () {}
		public function BusinessLocation () {}
		public function BusinessOpeningHoursInterval () {}
		public function BusinessOpeningHours () {}
		public function StoryAreaPosition () {}
		public function LocationAddress () {}
		public function StoryAreaType () {}
		public function StoryArea () {}
		public function ChatLocation () {}

		public function ReactionType ( array $update, string $prefix ) {
			foreach ( $update as $reaction )
				$this->{$prefix . '_reactions'}[] = [
					$prefix . '_type'            => $reaction->type ?? NULL,
					$prefix . '_emoji'           => $reaction->emoji ?? NULL,
					$prefix . '_custom_emoji_id' => $reaction->custom_emoji_id ?? NULL,
				];
		}

		public function ReactionCount ( object|array $update, string $prefix = '' ) {
			if ( is_array( $update ) ) $update = (object) $update;
			$this->{$prefix . '_type'}        = $update->type ?? NULL;
			if ( isset( $update->type ) ) $this->ReactionType( $update->type, $prefix . '_type' );
			$this->{$prefix . '_total_count'} = $update->total_count ?? NULL;
		}

		public function MessageReactionUpdated ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'chat'}         = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix ? $prefix . '_chat' : 'chat' );
			$this->{$prefix . 'message_id'}   = $update->message_id ?? NULL;
			$this->{$prefix . 'user'}         = $update->user ?? NULL;
			if ( isset( $update->user ) ) $this->User( $update->user, $prefix ? $prefix . '_user' : 'user' );
			$this->{$prefix . 'actor_chat'}   = $update->actor_chat ?? NULL;
			if ( isset( $update->actor_chat ) ) $this->Chat( $update->actor_chat, $prefix ? $prefix . '_actor_chat' : 'actor_chat' );
			$this->{$prefix . 'date'} = $update->date ?? NULL;
			$this->{$prefix . 'old_reaction'} = $update->old_reaction ?? NULL;
			if ( isset( $update->old_reaction ) ) $this->ReactionType( $update->old_reaction, $prefix ? $prefix . '_old_reaction' : 'old_reaction' );
			$this->{$prefix . 'new_reaction'} = $update->new_reaction ?? NULL;
			if ( isset( $update->new_reaction ) ) $this->ReactionType( $update->new_reaction, $prefix ? $prefix . '_new_reaction' : 'new_reaction' );
		}

		public function MessageReactionCountUpdated ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'chat'}       = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix ? $prefix . '_chat' : 'chat' );
			$this->{$prefix . 'message_id'} = $update->message_id ?? NULL;
			$this->{$prefix . 'date'} = $update->date ?? NULL;
			$this->{$prefix . 'reactions'} = $update->reactions ?? NULL;
			if ( isset( $update->reactions ) ) $this->ReactionCount( $update->reactions, $prefix ? $prefix . '_reactions' : 'reactions' );
		}

		public function ForumTopic () {}

		public function Gift ( object $update, string $prefix ) {
			$this->{$prefix . '_gift'} = $update->gift ?? NULL;
			$this->{$prefix . '_sticker'} = $update->sticker ?? NULL;
			if ( isset( $update->sticker ) ) $this->Sticker( $update->sticker, $prefix . '_sticker' );
			$this->{$prefix . '_star_count'} = $update->star_count ?? NULL;
			$this->{$prefix . '_upgrade_star_count'} = $update->upgrade_star_count ?? NULL;
			$this->{$prefix . '_total_count'} = $update->total_count ?? NULL;
			$this->{$prefix . '_remaining_count'} = $update->remaining_count ?? NULL;
		}

		public function Gifts () {}

		public function UniqueGiftModel ( object $update, string $prefix ) {
			$this->{$prefix . '_name'} = $update->name ?? NULL;
			$this->{$prefix . '_sticker'} = $update->sticker ?? NULL;
			if ( isset( $update->sticker ) ) $this->Sticker( $update->sticker, $prefix . '_sticker' );
			$this->{$prefix . '_rarity_per_mille'} = $update->rarity_per_mille ?? NULL;
		}

		public function UniqueGiftSymbol ( object $update, string $prefix ) {
			$this->{$prefix . '_name'} = $update->name ?? NULL;
			$this->{$prefix . '_sticker'} = $update->sticker ?? NULL;
			if ( isset( $update->sticker ) ) $this->Sticker( $update->sticker, $prefix . '_sticker' );
			$this->{$prefix . '_rarity_per_mille'} = $update->rarity_per_mille ?? NULL;
		}

		public function UniqueGiftBackdropColors ( object $update, string $prefix ) {
			$this->{$prefix . '_center_color'} = $update->center_color ?? NULL;
			$this->{$prefix . '_edge_color'} = $update->edge_color ?? NULL;
			$this->{$prefix . '_symbol_color'} = $update->symbol_color ?? NULL;
			$this->{$prefix . '_text_color'} = $update->text_color ?? NULL;

		}

		public function UniqueGiftBackdrop ( object $update, string $prefix ) {
			$this->{$prefix . '_name'} = $update->name ?? NULL;
			$this->{$prefix . '_colors'} = $update->colors ?? NULL;
			if ( isset( $update->colors ) ) $this->UniqueGiftBackdropColors( $update->colors, $prefix . '_colors' );
			$this->{$prefix . '_rarity_per_mille'} = $update->rarity_per_mille ?? NULL;
		}

		public function UniqueGift ( object $update, string $prefix ) {
			$this->{$prefix . '_base_name'} = $update->base_name ?? NULL;
			$this->{$prefix . '_name'} = $update->name ?? NULL;
			$this->{$prefix . '_number'} = $update->number ?? NULL;
			$this->{$prefix . '_model'} = $update->model ?? NULL;
			if ( isset( $update->model ) ) $this->UniqueGiftModel( $update->model, $prefix . '_model' );
			$this->{$prefix . '_symbol'} = $update->symbol ?? NULL;
			if ( isset( $update->symbol ) ) $this->UniqueGiftSymbol( $update->symbol, $prefix . '_symbol' );
			$this->{$prefix . '_backdrop'} = $update->backdrop ?? NULL;
			if ( isset( $update->backdrop ) ) $this->UniqueGiftBackdrop( $update->backdrop, $prefix . '_backdrop' );
		}

		public function GiftInfo ( object $update, string $prefix ) {
			$this->{$prefix . '_gift'} = $update->gift ?? NULL;
			if ( isset( $update->gift ) ) $this->Gift( $update->gift, $prefix . '_gift' );
			$this->{$prefix . '_owned_gift_id'} = $update->owned_gift_id ?? NULL;
			$this->{$prefix . '_convert_star_count'} = $update->convert_star_count ?? NULL;
			$this->{$prefix . '_prepaid_upgrade_star_count'} = $update->prepaid_upgrade_star_count ?? NULL;
			$this->{$prefix . '_can_be_upgraded'} = $update->can_be_upgraded ?? NULL;
			$this->{$prefix . '_text'} = $update->prepaid_upgrade_statextr_count ?? NULL;
			$this->{$prefix . '_entities'} = $update->entities ?? NULL;
			if ( isset( $update->entities ) ) $this->MessageEntity( $update->entities, $prefix . '_entities' );
			$this->{$prefix . '_is_private'} = $update->is_private ?? NULL;
		}

		public function UniqueGiftInfo ( object $update, string $prefix ) {
			$this->{$prefix . '_gift'} = $update->gift ?? NULL;
			if ( isset( $update->gift ) ) $this->UniqueGift( $update->gift, $prefix . '_gift' );
			$this->{$prefix . '_origin'} = $update->origin ?? NULL;
			$this->{$prefix . '_owned_gift_id'} = $update->owned_gift_id ?? NULL;
			$this->{$prefix . '_transfer_star_count'} = $update->transfer_star_count ?? NULL;

		}

		public function OwnedGift () {}
		public function OwnedGifts () {}
		public function AcceptedGiftTypes () {}
		public function StarAmount () {}
		public function BotCommand () {}
		public function BotCommandScope () {}
		public function BotName () {}
		public function BotDescription () {}
		public function BotShortDescription () {}
		public function MenuButton () {}
	
		public function ChatBoostSource ( object $update, string $prefix ) {
			$this->{$prefix . '_source'}              = $update->source ?? NULL;
			$this->{$prefix . '_user'}                = $update->user ?? NULL;
			if ( isset( $update->user ) ) $this->User( $update->user, $prefix ? $prefix . '_user' : 'user' );
			$this->{$prefix . '_giveaway_message_id'} = $update->giveaway_message_id ?? NULL;
			$this->{$prefix . '_prize_star_count'}    = $update->prize_star_count ?? NULL;
			$this->{$prefix . '_is_unclaimed'}        = $update->is_unclaimed ?? NULL;
		}

		public function ChatBoost ( object $update, string $prefix ) {
			$this->{$prefix . '_boost_id'}        = $update->boost_id ?? NULL;
			$this->{$prefix . '_add_date'}        = $update->add_date ?? NULL;
			$this->{$prefix . '_expiration_date'} = $update->expiration_date ?? NULL;
			$this->{$prefix . '_source'}          = $update->source ?? NULL;
			if ( isset( $update->source ) ) $this->ChatBoostSource( $update->source, $prefix . '_source' );
		}

		public function ChatBoostUpdated ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'chat'}  = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix ? $prefix . '_chat' : 'chat' );
			$this->{$prefix . 'boost'} = $update->boost ?? NULL;
			if ( isset( $update->boost ) ) $this->ChatBoost( $update->boost, $prefix ? $prefix . '_boost' : 'boost' );
		}

		public function ChatBoostRemoved ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'chat'}        = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix ? $prefix . '_chat' : 'chat' );
			$this->{$prefix . 'boost_id'}    = $update->boost_id ?? NULL;
			$this->{$prefix . 'boost'}       = $update->boost ?? NULL;
			$this->{$prefix . 'remove_date'} = $update->remove_date ?? NULL;
			$this->{$prefix . 'source'}      = $update->source ?? NULL;
			if ( isset( $update->source ) ) $this->ChatBoostSource( $update->source, $prefix ? $prefix . '_source' : 'source' );
		}

		public function UserChatBoosts () {}

		public function BusinessBotRights ( object $update, string $prefix ) {
			$this->{$prefix . '_can_reply'} = $update->can_reply ?? NULL;
			$this->{$prefix . '_can_read_messages'} = $update->can_read_messages ?? NULL;
			$this->{$prefix . '_can_delete_sent_messages'} = $update->can_delete_sent_messages ?? NULL;
			$this->{$prefix . '_can_delete_all_messages'} = $update->can_delete_all_messages ?? NULL;
			$this->{$prefix . '_can_edit_name'} = $update->can_edit_name ?? NULL;
			$this->{$prefix . '_can_edit_bio'} = $update->can_edit_bio ?? NULL;
			$this->{$prefix . '_can_edit_profile_photo'} = $update->can_edit_profile_photo ?? NULL;
			$this->{$prefix . '_can_edit_username'} = $update->can_edit_username ?? NULL;
			$this->{$prefix . '_can_change_gift_settings'} = $update->can_change_gift_settings ?? NULL;
			$this->{$prefix . '_can_view_gifts_and_stars'} = $update->can_view_gifts_and_stars ?? NULL;
			$this->{$prefix . '_can_convert_gifts_to_stars'} = $update->can_convert_gifts_to_stars ?? NULL;
			$this->{$prefix . '_can_transfer_and_upgrade_gifts'} = $update->can_transfer_and_upgrade_gifts ?? NULL;
			$this->{$prefix . '_can_transfer_stars'} = $update->can_transfer_stars ?? NULL;
			$this->{$prefix . '_can_manage_stories'} = $update->can_manage_stories ?? NULL;
		}

		public function BusinessConnection ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'id'} = $update->id ?? NULL;
			$this->{$prefix . 'user'} = $update->user ?? NULL;
			if ( isset( $update->user ) ) $this->User( $update->user, $prefix . 'user' );
			$this->{$prefix . 'user_chat_id'} = $update->user_chat_id ?? NULL;
			$this->{$prefix . 'date'} = $update->date ?? NULL;
			$this->{$prefix . 'rights'} = $update->rights ?? NULL;
			if ( isset( $update->rights ) ) $this->BusinessBotRights( $update->rights, $prefix . 'rights' );
			$this->{$prefix . 'is_enabled'} = $update->is_enabled ?? NULL;
		}

		public function BusinessMessagesDeleted ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'business_connection_id'} = $update->business_connection_id ?? NULL;
			$this->{$prefix . 'chat'} = $update->chat ?? NULL;
			if ( isset( $update->chat ) ) $this->Chat( $update->chat, $prefix . 'chat' );
			$this->{$prefix . 'message_ids'} = $update->message_ids ?? NULL;
		}

		public function ResponseParameters () {}
		public function InputMedia () {}
		public function InputFile () {}
		public function InputPaidMedia () {}
		public function InputProfilePhoto () {}
		public function InputStoryContent () {}

		public function Sticker ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'} = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_type'} = $update->type ?? NULL;
			$this->{$prefix . '_witdh'} = $update->width ?? NULL;
			$this->{$prefix . '_height'} = $update->height ?? NULL;
			$this->{$prefix . '_is_animated'} = $update->is_animated ?? NULL;
			$this->{$prefix . '_is_video'} = $update->is_video ?? NULL;
			$this->{$prefix . '_thumbnail'} = $update->thumbnail ?? NULL;
			if ( isset( $update->thumbnail ) ) $this->PhotoSize( $update->thumbnail, $prefix . '_thumbnail' );
			$this->{$prefix . '_emoji'} = $update->emoji ?? NULL;
			$this->{$prefix . '_set_name'} = $update->set_name ?? NULL;
			$this->{$prefix . '_premium_animation'} = $update->premium_animation ?? NULL;
			if ( isset( $update->premium_animation ) ) $this->File( $update->premium_animation, $prefix . '_premium_animation' );
			$this->{$prefix . '_mask_position'} = $update->mask_position ?? NULL;
			if ( isset( $update->mask_position ) ) $this->MaskPosition( $update->mask_position, $prefix . '_mask_position' );
			$this->{$prefix . '_custom_emoji_id'} = $update->custom_emoji_id ?? NULL;
			$this->{$prefix . '_needs_repainting'} = $update->needs_repainting ?? NULL;
			$this->{$prefix . '_file_size'} = $update->file_size ?? NULL;
		}
		
		public function StickerSet () {}

		public function MaskPosition ( object $update, string $prefix ) {
			$this->{$prefix . '_point'} = $update->point ?? NULL;
			$this->{$prefix . '_x_shift'} = $update->x_shift ?? NULL;
			$this->{$prefix . '_y_shift'} = $update->y_shift ?? NULL;
			$this->{$prefix . '_scale'} = $update->scale ?? NULL;

		}

		public function InputSticker () {}

		public function InlineQuery ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'id'} = $update->id ?? NULL;
			$this->{$prefix . 'from'} = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix . 'from' );
			$this->{$prefix . 'query'} = $update->query ?? NULL;
			$this->{$prefix . 'offset'} = $update->offset ?? NULL;
			$this->{$prefix . 'chat_type'} = $update->chat_type ?? NULL;
			$this->{$prefix . 'location'} = $update->location ?? NULL;
			if ( isset( $update->location ) ) $this->Location( $update->location, $prefix . 'location' );
		}

		public function InlineQueryResultsButton () {}
		public function InlineQueryResult () {}
		public function InputMessageContent () {}

		public function ChosenInlineResult ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'result_id'} = $update->result_id ?? NULL;
			$this->{$prefix . 'from'} = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix . 'from' );
			$this->{$prefix . 'location'} = $update->location ?? NULL;
			if ( isset( $update->location ) ) $this->Location( $update->location, $prefix . 'location' );
			$this->{$prefix . 'inline_message_id'} = $update->inline_message_id ?? NULL;
			$this->{$prefix . 'query'} = $update->query ?? NULL;
		}

		public function SentWebAppMessage () {}
		public function PreparedInlineMessage () {}
		public function LabeledPrice () {}

		public function Invoice ( object $update, string $prefix ) {
			$this->{$prefix . '_title'}           = $update->title ?? NULL;
			$this->{$prefix . '_description'}     = $update->description ?? NULL;
			$this->{$prefix . '_start_parameter'} = $update->start_parameter ?? NULL;
			$this->{$prefix . '_currency'}        = $update->currency ?? NULL;
			$this->{$prefix . '_total_amount'}    = $update->total_amount ?? NULL;
		}

		public function ShippingAddress ( object $update, string $prefix ) {
			$this->{$prefix . '_country_code'} = $update->country_code ?? NULL;
			$this->{$prefix . '_state'}        = $update->state ?? NULL;
			$this->{$prefix . '_city'}         = $update->city ?? NULL;
			$this->{$prefix . '_street_line1'} = $update->street_line1 ?? NULL;
			$this->{$prefix . '_street_line2'} = $update->street_line2 ?? NULL;
			$this->{$prefix . '_post_code'}    = $update->post_code ?? NULL;
		}

		public function OrderInfo ( object $update, string $prefix ) {
			$this->{$prefix . '_name'}             = $update->name ?? NULL;
			$this->{$prefix . '_phone_number'}     = $update->phone_number ?? NULL;
			$this->{$prefix . '_email'}            = $update->email ?? NULL;
			$this->{$prefix . '_shipping_address'} = $update->shipping_address ?? NULL;
			if ( isset( $update->shipping_address ) ) $this->ShippingAddress( $update->shipping_address, $prefix . '_shipping_address' );
		}

		public function SuccessfulPayment ( object $update, string $prefix ) {
			$this->{$prefix . '_currency'}                     = $update->currency ?? NULL;
			$this->{$prefix . '_total_amount'}                 = $update->total_amount ?? NULL;
			$this->{$prefix . '_invoice_payload'}              = $update->invoice_payload ?? NULL;
			$this->{$prefix . '_subscription_expiration_date'} = $update->subscription_expiration_date ?? NULL;
			$this->{$prefix . '_is_recurring'}                 = $update->is_recurring ?? NULL;
			$this->{$prefix . '_is_first_recurring'}           = $update->is_first_recurring ?? NULL;
			$this->{$prefix . '_shipping_option_id'}           = $update->shipping_option_id ?? NULL;
			$this->{$prefix . '_order_info'}                   = $update->order_info ?? NULL;
			if ( isset( $update->order_info ) ) $this->OrderInfo( $update->order_info, $prefix . '_order_info' );
			$this->{$prefix . '_telegram_payment_charge_id'}   = $update->telegram_payment_charge_id ?? NULL;
			$this->{$prefix . '_provider_payment_charge_id'}   = $update->provider_payment_charge_id ?? NULL;
		}

		public function RefundedPayment ( object $update, string $prefix ) {
			$this->{$prefix . '_currency'}                   = $update->currency ?? NULL;
			$this->{$prefix . '_total_amount'}               = $update->total_amount ?? NULL;
			$this->{$prefix . '_invoice_payload'}            = $update->invoice_payload ?? NULL;
			$this->{$prefix . '_telegram_payment_charge_id'} = $update->telegram_payment_charge_id ?? NULL;
			$this->{$prefix . '_provider_payment_charge_id'} = $update->provider_payment_charge_id ?? NULL;
		}

		public function ShippingQuery ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'id'}               = $update->id ?? NULL;
			$this->{$prefix . 'from'}             = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix ? $prefix . '_from' : 'from' );
			$this->{$prefix . 'invoice_payload'}  = $update->invoice_payload ?? NULL;
			$this->{$prefix . 'shipping_address'} = $update->shipping_address ?? NULL;
			if ( isset( $update->shipping_address ) ) $this->ShippingAddress( $update->shipping_address, $prefix ? $prefix . '_shipping_address' : 'shipping_address' );
		}

		public function PreCheckoutQuery ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'id'}               = $update->id ?? NULL;
			$this->{$prefix . 'from'}             = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix ? $prefix . '_from' : 'from' );
			$this->{$prefix . 'currency'}  = $update->currency ?? NULL;
			$this->{$prefix . 'total_amount'} = $update->total_amount ?? NULL;
			$this->{$prefix . 'invoice_payload'} = $update->invoice_payload ?? NULL;
			$this->{$prefix . 'shipping_option_id'} = $update->shipping_option_id ?? NULL;
			$this->{$prefix . 'order_info'} = $update->order_info ?? NULL;
			if ( isset( $update->order_info ) ) $this->OrderInfo( $update->order_info, $prefix ? $prefix . '_order_info' : 'order_info' );
		}

		public function PaidMediaPurchased ( object $update, string $prefix = '' ) {
			$this->{$prefix . 'from'}               = $update->from ?? NULL;
			if ( isset( $update->from ) ) $this->User( $update->from, $prefix ? $prefix . '_from' : 'from' );
			$this->{$prefix . 'paid_media_payload'} = $update->paid_media_payload ?? NULL;
		}

		public function RevenueWithdrawalState () {}
		public function AffiliateInfo () {}
		public function TransactionPartner () {}
		public function StarTransaction () {}
		public function StarTransactions () {}

		public function PassportData ( object $update, string $prefix ) {
			$this->{$prefix . '_data'}        = $update->data ?? NULL;
			if ( isset( $update->data ) ) $this->EncryptedPassportElement( $update->data, $prefix . '_data' );
			$this->{$prefix . '_credentials'} = $update->credentials ?? NULL;
			if ( isset( $update->credentials ) ) $this->EncryptedCredentials( $update->credentials, $prefix . '_credentials' );
		}

		public function PassportFile  ( object $update, string $prefix ) {
			$this->{$prefix . '_file_id'}        = $update->file_id ?? NULL;
			$this->{$prefix . '_file_unique_id'} = $update->file_unique_id ?? NULL;
			$this->{$prefix . '_file_size'}      = $update->file_size ?? NULL;
			$this->{$prefix . '_file_date'}      = $update->file_date ?? NULL;
		}

		public function EncryptedPassportElement ( object $update, string $prefix ) {
			$this->{$prefix . '_type'}         = $update->type ?? NULL;
			$this->{$prefix . '_data'}         = $update->data ?? NULL;
			$this->{$prefix . '_phone_number'} = $update->phone_number ?? NULL;
			$this->{$prefix . '_email'}        = $update->email ?? NULL;
			$this->{$prefix . '_files'}        = $update->files ?? NULL;
			if ( isset( $update->files ) ) $this->PassportFile( $update->files, $prefix . '_files' );
			$this->{$prefix . '_front_side'}   = $update->front_side ?? NULL;
			if ( isset( $update->front_side ) ) $this->PassportFile( $update->front_side, $prefix . '_front_side' );
			$this->{$prefix . '_reverse_side'} = $update->reverse_side ?? NULL;
			if ( isset( $update->reverse_side ) ) $this->PassportFile( $update->reverse_side, $prefix . '_reverse_side' );
			$this->{$prefix . '_selfie'}       = $update->selfie ?? NULL;
			if ( isset( $update->selfie ) ) $this->PassportFile( $update->selfie, $prefix . '_selfie' );
			$this->{$prefix . '_translation'}  = $update->translation ?? NULL;
			if ( isset( $update->translation ) ) $this->PassportFile( $update->translation, $prefix . '_translation' );
			$this->{$prefix . '_hash'}         = $update->hash ?? NULL;
		}

		public function EncryptedCredentials ( object $update, string $prefix ) {
			$this->{$prefix . '_data'} = $update->data ?? NULL;
			$this->{$prefix . '_hash'} = $update->hash ?? NULL;
			$this->{$prefix . '_secret'} = $update->secret ?? NULL;
		}

		public function PassportElementError () {}

		public function Game ( object $update, string $prefix ) {
			$this->{$prefix . '_title'}         = $update->title ?? NULL;
			$this->{$prefix . '_description'}   = $update->description ?? NULL;
			$this->{$prefix . '_photo'}         = $update->photo ?? NULL;
			if ( isset( $update->photo ) ) $this->PhotoSize( $update->photo, $prefix . '_photo' );
			$this->{$prefix . '_text'}          = $update->text ?? NULL;
			$this->{$prefix . '_text_entities'} = $update->text_entities ?? NULL;
			if ( isset( $update->text_entities ) ) $this->MessageEntity( $update->text_entities, $prefix . '_text_entities' );
			$this->{$prefix . '_animation'}     = $update->animation ?? NULL;
			if ( isset( $update->animation ) ) $this->Animation( $update->animation, $prefix . '_animation' );
		}

		public function CallbackGame () {}

		public function CallbagetGameHighScoresckGame () {}
	}