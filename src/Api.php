<?php

	namespace BazzaBot;

	use CURLFile;
	use stdClass;

	abstract class Api implements ApiInterface {
    /**
     * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
     * 
     * @see https://core.telegram.org/bots/api#getUpdates
     *
     * @param int|NULL $offset Identifier of the first update to be returned. Must be greater by one than the highest among the
     *                              identifiers of previously received updates. By default, updates starting with the earliest
     *                              unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called
     *                              with an offset higher than its update_id. The negative offset can be specified to retrieve updates
     *                              starting from -offset update from the end of the updates queue. All previous updates will be forgotten.
     * @param int|NULL $limit Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     * @param int|NULL $timeout Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive,
     *                              short polling should be used for testing purposes only.
     * @param string[]|NULL $allowed_updates A JSON-serialized list of the update types you want your bot to receive. For example, specify
     *                              ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See
     *                              Update for a complete list of available update types. Specify an empty list to receive all update
     *                              types except chat_member, message_reaction, and message_reaction_count (default). If not specified,
     *                              the previous setting will be used.Please note that this parameter doesn't affect updates created
     *                              before the call to getUpdates, so unwanted updates may be received for a short period of time.
     *
     * @return stdClass
     */
    public function getUpdates ( ?int $offset = NULL, ?int $limit = NULL, ?int $timeout = NULL, ?array $allowed_updates = NULL ) : stdClass {
      $args = []; 
      if ( $offset !== NULL ) $args['offset'] = $offset;
      if ( $limit !== NULL ) $args['limit'] = $limit;
      if ( $timeout !== NULL ) $args['timeout'] = $timeout;
      if ( $allowed_updates !== NULL ) $args['allowed_updates'] = json_encode( $allowed_updates );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever
     * there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing
     * a JSON-serialized Update. In case of an unsuccessful request (a request with response HTTP status
     * code different from 2XY), we will repeat the request and give up after a reasonable amount of
     * attempts. Returns True on success.
     * If you'd like to make sure that the webhook was set by
     * you, you can specify secret data in the parameter secret_token. If specified, the request will
     * contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
     * 
     * @see https://core.telegram.org/bots/api#setWebhook
     *
     * @param string $url HTTPS URL to send updates to. Use an empty string to remove webhook integration
     * @param InputFile|NULL $certificate Upload your public key certificate so that the root certificate in use can be checked. See our
     *                              self-signed guide for details.
     * @param string|NULL $ip_address The fixed IP address which will be used to send webhook requests instead of the IP address resolved
     *                              through DNS
     * @param int|NULL $max_connections The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery,
     *                              1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to
     *                              increase your bot's throughput.
     * @param string[]|NULL $allowed_updates A JSON-serialized list of the update types you want your bot to receive. For example, specify
     *                              ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See
     *                              Update for a complete list of available update types. Specify an empty list to receive all update
     *                              types except chat_member, message_reaction, and message_reaction_count (default). If not specified,
     *                              the previous setting will be used.Please note that this parameter doesn't affect updates created
     *                              before the call to the setWebhook, so unwanted updates may be received for a short period of time.
     * @param bool|NULL $drop_pending_updates Pass True to drop all pending updates
     * @param string|NULL $secret_token A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook
     *                              request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed. The header is useful
     *                              to ensure that the request comes from a webhook set by you.
     *
     * @return stdClass
     */
    public function setWebhook ( string $url, ?CURLFile $certificate = NULL, ?string $ip_address = NULL, ?int $max_connections = NULL, ?array $allowed_updates = NULL, ?bool $drop_pending_updates = NULL, ?string $secret_token = NULL ) : stdClass {
      $args = [ 'url' => $url ]; 
      if ( $certificate !== NULL ) $args['certificate'] = $certificate;
      if ( $ip_address !== NULL ) $args['ip_address'] = $ip_address;
      if ( $max_connections !== NULL ) $args['max_connections'] = $max_connections;
      if ( $allowed_updates !== NULL ) $args['allowed_updates'] = json_encode( $allowed_updates );
      if ( $drop_pending_updates !== NULL ) $args['drop_pending_updates'] = $drop_pending_updates;
      if ( $secret_token !== NULL ) $args['secret_token'] = $secret_token;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns
     * True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteWebhook
     *
     * @param bool|NULL $drop_pending_updates Pass True to drop all pending updates
     *
     * @return stdClass
     */
    public function deleteWebhook ( ?bool $drop_pending_updates = NULL ) : stdClass {
      $args = []; 
      if ( $drop_pending_updates !== NULL ) $args['drop_pending_updates'] = $drop_pending_updates;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get current webhook status. Requires no parameters. On success, returns a
     * WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
     * 
     * @see https://core.telegram.org/bots/api#getWebhookInfo
     *
     *
     * @return stdClass
     */
    public function getWebhookInfo ( ) : stdClass {
      return $this->Request( __FUNCTION__, [] );
    }

    /**
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic
     * information about the bot in form of a User object.
     * 
     * @see https://core.telegram.org/bots/api#getMe
     *
     *
     * @return stdClass
     */
    public function getMe ( ) : stdClass {
      return $this->Request( __FUNCTION__, [] );
    }

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally. You must
     * log out the bot before running it locally, otherwise there is no guarantee that the bot will receive
     * updates. After a successful call, you can immediately log in on a local server, but will not be able
     * to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
     * 
     * @see https://core.telegram.org/bots/api#logOut
     *
     *
     * @return stdClass
     */
    public function logOut ( ) : stdClass {
      return $this->Request( __FUNCTION__, [] );
    }

    /**
     * Use this method to close the bot instance before moving it from one local server to another. You
     * need to delete the webhook before calling this method to ensure that the bot isn't launched again
     * after server restart. The method will return error 429 in the first 10 minutes after the bot is
     * launched. Returns True on success. Requires no parameters.
     * 
     * @see https://core.telegram.org/bots/api#close
     *
     *
     * @return stdClass
     */
    public function close ( ) : stdClass {
      return $this->Request( __FUNCTION__, [] );
    }

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendMessage
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the message text. See formatting options for more details.
     * @param MessageEntity[]|NULL $entities A JSON-serialized list of special entities that appear in message text, which can be specified
     *                              instead of parse_mode
     * @param LinkPreviewOptions|NULL $link_preview_options Link preview generation options for the message
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendMessage ( int|string $chat_id, string $text, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $parse_mode = NULL, ?array $entities = NULL, ?array $link_preview_options = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'text' => $text ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $entities !== NULL ) $args['entities'] = json_encode( $entities );
      if ( $link_preview_options !== NULL ) $args['link_preview_options'] = json_encode( $link_preview_options );
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to forward messages of any kind. Service messages and messages with protected
     * content can't be forwarded. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#forwardMessage
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the
     *                              format @channelusername)
     * @param int|NULL $video_start_timestamp New start timestamp for the forwarded video in the message
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the forwarded message from forwarding and saving
     * @param int $message_id Message identifier in the chat specified in from_chat_id
     *
     * @return stdClass
     */
    public function forwardMessage ( int|string $chat_id, int|string $from_chat_id, int $message_id, ?int $message_thread_id = NULL, ?int $video_start_timestamp = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'from_chat_id' => $from_chat_id, 'message_id' => $message_id ]; 
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $video_start_timestamp !== NULL ) $args['video_start_timestamp'] = $video_start_timestamp;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to forward multiple messages of any kind. If some of the specified messages can't be
     * found or forwarded, they are skipped. Service messages and messages with protected content can't be
     * forwarded. Album grouping is kept for forwarded messages. On success, an array of MessageId of the
     * sent messages is returned.
     * 
     * @see https://core.telegram.org/bots/api#forwardMessages
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|string $from_chat_id Unique identifier for the chat where the original messages were sent (or channel username in the
     *                              format @channelusername)
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to forward. The
     *                              identifiers must be specified in a strictly increasing order.
     * @param bool|NULL $disable_notification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the forwarded messages from forwarding and saving
     *
     * @return stdClass
     */
    public function forwardMessages ( int|string $chat_id, int|string $from_chat_id, array $message_ids, ?int $message_thread_id = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'from_chat_id' => $from_chat_id, 'message_ids' => json_encode( $message_ids ) ]; 
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway
     * messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied
     * only if the value of the field correct_option_id is known to the bot. The method is analogous to the
     * method forwardMessage, but the copied message doesn't have a link to the original message. Returns
     * the MessageId of the sent message on success.
     * 
     * @see https://core.telegram.org/bots/api#copyMessage
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the
     *                              format @channelusername)
     * @param int $message_id Message identifier in the chat specified in from_chat_id
     * @param int|NULL $video_start_timestamp New start timestamp for the copied video in the message
     * @param string|NULL $caption New caption for media, 0-1024 characters after entities parsing. If not specified, the original
     *                              caption is kept
     * @param string|NULL $parse_mode Mode for parsing entities in the new caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the new caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media. Ignored if a new caption isn't specified.
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function copyMessage ( int|string $chat_id, int|string $from_chat_id, int $message_id, ?int $message_thread_id = NULL, ?int $video_start_timestamp = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'from_chat_id' => $from_chat_id, 'message_id' => $message_id ]; 
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $video_start_timestamp !== NULL ) $args['video_start_timestamp'] = $video_start_timestamp;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to copy messages of any kind. If some of the specified messages can't be found or
     * copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners
     * messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the
     * field correct_option_id is known to the bot. The method is analogous to the method forwardMessages,
     * but the copied messages don't have a link to the original message. Album grouping is kept for copied
     * messages. On success, an array of MessageId of the sent messages is returned.
     * 
     * @see https://core.telegram.org/bots/api#copyMessages
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param int|string $from_chat_id Unique identifier for the chat where the original messages were sent (or channel username in the
     *                              format @channelusername)
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages in the chat from_chat_id to copy. The
     *                              identifiers must be specified in a strictly increasing order.
     * @param bool|NULL $disable_notification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent messages from forwarding and saving
     * @param bool|NULL $remove_caption Pass True to copy the messages without their captions
     *
     * @return stdClass
     */
    public function copyMessages ( int|string $chat_id, int|string $from_chat_id, array $message_ids, ?int $message_thread_id = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $remove_caption = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'from_chat_id' => $from_chat_id, 'message_ids' => json_encode( $message_ids ) ]; 
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $remove_caption !== NULL ) $args['remove_caption'] = $remove_caption;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendPhoto
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $photo Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers
     *                              (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload
     *                              a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width
     *                              and height must not exceed 10000 in total. Width and height ratio must be at most 20. More
     *                              information on Sending Files »
     * @param string|NULL $caption Photo caption (may also be used when resending photos by file_id), 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the photo caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param bool|NULL $has_spoiler Pass True if the photo needs to be covered with a spoiler animation
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendPhoto ( int|string $chat_id, CURLFile|string $photo, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $has_spoiler = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'photo' => $photo ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $has_spoiler !== NULL ) $args['has_spoiler'] = $has_spoiler;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music
     * player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned.
     * Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the
     * future.
     * For sending voice messages, use the sendVoice method instead.
     * 
     * @see https://core.telegram.org/bots/api#sendAudio
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $audio Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram
     *                              servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the
     *                              Internet, or upload a new one using multipart/form-data. More information on Sending Files »
     * @param string|NULL $caption Audio caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the audio caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param int|NULL $duration Duration of the audio in seconds
     * @param string|NULL $performer Performer
     * @param string|NULL $title Track name
     * @param InputFile|string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendAudio ( int|string $chat_id, CURLFile|string $audio, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?int $duration = NULL, ?string $performer = NULL, ?string $title = NULL, CURLFile|string|null $thumbnail = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'audio' => $audio ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $performer !== NULL ) $args['performer'] = $performer;
      if ( $title !== NULL ) $args['title'] = $title;
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send general files. On success, the sent Message is returned. Bots can currently
     * send files of any type of up to 50 MB in size, this limit may be changed in the future.
     * 
     * @see https://core.telegram.org/bots/api#sendDocument
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $document File to send. Pass a file_id as String to send a file that exists on the Telegram servers
     *                              (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload
     *                              a new one using multipart/form-data. More information on Sending Files »
     * @param InputFile|string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $caption Document caption (may also be used when resending documents by file_id), 0-1024 characters after
     *                              entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the document caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $disable_content_type_detection Disables automatic server-side content type detection for files uploaded using multipart/form-data
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendDocument ( int|string $chat_id, CURLFile|string $document, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, CURLFile|string|null $thumbnail = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $disable_content_type_detection = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'document' => $document ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $disable_content_type_detection !== NULL ) $args['disable_content_type_detection'] = $disable_content_type_detection;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be
     * sent as Document). On success, the sent Message is returned. Bots can currently send video files of
     * up to 50 MB in size, this limit may be changed in the future.
     * 
     * @see https://core.telegram.org/bots/api#sendVideo
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $video Video to send. Pass a file_id as String to send a video that exists on the Telegram servers
     *                              (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload
     *                              a new video using multipart/form-data. More information on Sending Files »
     * @param int|NULL $duration Duration of sent video in seconds
     * @param int|NULL $width Video width
     * @param int|NULL $height Video height
     * @param InputFile|string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param InputFile|string|NULL $cover Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram
     *                              servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass
     *                              “attach://<file_attach_name>” to upload a new one using multipart/form-data under
     *                              <file_attach_name> name. More information on Sending Files »
     * @param int|NULL $start_timestamp Start timestamp for the video in the message
     * @param string|NULL $caption Video caption (may also be used when resending videos by file_id), 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the video caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param bool|NULL $has_spoiler Pass True if the video needs to be covered with a spoiler animation
     * @param bool|NULL $supports_streaming Pass True if the uploaded video is suitable for streaming
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendVideo ( int|string $chat_id, CURLFile|InputFile|string $video, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?int $duration = NULL, ?int $width = NULL, ?int $height = NULL, CURLFile|string|null $thumbnail = NULL, CURLFile|string|null $cover = NULL, ?int $start_timestamp = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $has_spoiler = NULL, ?bool $supports_streaming = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'video' => $video ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $width !== NULL ) $args['width'] = $width;
      if ( $height !== NULL ) $args['height'] = $height;
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $cover !== NULL ) $args['cover'] = $cover;
      if ( $start_timestamp !== NULL ) $args['start_timestamp'] = $start_timestamp;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $has_spoiler !== NULL ) $args['has_spoiler'] = $has_spoiler;
      if ( $supports_streaming !== NULL ) $args['supports_streaming'] = $supports_streaming;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success,
     * the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this
     * limit may be changed in the future.
     * 
     * @see https://core.telegram.org/bots/api#sendAnimation
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $animation Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers
     *                              (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or
     *                              upload a new animation using multipart/form-data. More information on Sending Files »
     * @param int|NULL $duration Duration of sent animation in seconds
     * @param int|NULL $width Animation width
     * @param int|NULL $height Animation height
     * @param InputFile|string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param string|NULL $caption Animation caption (may also be used when resending animation by file_id), 0-1024 characters after
     *                              entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the animation caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param bool|NULL $has_spoiler Pass True if the animation needs to be covered with a spoiler animation
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendAnimation ( int|string $chat_id, CURLFile|string $animation, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?int $duration = NULL, ?int $width = NULL, ?int $height = NULL, CURLFile|string|null $thumbnail = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $has_spoiler = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'animation' => $animation ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $width !== NULL ) $args['width'] = $width;
      if ( $height !== NULL ) $args['height'] = $height;
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $has_spoiler !== NULL ) $args['has_spoiler'] = $has_spoiler;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable
     * voice message. For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3
     * format, or in .M4A format (other formats may be sent as Audio or Document). On success, the sent
     * Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may
     * be changed in the future.
     * 
     * @see https://core.telegram.org/bots/api#sendVoice
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $voice Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers
     *                              (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload
     *                              a new one using multipart/form-data. More information on Sending Files »
     * @param string|NULL $caption Voice message caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the voice message caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param int|NULL $duration Duration of the voice message in seconds
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendVoice ( int|string $chat_id, CURLFile|string $voice, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?int $duration = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'voice' => $voice ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this
     * method to send video messages. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendVideoNote
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $video_note Video note to send. Pass a file_id as String to send a video note that exists on the Telegram
     *                              servers (recommended) or upload a new video using multipart/form-data. More information on Sending
     *                              Files ». Sending video notes by a URL is currently unsupported
     * @param int|NULL $duration Duration of sent video in seconds
     * @param int|NULL $length Video width and height, i.e. diameter of the video message
     * @param InputFile|string|NULL $thumbnail Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported
     *                              server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's
     *                              width and height should not exceed 320. Ignored if the file is not uploaded using
     *                              multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can
     *                              pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under
     *                              <file_attach_name>. More information on Sending Files »
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendVideoNote ( int|string $chat_id, CURLFile|string $video_note, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?int $duration = NULL, ?int $length = NULL, CURLFile|string|null $thumbnail = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'video_note' => $video_note ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $duration !== NULL ) $args['duration'] = $duration;
      if ( $length !== NULL ) $args['length'] = $length;
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send paid media. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendPaidMedia
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format
     *                              @channelusername). If the chat is a channel, all Telegram Star proceeds from this media will be
     *                              credited to the chat's balance. Otherwise, they will be credited to the bot's balance.
     * @param int $star_count The number of Telegram Stars that must be paid to buy access to the media; 1-10000
     * @param InputPaidMedia[] $media A JSON-serialized array describing the media to be sent; up to 10 items
     * @param string|NULL $payload Bot-defined paid media payload, 0-128 bytes. This will not be displayed to the user, use it for your
     *                              internal processes.
     * @param string|NULL $caption Media caption, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the media caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendPaidMedia ( int|string $chat_id, int $star_count, array $media, ?string $business_connection_id = NULL, ?string $payload = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'star_count' => $star_count, 'media' => json_encode( $media ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $payload !== NULL ) $args['payload'] = $payload;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send a group of photos, videos, documents or audios as an album. Documents and
     * audio files can be only grouped in an album with messages of the same type. On success, an array of
     * Messages that were sent is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendMediaGroup
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo[] $media A JSON-serialized array describing messages to be sent, must include 2-10 items
     * @param bool|NULL $disable_notification Sends messages silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent messages from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     *
     * @return stdClass
     */
    public function sendMediaGroup ( int|string $chat_id, array $media, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'media' => json_encode( $media ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendLocation
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param float $latitude Latitude of the location
     * @param float $longitude Longitude of the location
     * @param float|NULL $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|NULL $live_period Period in seconds during which the location will be updated (see Live Locations, should be between
     *                              60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|NULL $heading For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360
     *                              if specified.
     * @param int|NULL $proximity_alert_radius For live locations, a maximum distance for proximity alerts about approaching another chat member,
     *                              in meters. Must be between 1 and 100000 if specified.
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendLocation ( int|string $chat_id, array $latitude, array $longitude, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?array $horizontal_accuracy = NULL, ?int $live_period = NULL, ?int $heading = NULL, ?int $proximity_alert_radius = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'latitude' => json_encode( $latitude ), 'longitude' => json_encode( $longitude ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $horizontal_accuracy !== NULL ) $args['horizontal_accuracy'] = json_encode( $horizontal_accuracy );
      if ( $live_period !== NULL ) $args['live_period'] = $live_period;
      if ( $heading !== NULL ) $args['heading'] = $heading;
      if ( $proximity_alert_radius !== NULL ) $args['proximity_alert_radius'] = $proximity_alert_radius;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendVenue
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param float $latitude Latitude of the venue
     * @param float $longitude Longitude of the venue
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     * @param string|NULL $foursquare_id Foursquare identifier of the venue
     * @param string|NULL $foursquare_type Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     *                              “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|NULL $google_place_id Google Places identifier of the venue
     * @param string|NULL $google_place_type Google Places type of the venue. (See supported types.)
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendVenue ( int|string $chat_id, array $latitude, array $longitude, string $title, string $address, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $foursquare_id = NULL, ?string $foursquare_type = NULL, ?string $google_place_id = NULL, ?string $google_place_type = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'latitude' => json_encode( $latitude ), 'longitude' => json_encode( $longitude ), 'title' => $title, 'address' => $address ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $foursquare_id !== NULL ) $args['foursquare_id'] = $foursquare_id;
      if ( $foursquare_type !== NULL ) $args['foursquare_type'] = $foursquare_type;
      if ( $google_place_id !== NULL ) $args['google_place_id'] = $google_place_id;
      if ( $google_place_type !== NULL ) $args['google_place_type'] = $google_place_type;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send phone contacts. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendContact
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param string|NULL $last_name Contact's last name
     * @param string|NULL $vcard Additional data about the contact in the form of a vCard, 0-2048 bytes
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendContact ( int|string $chat_id, string $phone_number, string $first_name, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $last_name = NULL, ?string $vcard = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'phone_number' => $phone_number, 'first_name' => $first_name ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      if ( $vcard !== NULL ) $args['vcard'] = $vcard;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send a native poll. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendPoll
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string $question Poll question, 1-300 characters
     * @param string|NULL $question_parse_mode Mode for parsing entities in the question. See formatting options for more details. Currently, only
     *                              custom emoji entities are allowed
     * @param MessageEntity[]|NULL $question_entities A JSON-serialized list of special entities that appear in the poll question. It can be specified
     *                              instead of question_parse_mode
     * @param InputPollOption[] $options A JSON-serialized list of 2-10 answer options
     * @param bool|NULL $is_anonymous True, if the poll needs to be anonymous, defaults to True
     * @param string|NULL $type Poll type, “quiz” or “regular”, defaults to “regular”
     * @param bool|NULL $allows_multiple_answers True, if the poll allows multiple answers, ignored for polls in quiz mode, defaults to False
     * @param int|NULL $correct_option_id 0-based identifier of the correct answer option, required for polls in quiz mode
     * @param string|NULL $explanation Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style
     *                              poll, 0-200 characters with at most 2 line feeds after entities parsing
     * @param string|NULL $explanation_parse_mode Mode for parsing entities in the explanation. See formatting options for more details.
     * @param MessageEntity[]|NULL $explanation_entities A JSON-serialized list of special entities that appear in the poll explanation. It can be specified
     *                              instead of explanation_parse_mode
     * @param int|NULL $open_period Amount of time in seconds the poll will be active after creation, 5-600. Can't be used together with
     *                              close_date.
     * @param int|NULL $close_date Point in time (Unix timestamp) when the poll will be automatically closed. Must be at least 5 and no
     *                              more than 600 seconds in the future. Can't be used together with open_period.
     * @param bool|NULL $is_closed Pass True if the poll needs to be immediately closed. This can be useful for poll preview.
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendPoll ( int|string $chat_id, string $question, array $options, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $question_parse_mode = NULL, ?array $question_entities = NULL, ?bool $is_anonymous = NULL, ?string $type = NULL, ?bool $allows_multiple_answers = NULL, ?int $correct_option_id = NULL, ?string $explanation = NULL, ?string $explanation_parse_mode = NULL, ?array $explanation_entities = NULL, ?int $open_period = NULL, ?int $close_date = NULL, ?bool $is_closed = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'question' => $question, 'options' => json_encode( $options ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $question_parse_mode !== NULL ) $args['question_parse_mode'] = $question_parse_mode;
      if ( $question_entities !== NULL ) $args['question_entities'] = json_encode( $question_entities );
      if ( $is_anonymous !== NULL ) $args['is_anonymous'] = $is_anonymous;
      if ( $type !== NULL ) $args['type'] = $type;
      if ( $allows_multiple_answers !== NULL ) $args['allows_multiple_answers'] = $allows_multiple_answers;
      if ( $correct_option_id !== NULL ) $args['correct_option_id'] = $correct_option_id;
      if ( $explanation !== NULL ) $args['explanation'] = $explanation;
      if ( $explanation_parse_mode !== NULL ) $args['explanation_parse_mode'] = $explanation_parse_mode;
      if ( $explanation_entities !== NULL ) $args['explanation_entities'] = json_encode( $explanation_entities );
      if ( $open_period !== NULL ) $args['open_period'] = $open_period;
      if ( $close_date !== NULL ) $args['close_date'] = $close_date;
      if ( $is_closed !== NULL ) $args['is_closed'] = $is_closed;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send an animated emoji that will display a random value. On success, the sent
     * Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendDice
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string|NULL $emoji Emoji on which the dice throw animation is based. Currently, must be one of “🎲”, “🎯”,
     *                              “🏀”, “⚽”, “🎳”, or “🎰”. Dice can have values 1-6 for “🎲”,
     *                              “🎯” and “🎳”, values 1-5 for “🏀” and “⚽”, and values 1-64 for “🎰”.
     *                              Defaults to “🎲”
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendDice ( int|string $chat_id, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $emoji = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $emoji !== NULL ) $args['emoji'] = $emoji;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side. The
     * status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear
     * its typing status). Returns True on success.
     * We only recommend using this method when a
     * response from the bot will take a noticeable amount of time to arrive.
     * 
     * @see https://core.telegram.org/bots/api#sendChatAction
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the action will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread; for supergroups only
     * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for
     *                              text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or
     *                              upload_voice for voice notes, upload_document for general files, choose_sticker for stickers,
     *                              find_location for location data, record_video_note or upload_video_note for video notes.
     *
     * @return stdClass
     */
    public function sendChatAction ( int|string $chat_id, string $action, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'action' => $action ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the chosen reactions on a message. Service messages of some types can't be
     * reacted to. Automatically forwarded messages from a channel to its discussion group have the same
     * available reactions as messages in the channel. Bots can't use paid reactions. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setMessageReaction
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $message_id Identifier of the target message. If the message belongs to a media group, the reaction is set to
     *                              the first non-deleted message in the group instead.
     * @param ReactionType[]|NULL $reaction A JSON-serialized list of reaction types to set on the message. Currently, as non-premium users,
     *                              bots can set up to one reaction per message. A custom emoji reaction can be used if it is either
     *                              already present on the message or explicitly allowed by chat administrators. Paid reactions can't be
     *                              used by bots.
     * @param bool|NULL $is_big Pass True to set the reaction with a big animation
     *
     * @return stdClass
     */
    public function setMessageReaction ( int|string $chat_id, int $message_id, ?array $reaction = NULL, ?bool $is_big = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'message_id' => $message_id ]; 
      if ( $reaction !== NULL ) $args['reaction'] = json_encode( $reaction );
      if ( $is_big !== NULL ) $args['is_big'] = $is_big;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     * 
     * @see https://core.telegram.org/bots/api#getUserProfilePhotos
     *
     * @param int $user_id Unique identifier of the target user
     * @param int|NULL $offset Sequential number of the first photo to be returned. By default, all photos are returned.
     * @param int|NULL $limit Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     *
     * @return stdClass
     */
    public function getUserProfilePhotos ( int $user_id, ?int $offset = NULL, ?int $limit = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id ]; 
      if ( $offset !== NULL ) $args['offset'] = $offset;
      if ( $limit !== NULL ) $args['limit'] = $limit;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Changes the emoji status for a given user that previously allowed the bot to manage their emoji
     * status via the Mini App method requestEmojiStatusAccess. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setUserEmojiStatus
     *
     * @param int $user_id Unique identifier of the target user
     * @param string|NULL $emoji_status_custom_emoji_id Custom emoji identifier of the emoji status to set. Pass an empty string to remove the status.
     * @param int|NULL $emoji_status_expiration_date Expiration date of the emoji status, if any
     *
     * @return stdClass
     */
    public function setUserEmojiStatus ( int $user_id, ?string $emoji_status_custom_emoji_id = NULL, ?int $emoji_status_expiration_date = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id ]; 
      if ( $emoji_status_custom_emoji_id !== NULL ) $args['emoji_status_custom_emoji_id'] = $emoji_status_custom_emoji_id;
      if ( $emoji_status_expiration_date !== NULL ) $args['emoji_status_expiration_date'] = $emoji_status_expiration_date;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get basic information about a file and prepare it for downloading. For the
     * moment, bots can download files of up to 20MB in size. On success, a File object is returned. The
     * file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where
     * <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1
     * hour. When the link expires, a new one can be requested by calling getFile again.
     * 
     * @see https://core.telegram.org/bots/api#getFile
     *
     * @param string $file_id File identifier to get information about
     *
     * @return stdClass
     */
    public function getFile ( string $file_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'file_id' => $file_id ] );
    }

    /**
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and
     * channels, the user will not be able to return to the chat on their own using invite links, etc.,
     * unless unbanned first. The bot must be an administrator in the chat for this to work and must have
     * the appropriate administrator rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#banChatMember
     *
     * @param int|string $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the
     *                              format @channelusername)
     * @param int $user_id Unique identifier of the target user
     * @param int|NULL $until_date Date when the user will be unbanned; Unix time. If user is banned for more than 366 days or less
     *                              than 30 seconds from the current time they are considered to be banned forever. Applied for
     *                              supergroups and channels only.
     * @param bool|NULL $revoke_messages Pass True to delete all messages from the chat for the user that is being removed. If False, the
     *                              user will be able to see messages in the group that were sent before the user was removed. Always
     *                              True for supergroups and channels.
     *
     * @return stdClass
     */
    public function banChatMember ( int|string $chat_id, int $user_id, ?int $until_date = NULL, ?bool $revoke_messages = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'user_id' => $user_id ]; 
      if ( $until_date !== NULL ) $args['until_date'] = $until_date;
      if ( $revoke_messages !== NULL ) $args['revoke_messages'] = $revoke_messages;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to unban a previously banned user in a supergroup or channel. The user will not
     * return to the group or channel automatically, but will be able to join via link, etc. The bot must
     * be an administrator for this to work. By default, this method guarantees that after the call the
     * user is not a member of the chat, but will be able to join it. So if the user is a member of the
     * chat they will also be removed from the chat. If you don't want this, use the parameter
     * only_if_banned. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#unbanChatMember
     *
     * @param int|string $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the
     *                              format @channelusername)
     * @param int $user_id Unique identifier of the target user
     * @param bool|NULL $only_if_banned Do nothing if the user is not banned
     *
     * @return stdClass
     */
    public function unbanChatMember ( int|string $chat_id, int $user_id, ?bool $only_if_banned = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'user_id' => $user_id ]; 
      if ( $only_if_banned !== NULL ) $args['only_if_banned'] = $only_if_banned;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the
     * supergroup for this to work and must have the appropriate administrator rights. Pass True for all
     * permissions to lift restrictions from a user. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#restrictChatMember
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $user_id Unique identifier of the target user
     * @param ChatPermissions $permissions A JSON-serialized object for new user permissions
     * @param bool|NULL $use_independent_chat_permissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and
     *                              can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios,
     *                              can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes
     *                              permissions; the can_send_polls permission will imply the can_send_messages permission.
     * @param int|NULL $until_date Date when restrictions will be lifted for the user; Unix time. If user is restricted for more than
     *                              366 days or less than 30 seconds from the current time, they are considered to be restricted forever
     *
     * @return stdClass
     */
    public function restrictChatMember ( int|string $chat_id, int $user_id, array $permissions, ?bool $use_independent_chat_permissions = NULL, ?int $until_date = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'user_id' => $user_id, 'permissions' => json_encode( $permissions ) ]; 
      if ( $use_independent_chat_permissions !== NULL ) $args['use_independent_chat_permissions'] = $use_independent_chat_permissions;
      if ( $until_date !== NULL ) $args['until_date'] = $until_date;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an
     * administrator in the chat for this to work and must have the appropriate administrator rights. Pass
     * False for all boolean parameters to demote a user. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#promoteChatMember
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $user_id Unique identifier of the target user
     * @param bool|NULL $is_anonymous Pass True if the administrator's presence in the chat is hidden
     * @param bool|NULL $can_manage_chat Pass True if the administrator can access the chat event log, get boost list, see hidden supergroup
     *                              and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool|NULL $can_delete_messages Pass True if the administrator can delete messages of other users
     * @param bool|NULL $can_manage_video_chats Pass True if the administrator can manage video chats
     * @param bool|NULL $can_restrict_members Pass True if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool|NULL $can_promote_members Pass True if the administrator can add new administrators with a subset of their own privileges or
     *                              demote administrators that they have promoted, directly or indirectly (promoted by administrators
     *                              that were appointed by him)
     * @param bool|NULL $can_change_info Pass True if the administrator can change chat title, photo and other settings
     * @param bool|NULL $can_invite_users Pass True if the administrator can invite new users to the chat
     * @param bool|NULL $can_post_stories Pass True if the administrator can post stories to the chat
     * @param bool|NULL $can_edit_stories Pass True if the administrator can edit stories posted by other users, post stories to the chat
     *                              page, pin chat stories, and access the chat's story archive
     * @param bool|NULL $can_delete_stories Pass True if the administrator can delete stories posted by other users
     * @param bool|NULL $can_post_messages Pass True if the administrator can post messages in the channel, or access channel statistics; for
     *                              channels only
     * @param bool|NULL $can_edit_messages Pass True if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|NULL $can_pin_messages Pass True if the administrator can pin messages; for supergroups only
     * @param bool|NULL $can_manage_topics Pass True if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     *
     * @return stdClass
     */
    public function promoteChatMember ( int|string $chat_id, int $user_id, ?bool $is_anonymous = NULL, ?bool $can_manage_chat = NULL, ?bool $can_delete_messages = NULL, ?bool $can_manage_video_chats = NULL, ?bool $can_restrict_members = NULL, ?bool $can_promote_members = NULL, ?bool $can_change_info = NULL, ?bool $can_invite_users = NULL, ?bool $can_post_stories = NULL, ?bool $can_edit_stories = NULL, ?bool $can_delete_stories = NULL, ?bool $can_post_messages = NULL, ?bool $can_edit_messages = NULL, ?bool $can_pin_messages = NULL, ?bool $can_manage_topics = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'user_id' => $user_id ]; 
      if ( $is_anonymous !== NULL ) $args['is_anonymous'] = $is_anonymous;
      if ( $can_manage_chat !== NULL ) $args['can_manage_chat'] = $can_manage_chat;
      if ( $can_delete_messages !== NULL ) $args['can_delete_messages'] = $can_delete_messages;
      if ( $can_manage_video_chats !== NULL ) $args['can_manage_video_chats'] = $can_manage_video_chats;
      if ( $can_restrict_members !== NULL ) $args['can_restrict_members'] = $can_restrict_members;
      if ( $can_promote_members !== NULL ) $args['can_promote_members'] = $can_promote_members;
      if ( $can_change_info !== NULL ) $args['can_change_info'] = $can_change_info;
      if ( $can_invite_users !== NULL ) $args['can_invite_users'] = $can_invite_users;
      if ( $can_post_stories !== NULL ) $args['can_post_stories'] = $can_post_stories;
      if ( $can_edit_stories !== NULL ) $args['can_edit_stories'] = $can_edit_stories;
      if ( $can_delete_stories !== NULL ) $args['can_delete_stories'] = $can_delete_stories;
      if ( $can_post_messages !== NULL ) $args['can_post_messages'] = $can_post_messages;
      if ( $can_edit_messages !== NULL ) $args['can_edit_messages'] = $can_edit_messages;
      if ( $can_pin_messages !== NULL ) $args['can_pin_messages'] = $can_pin_messages;
      if ( $can_manage_topics !== NULL ) $args['can_manage_topics'] = $can_manage_topics;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatAdministratorCustomTitle
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $user_id Unique identifier of the target user
     * @param string $custom_title New custom title for the administrator; 0-16 characters, emoji are not allowed
     *
     * @return stdClass
     */
    public function setChatAdministratorCustomTitle ( int|string $chat_id, int $user_id, string $custom_title ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'user_id' => $user_id, 'custom_title' => $custom_title ] );
    }

    /**
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the
     * owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot
     * must be an administrator in the supergroup or channel for this to work and must have the appropriate
     * administrator rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#banChatSenderChat
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $sender_chat_id Unique identifier of the target sender chat
     *
     * @return stdClass
     */
    public function banChatSenderChat ( int|string $chat_id, int $sender_chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'sender_chat_id' => $sender_chat_id ] );
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must
     * be an administrator for this to work and must have the appropriate administrator rights. Returns
     * True on success.
     * 
     * @see https://core.telegram.org/bots/api#unbanChatSenderChat
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $sender_chat_id Unique identifier of the target sender chat
     *
     * @return stdClass
     */
    public function unbanChatSenderChat ( int|string $chat_id, int $sender_chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'sender_chat_id' => $sender_chat_id ] );
    }

    /**
     * Use this method to set default chat permissions for all members. The bot must be an administrator in
     * the group or a supergroup for this to work and must have the can_restrict_members administrator
     * rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatPermissions
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param ChatPermissions $permissions A JSON-serialized object for new default chat permissions
     * @param bool|NULL $use_independent_chat_permissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and
     *                              can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios,
     *                              can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes
     *                              permissions; the can_send_polls permission will imply the can_send_messages permission.
     *
     * @return stdClass
     */
    public function setChatPermissions ( int|string $chat_id, array $permissions, ?bool $use_independent_chat_permissions = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'permissions' => json_encode( $permissions ) ]; 
      if ( $use_independent_chat_permissions !== NULL ) $args['use_independent_chat_permissions'] = $use_independent_chat_permissions;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary
     * link is revoked. The bot must be an administrator in the chat for this to work and must have the
     * appropriate administrator rights. Returns the new invite link as String on success.
     * 
     * @see https://core.telegram.org/bots/api#exportChatInviteLink
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return stdClass
     */
    public function exportChatInviteLink ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in
     * the chat for this to work and must have the appropriate administrator rights. The link can be
     * revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
     * 
     * @see https://core.telegram.org/bots/api#createChatInviteLink
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|NULL $name Invite link name; 0-32 characters
     * @param int|NULL $expire_date Point in time (Unix timestamp) when the link will expire
     * @param int|NULL $member_limit The maximum number of users that can be members of the chat simultaneously after joining the chat
     *                              via this invite link; 1-99999
     * @param bool|NULL $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators. If True,
     *                              member_limit can't be specified
     *
     * @return stdClass
     */
    public function createChatInviteLink ( int|string $chat_id, ?string $name = NULL, ?int $expire_date = NULL, ?int $member_limit = NULL, ?bool $creates_join_request = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id ]; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $expire_date !== NULL ) $args['expire_date'] = $expire_date;
      if ( $member_limit !== NULL ) $args['member_limit'] = $member_limit;
      if ( $creates_join_request !== NULL ) $args['creates_join_request'] = $creates_join_request;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an
     * administrator in the chat for this to work and must have the appropriate administrator rights.
     * Returns the edited invite link as a ChatInviteLink object.
     * 
     * @see https://core.telegram.org/bots/api#editChatInviteLink
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $invite_link The invite link to edit
     * @param string|NULL $name Invite link name; 0-32 characters
     * @param int|NULL $expire_date Point in time (Unix timestamp) when the link will expire
     * @param int|NULL $member_limit The maximum number of users that can be members of the chat simultaneously after joining the chat
     *                              via this invite link; 1-99999
     * @param bool|NULL $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators. If True,
     *                              member_limit can't be specified
     *
     * @return stdClass
     */
    public function editChatInviteLink ( int|string $chat_id, string $invite_link, ?string $name = NULL, ?int $expire_date = NULL, ?int $member_limit = NULL, ?bool $creates_join_request = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'invite_link' => $invite_link ]; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $expire_date !== NULL ) $args['expire_date'] = $expire_date;
      if ( $member_limit !== NULL ) $args['member_limit'] = $member_limit;
      if ( $creates_join_request !== NULL ) $args['creates_join_request'] = $creates_join_request;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to create a subscription invite link for a channel chat. The bot must have the
     * can_invite_users administrator rights. The link can be edited using the method
     * editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new
     * invite link as a ChatInviteLink object.
     * 
     * @see https://core.telegram.org/bots/api#createChatSubscriptionInviteLink
     *
     * @param int|string $chat_id Unique identifier for the target channel chat or username of the target channel (in the format @channelusername)
     * @param string|NULL $name Invite link name; 0-32 characters
     * @param int $subscription_period The number of seconds the subscription will be active for before the next payment. Currently, it
     *                              must always be 2592000 (30 days).
     * @param int $subscription_price The amount of Telegram Stars a user must pay initially and after each subsequent subscription period
     *                              to be a member of the chat; 1-10000
     *
     * @return stdClass
     */
    public function createChatSubscriptionInviteLink ( int|string $chat_id, int $subscription_period, int $subscription_price, ?string $name = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'subscription_period' => $subscription_period, 'subscription_price' => $subscription_price ]; 
      if ( $name !== NULL ) $args['name'] = $name;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit a subscription invite link created by the bot. The bot must have the
     * can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink object.
     * 
     * @see https://core.telegram.org/bots/api#editChatSubscriptionInviteLink
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $invite_link The invite link to edit
     * @param string|NULL $name Invite link name; 0-32 characters
     *
     * @return stdClass
     */
    public function editChatSubscriptionInviteLink ( int|string $chat_id, string $invite_link, ?string $name = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'invite_link' => $invite_link ]; 
      if ( $name !== NULL ) $args['name'] = $name;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new
     * link is automatically generated. The bot must be an administrator in the chat for this to work and
     * must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
     * 
     * @see https://core.telegram.org/bots/api#revokeChatInviteLink
     *
     * @param int|string $chat_id Unique identifier of the target chat or username of the target channel (in the format @channelusername)
     * @param string $invite_link The invite link to revoke
     *
     * @return stdClass
     */
    public function revokeChatInviteLink ( int|string $chat_id, string $invite_link ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'invite_link' => $invite_link ] );
    }

    /**
     * Use this method to approve a chat join request. The bot must be an administrator in the chat for
     * this to work and must have the can_invite_users administrator right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#approveChatJoinRequest
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $user_id Unique identifier of the target user
     *
     * @return stdClass
     */
    public function approveChatJoinRequest ( int|string $chat_id, int $user_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'user_id' => $user_id ] );
    }

    /**
     * Use this method to decline a chat join request. The bot must be an administrator in the chat for
     * this to work and must have the can_invite_users administrator right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#declineChatJoinRequest
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $user_id Unique identifier of the target user
     *
     * @return stdClass
     */
    public function declineChatJoinRequest ( int|string $chat_id, int $user_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'user_id' => $user_id ] );
    }

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats.
     * The bot must be an administrator in the chat for this to work and must have the appropriate
     * administrator rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatPhoto
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param InputFile $photo New chat photo, uploaded using multipart/form-data
     *
     * @return stdClass
     */
    public function setChatPhoto ( int|string $chat_id, CURLFile $photo ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'photo' => $photo ] );
    }

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be
     * an administrator in the chat for this to work and must have the appropriate administrator rights.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteChatPhoto
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return stdClass
     */
    public function deleteChatPhoto ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot
     * must be an administrator in the chat for this to work and must have the appropriate administrator
     * rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatTitle
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string $title New chat title, 1-128 characters
     *
     * @return stdClass
     */
    public function setChatTitle ( int|string $chat_id, string $title ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'title' => $title ] );
    }

    /**
     * Use this method to change the description of a group, a supergroup or a channel. The bot must be an
     * administrator in the chat for this to work and must have the appropriate administrator rights.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatDescription
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|NULL $description New chat description, 0-255 characters
     *
     * @return stdClass
     */
    public function setChatDescription ( int|string $chat_id, ?string $description = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id ]; 
      if ( $description !== NULL ) $args['description'] = $description;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a
     * private chat, the bot must be an administrator in the chat for this to work and must have the
     * 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in
     * a channel. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#pinChatMessage
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be pinned
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $message_id Identifier of a message to pin
     * @param bool|NULL $disable_notification Pass True if it is not necessary to send a notification to all chat members about the new pinned
     *                              message. Notifications are always disabled in channels and private chats.
     *
     * @return stdClass
     */
    public function pinChatMessage ( int|string $chat_id, int $message_id, ?string $business_connection_id = NULL, ?bool $disable_notification = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'message_id' => $message_id ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a
     * private chat, the bot must be an administrator in the chat for this to work and must have the
     * 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in
     * a channel. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#unpinChatMessage
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be unpinned
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_id Identifier of the message to unpin. Required if business_connection_id is specified. If not
     *                              specified, the most recent pinned message (by sending date) will be unpinned.
     *
     * @return stdClass
     */
    public function unpinChatMessage ( int|string $chat_id, ?string $business_connection_id = NULL, ?int $message_id = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat,
     * the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages'
     * administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns
     * True on success.
     * 
     * @see https://core.telegram.org/bots/api#unpinAllChatMessages
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return stdClass
     */
    public function unpinAllChatMessages ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#leaveChat
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     *                              @channelusername)
     *
     * @return stdClass
     */
    public function leaveChat ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
     * 
     * @see https://core.telegram.org/bots/api#getChat
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     *                              @channelusername)
     *
     * @return stdClass
     */
    public function getChat ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of
     * ChatMember objects.
     * 
     * @see https://core.telegram.org/bots/api#getChatAdministrators
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     *                              @channelusername)
     *
     * @return stdClass
     */
    public function getChatAdministrators ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     * 
     * @see https://core.telegram.org/bots/api#getChatMemberCount
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     *                              @channelusername)
     *
     * @return stdClass
     */
    public function getChatMemberCount ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to get information about a member of a chat. The method is only guaranteed to work
     * for other users if the bot is an administrator in the chat. Returns a ChatMember object on success.
     * 
     * @see https://core.telegram.org/bots/api#getChatMember
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format
     *                              @channelusername)
     * @param int $user_id Unique identifier of the target user
     *
     * @return stdClass
     */
    public function getChatMember ( int|string $chat_id, int $user_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'user_id' => $user_id ] );
    }

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in
     * the chat for this to work and must have the appropriate administrator rights. Use the field
     * can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatStickerSet
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string $sticker_set_name Name of the sticker set to be set as the group sticker set
     *
     * @return stdClass
     */
    public function setChatStickerSet ( int|string $chat_id, string $sticker_set_name ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'sticker_set_name' => $sticker_set_name ] );
    }

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in
     * the chat for this to work and must have the appropriate administrator rights. Use the field
     * can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteChatStickerSet
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return stdClass
     */
    public function deleteChatStickerSet ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user.
     * Requires no parameters. Returns an Array of Sticker objects.
     * 
     * @see https://core.telegram.org/bots/api#getForumTopicIconStickers
     *
     *
     * @return stdClass
     */
    public function getForumTopicIconStickers ( ) : stdClass {
      return $this->Request( __FUNCTION__, [] );
    }

    /**
     * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in
     * the chat for this to work and must have the can_manage_topics administrator rights. Returns
     * information about the created topic as a ForumTopic object.
     * 
     * @see https://core.telegram.org/bots/api#createForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string $name Topic name, 1-128 characters
     * @param int|NULL $icon_color Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590
     *                              (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     * @param string|NULL $icon_custom_emoji_id Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get
     *                              all allowed custom emoji identifiers.
     *
     * @return stdClass
     */
    public function createForumTopic ( int|string $chat_id, string $name, ?int $icon_color = NULL, ?string $icon_custom_emoji_id = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'name' => $name ]; 
      if ( $icon_color !== NULL ) $args['icon_color'] = $icon_color;
      if ( $icon_custom_emoji_id !== NULL ) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an
     * administrator in the chat for this to work and must have the can_manage_topics administrator rights,
     * unless it is the creator of the topic. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#editForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     * @param string|NULL $name New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept
     * @param string|NULL $icon_custom_emoji_id New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to
     *                              get all allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified,
     *                              the current icon will be kept
     *
     * @return stdClass
     */
    public function editForumTopic ( int|string $chat_id, int $message_thread_id, ?string $name = NULL, ?string $icon_custom_emoji_id = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'message_thread_id' => $message_thread_id ]; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $icon_custom_emoji_id !== NULL ) $args['icon_custom_emoji_id'] = $icon_custom_emoji_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator
     * in the chat for this to work and must have the can_manage_topics administrator rights, unless it is
     * the creator of the topic. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#closeForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     *
     * @return stdClass
     */
    public function closeForumTopic ( int|string $chat_id, int $message_thread_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'message_thread_id' => $message_thread_id ] );
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an
     * administrator in the chat for this to work and must have the can_manage_topics administrator rights,
     * unless it is the creator of the topic. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#reopenForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     *
     * @return stdClass
     */
    public function reopenForumTopic ( int|string $chat_id, int $message_thread_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'message_thread_id' => $message_thread_id ] );
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The
     * bot must be an administrator in the chat for this to work and must have the can_delete_messages
     * administrator rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     *
     * @return stdClass
     */
    public function deleteForumTopic ( int|string $chat_id, int $message_thread_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'message_thread_id' => $message_thread_id ] );
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic. The bot must be an
     * administrator in the chat for this to work and must have the can_pin_messages administrator right in
     * the supergroup. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#unpinAllForumTopicMessages
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     *
     * @return stdClass
     */
    public function unpinAllForumTopicMessages ( int|string $chat_id, int $message_thread_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'message_thread_id' => $message_thread_id ] );
    }

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be
     * an administrator in the chat for this to work and must have the can_manage_topics administrator
     * rights. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#editGeneralForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param string $name New topic name, 1-128 characters
     *
     * @return stdClass
     */
    public function editGeneralForumTopic ( int|string $chat_id, string $name ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'name' => $name ] );
    }

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an
     * administrator in the chat for this to work and must have the can_manage_topics administrator rights.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#closeGeneralForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return stdClass
     */
    public function closeGeneralForumTopic ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an
     * administrator in the chat for this to work and must have the can_manage_topics administrator rights.
     * The topic will be automatically unhidden if it was hidden. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#reopenGeneralForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return stdClass
     */
    public function reopenGeneralForumTopic ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an
     * administrator in the chat for this to work and must have the can_manage_topics administrator rights.
     * The topic will be automatically closed if it was open. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#hideGeneralForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return stdClass
     */
    public function hideGeneralForumTopic ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an
     * administrator in the chat for this to work and must have the can_manage_topics administrator rights.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#unhideGeneralForumTopic
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return stdClass
     */
    public function unhideGeneralForumTopic ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an
     * administrator in the chat for this to work and must have the can_pin_messages administrator right in
     * the supergroup. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#unpinAllGeneralForumTopicMessages
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     *
     * @return stdClass
     */
    public function unpinAllGeneralForumTopicMessages ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be
     * displayed to the user as a notification at the top of the chat screen or as an alert. On success,
     * True is returned.
     * 
     * @see https://core.telegram.org/bots/api#answerCallbackQuery
     *
     * @param string $callback_query_id Unique identifier for the query to be answered
     * @param string|NULL $text Text of the notification. If not specified, nothing will be shown to the user, 0-200 characters
     * @param bool|NULL $show_alert If True, an alert will be shown by the client instead of a notification at the top of the chat
     *                              screen. Defaults to false.
     * @param string|NULL $url URL that will be opened by the user's client. If you have created a Game and accepted the conditions
     *                              via @BotFather, specify the URL that opens your game - note that this will only work if the query
     *                              comes from a callback_game button.Otherwise, you may use links like t.me/your_bot?start=XXXX that
     *                              open your bot with a parameter.
     * @param int|NULL $cache_time The maximum amount of time in seconds that the result of the callback query may be cached
     *                              client-side. Telegram apps will support caching starting in version 3.14. Defaults to 0.
     *
     * @return stdClass
     */
    public function answerCallbackQuery ( string $callback_query_id, ?string $text = NULL, ?bool $show_alert = NULL, ?string $url = NULL, ?int $cache_time = NULL ) : stdClass {
      $args = [ 'callback_query_id' => $callback_query_id ]; 
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $show_alert !== NULL ) $args['show_alert'] = $show_alert;
      if ( $url !== NULL ) $args['url'] = $url;
      if ( $cache_time !== NULL ) $args['cache_time'] = $cache_time;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights
     * in the chat. Returns a UserChatBoosts object.
     * 
     * @see https://core.telegram.org/bots/api#getUserChatBoosts
     *
     * @param int|string $chat_id Unique identifier for the chat or username of the channel (in the format @channelusername)
     * @param int $user_id Unique identifier of the target user
     *
     * @return stdClass
     */
    public function getUserChatBoosts ( int|string $chat_id, int $user_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'user_id' => $user_id ] );
    }

    /**
     * Use this method to get information about the connection of the bot with a business account. Returns
     * a BusinessConnection object on success.
     * 
     * @see https://core.telegram.org/bots/api#getBusinessConnection
     *
     * @param string $business_connection_id Unique identifier of the business connection
     *
     * @return stdClass
     */
    public function getBusinessConnection ( string $business_connection_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id ] );
    }

    /**
     * Use this method to change the list of the bot's commands. See this manual for more details about bot
     * commands. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setMyCommands
     *
     * @param BotCommand[] $commands A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most 100
     *                              commands can be specified.
     * @param BotCommandScope|NULL $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to
     *                              BotCommandScopeDefault.
     * @param string|NULL $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given
     *                              scope, for whose language there are no dedicated commands
     *
     * @return stdClass
     */
    public function setMyCommands ( array $commands, ?array $scope = NULL, ?string $language_code = NULL ) : stdClass {
      $args = [ 'commands' => json_encode( $commands ) ]; 
      if ( $scope !== NULL ) $args['scope'] = json_encode( $scope );
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language.
     * After deletion, higher level commands will be shown to affected users. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteMyCommands
     *
     * @param BotCommandScope|NULL $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to
     *                              BotCommandScopeDefault.
     * @param string|NULL $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given
     *                              scope, for whose language there are no dedicated commands
     *
     * @return stdClass
     */
    public function deleteMyCommands ( ?array $scope = NULL, ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $scope !== NULL ) $args['scope'] = json_encode( $scope );
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language.
     * Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
     * 
     * @see https://core.telegram.org/bots/api#getMyCommands
     *
     * @param BotCommandScope|NULL $scope A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
     * @param string|NULL $language_code A two-letter ISO 639-1 language code or an empty string
     *
     * @return stdClass
     */
    public function getMyCommands ( ?array $scope = NULL, ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $scope !== NULL ) $args['scope'] = json_encode( $scope );
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the bot's name. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setMyName
     *
     * @param string|NULL $name New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
     * @param string|NULL $language_code A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for whose
     *                              language there is no dedicated name.
     *
     * @return stdClass
     */
    public function setMyName ( ?string $name = NULL, ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $name !== NULL ) $args['name'] = $name;
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the current bot name for the given user language. Returns BotName on success.
     * 
     * @see https://core.telegram.org/bots/api#getMyName
     *
     * @param string|NULL $language_code A two-letter ISO 639-1 language code or an empty string
     *
     * @return stdClass
     */
    public function getMyName ( ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat
     * is empty. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setMyDescription
     *
     * @param string|NULL $description New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for
     *                              the given language.
     * @param string|NULL $language_code A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for
     *                              whose language there is no dedicated description.
     *
     * @return stdClass
     */
    public function setMyDescription ( ?string $description = NULL, ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $description !== NULL ) $args['description'] = $description;
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the current bot description for the given user language. Returns
     * BotDescription on success.
     * 
     * @see https://core.telegram.org/bots/api#getMyDescription
     *
     * @param string|NULL $language_code A two-letter ISO 639-1 language code or an empty string
     *
     * @return stdClass
     */
    public function getMyDescription ( ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and
     * is sent together with the link when users share the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setMyShortDescription
     *
     * @param string|NULL $short_description New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated
     *                              short description for the given language.
     * @param string|NULL $language_code A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users
     *                              for whose language there is no dedicated short description.
     *
     * @return stdClass
     */
    public function setMyShortDescription ( ?string $short_description = NULL, ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $short_description !== NULL ) $args['short_description'] = $short_description;
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the current bot short description for the given user language. Returns
     * BotShortDescription on success.
     * 
     * @see https://core.telegram.org/bots/api#getMyShortDescription
     *
     * @param string|NULL $language_code A two-letter ISO 639-1 language code or an empty string
     *
     * @return stdClass
     */
    public function getMyShortDescription ( ?string $language_code = NULL ) : stdClass {
      $args = []; 
      if ( $language_code !== NULL ) $args['language_code'] = $language_code;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setChatMenuButton
     *
     * @param int|NULL $chat_id Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
     * @param MenuButton|NULL $menu_button A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
     *
     * @return stdClass
     */
    public function setChatMenuButton ( ?int $chat_id = NULL, ?array $menu_button = NULL ) : stdClass {
      $args = []; 
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $menu_button !== NULL ) $args['menu_button'] = json_encode( $menu_button );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default
     * menu button. Returns MenuButton on success.
     * 
     * @see https://core.telegram.org/bots/api#getChatMenuButton
     *
     * @param int|NULL $chat_id Unique identifier for the target private chat. If not specified, default bot's menu button will be returned
     *
     * @return stdClass
     */
    public function getChatMenuButton ( ?int $chat_id = NULL ) : stdClass {
      $args = []; 
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as
     * an administrator to groups or channels. These rights will be suggested to users, but they are free
     * to modify the list before adding the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setMyDefaultAdministratorRights
     *
     * @param ChatAdministratorRights|NULL $rights A JSON-serialized object describing new default administrator rights. If not specified, the default
     *                              administrator rights will be cleared.
     * @param bool|NULL $for_channels Pass True to change the default administrator rights of the bot in channels. Otherwise, the default
     *                              administrator rights of the bot for groups and supergroups will be changed.
     *
     * @return stdClass
     */
    public function setMyDefaultAdministratorRights ( ?array $rights = NULL, ?bool $for_channels = NULL ) : stdClass {
      $args = []; 
      if ( $rights !== NULL ) $args['rights'] = json_encode( $rights );
      if ( $for_channels !== NULL ) $args['for_channels'] = $for_channels;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get the current default administrator rights of the bot. Returns
     * ChatAdministratorRights on success.
     * 
     * @see https://core.telegram.org/bots/api#getMyDefaultAdministratorRights
     *
     * @param bool|NULL $for_channels Pass True to get default administrator rights of the bot in channels. Otherwise, default
     *                              administrator rights of the bot for groups and supergroups will be returned.
     *
     * @return stdClass
     */
    public function getMyDefaultAdministratorRights ( ?bool $for_channels = NULL ) : stdClass {
      $args = []; 
      if ( $for_channels !== NULL ) $args['for_channels'] = $for_channels;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit text and game messages. On success, if the edited message is not an inline
     * message, the edited Message is returned, otherwise True is returned. Note that business messages
     * that were not sent by the bot and do not contain an inline keyboard can only be edited within 48
     * hours from the time they were sent.
     * 
     * @see https://core.telegram.org/bots/api#editMessageText
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of
     *                              the target channel (in the format @channelusername)
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param string $text New text of the message, 1-4096 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the message text. See formatting options for more details.
     * @param MessageEntity[]|NULL $entities A JSON-serialized list of special entities that appear in message text, which can be specified
     *                              instead of parse_mode
     * @param LinkPreviewOptions|NULL $link_preview_options Link preview generation options for the message
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for an inline keyboard.
     *
     * @return stdClass
     */
    public function editMessageText ( string $text, ?string $business_connection_id = NULL, int|string|null $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL, ?string $parse_mode = NULL, ?array $entities = NULL, ?array $link_preview_options = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'text' => $text ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $entities !== NULL ) $args['entities'] = json_encode( $entities );
      if ( $link_preview_options !== NULL ) $args['link_preview_options'] = json_encode( $link_preview_options );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit captions of messages. On success, if the edited message is not an inline
     * message, the edited Message is returned, otherwise True is returned. Note that business messages
     * that were not sent by the bot and do not contain an inline keyboard can only be edited within 48
     * hours from the time they were sent.
     * 
     * @see https://core.telegram.org/bots/api#editMessageCaption
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of
     *                              the target channel (in the format @channelusername)
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param string|NULL $caption New caption of the message, 0-1024 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the message caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param bool|NULL $show_caption_above_media Pass True, if the caption must be shown above the message media. Supported only for animation, photo
     *                              and video messages.
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for an inline keyboard.
     *
     * @return stdClass
     */
    public function editMessageCaption ( ?string $business_connection_id = NULL, int|string|null $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?bool $show_caption_above_media = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = []; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $show_caption_above_media !== NULL ) $args['show_caption_above_media'] = $show_caption_above_media;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages, or to add media to
     * text messages. If a message is part of a message album, then it can be edited only to an audio for
     * audio albums, only to a document for document albums and to a photo or a video otherwise. When an
     * inline message is edited, a new file can't be uploaded; use a previously uploaded file via its
     * file_id or specify a URL. On success, if the edited message is not an inline message, the edited
     * Message is returned, otherwise True is returned. Note that business messages that were not sent by
     * the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they
     * were sent.
     * 
     * @see https://core.telegram.org/bots/api#editMessageMedia
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of
     *                              the target channel (in the format @channelusername)
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InputMedia $media A JSON-serialized object for a new media content of the message
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for a new inline keyboard.
     *
     * @return stdClass
     */
    public function editMessageMedia ( array $media, ?string $business_connection_id = NULL, int|string|null $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'media' => json_encode( $media ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit live location messages. A location can be edited until its live_period
     * expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the
     * edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * 
     * @see https://core.telegram.org/bots/api#editMessageLiveLocation
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of
     *                              the target channel (in the format @channelusername)
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param float $latitude Latitude of new location
     * @param float $longitude Longitude of new location
     * @param int|NULL $live_period New period in seconds during which the location can be updated, starting from the message send date.
     *                              If 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must
     *                              not exceed the current live_period by more than a day, and the live location expiration date must
     *                              remain within the next 90 days. If not specified, then live_period remains unchanged
     * @param float|NULL $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|NULL $heading Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     * @param int|NULL $proximity_alert_radius The maximum distance for proximity alerts about approaching another chat member, in meters. Must be
     *                              between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for a new inline keyboard.
     *
     * @return stdClass
     */
    public function editMessageLiveLocation ( array $latitude, array $longitude, ?string $business_connection_id = NULL, int|string|null $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL, ?int $live_period = NULL, ?array $horizontal_accuracy = NULL, ?int $heading = NULL, ?int $proximity_alert_radius = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'latitude' => json_encode( $latitude ), 'longitude' => json_encode( $longitude ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $live_period !== NULL ) $args['live_period'] = $live_period;
      if ( $horizontal_accuracy !== NULL ) $args['horizontal_accuracy'] = json_encode( $horizontal_accuracy );
      if ( $heading !== NULL ) $args['heading'] = $heading;
      if ( $proximity_alert_radius !== NULL ) $args['proximity_alert_radius'] = $proximity_alert_radius;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to stop updating a live location message before live_period expires. On success, if
     * the message is not an inline message, the edited Message is returned, otherwise True is returned.
     * 
     * @see https://core.telegram.org/bots/api#stopMessageLiveLocation
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of
     *                              the target channel (in the format @channelusername)
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the message with live location to stop
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for a new inline keyboard.
     *
     * @return stdClass
     */
    public function stopMessageLiveLocation ( ?string $business_connection_id = NULL, int|string|null $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = []; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not
     * an inline message, the edited Message is returned, otherwise True is returned. Note that business
     * messages that were not sent by the bot and do not contain an inline keyboard can only be edited
     * within 48 hours from the time they were sent.
     * 
     * @see https://core.telegram.org/bots/api#editMessageReplyMarkup
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username of
     *                              the target channel (in the format @channelusername)
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for an inline keyboard.
     *
     * @return stdClass
     */
    public function editMessageReplyMarkup ( ?string $business_connection_id = NULL, int|string|null $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = []; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
     * 
     * @see https://core.telegram.org/bots/api#stopPoll
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message to be edited was sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $message_id Identifier of the original message with the poll
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for a new message inline keyboard.
     *
     * @return stdClass
     */
    public function stopPoll ( int|string $chat_id, int $message_id, ?string $business_connection_id = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'message_id' => $message_id ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to delete a message, including service messages, with the following limitations:- A
     * message can only be deleted if it was sent less than 48 hours ago.- Service messages about a
     * supergroup, channel, or forum topic creation can't be deleted.- A dice message in a private chat can
     * only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages in private
     * chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted
     * can_post_messages permissions can delete outgoing messages in channels.- If the bot is an
     * administrator of a group, it can delete any message there.- If the bot has can_delete_messages
     * permission in a supergroup or a channel, it can delete any message there.Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteMessage
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int $message_id Identifier of the message to delete
     *
     * @return stdClass
     */
    public function deleteMessage ( int|string $chat_id, int $message_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'message_id' => $message_id ] );
    }

    /**
     * Use this method to delete multiple messages simultaneously. If some of the specified messages can't
     * be found, they are skipped. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteMessages
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. See deleteMessage for limitations
     *                              on which messages can be deleted
     *
     * @return stdClass
     */
    public function deleteMessages ( int|string $chat_id, array $message_ids ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id, 'message_ids' => json_encode( $message_ids ) ] );
    }

    /**
     * Returns the list of gifts that can be sent by the bot to users and channel chats. Requires no
     * parameters. Returns a Gifts object.
     * 
     * @see https://core.telegram.org/bots/api#getAvailableGifts
     *
     *
     * @return stdClass
     */
    public function getAvailableGifts ( ) : stdClass {
      return $this->Request( __FUNCTION__, [] );
    }

    /**
     * Sends a gift to the given user or channel chat. The gift can't be converted to Telegram Stars by the
     * receiver. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#sendGift
     *
     * @param int|NULL $user_id Required if chat_id is not specified. Unique identifier of the target user who will receive the gift.
     * @param int|string|NULL $chat_id Required if user_id is not specified. Unique identifier for the chat or username of the channel (in
     *                              the format @channelusername) that will receive the gift.
     * @param string $gift_id Identifier of the gift
     * @param bool|NULL $pay_for_upgrade Pass True to pay for the gift upgrade from the bot's balance, thereby making the upgrade free for
     *                              the receiver
     * @param string|NULL $text Text that will be shown along with the gift; 0-128 characters
     * @param string|NULL $text_parse_mode Mode for parsing entities in the text. See formatting options for more details. Entities other than
     *                              “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and
     *                              “custom_emoji” are ignored.
     * @param MessageEntity[]|NULL $text_entities A JSON-serialized list of special entities that appear in the gift text. It can be specified instead
     *                              of text_parse_mode. Entities other than “bold”, “italic”, “underline”,
     *                              “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
     *
     * @return stdClass
     */
    public function sendGift ( string $gift_id, ?int $user_id = NULL, int|string|null $chat_id = NULL, ?bool $pay_for_upgrade = NULL, ?string $text = NULL, ?string $text_parse_mode = NULL, ?array $text_entities = NULL ) : stdClass {
      $args = [ 'gift_id' => $gift_id ]; 
      if ( $user_id !== NULL ) $args['user_id'] = $user_id;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $pay_for_upgrade !== NULL ) $args['pay_for_upgrade'] = $pay_for_upgrade;
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $text_parse_mode !== NULL ) $args['text_parse_mode'] = $text_parse_mode;
      if ( $text_entities !== NULL ) $args['text_entities'] = json_encode( $text_entities );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Gifts a Telegram Premium subscription to the given user. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#giftPremiumSubscription
     *
     * @param int $user_id Unique identifier of the target user who will receive a Telegram Premium subscription
     * @param int $month_count Number of months the Telegram Premium subscription will be active for the user; must be one of 3, 6,
     *                              or 12
     * @param int $star_count Number of Telegram Stars to pay for the Telegram Premium subscription; must be 1000 for 3 months,
     *                              1500 for 6 months, and 2500 for 12 months
     * @param string|NULL $text Text that will be shown along with the service message about the subscription; 0-128 characters
     * @param string|NULL $text_parse_mode Mode for parsing entities in the text. See formatting options for more details. Entities other than
     *                              “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and
     *                              “custom_emoji” are ignored.
     * @param MessageEntity[]|NULL $text_entities A JSON-serialized list of special entities that appear in the gift text. It can be specified instead
     *                              of text_parse_mode. Entities other than “bold”, “italic”, “underline”,
     *                              “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
     *
     * @return stdClass
     */
    public function giftPremiumSubscription ( int $user_id, int $month_count, int $star_count, ?string $text = NULL, ?string $text_parse_mode = NULL, ?array $text_entities = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id, 'month_count' => $month_count, 'star_count' => $star_count ]; 
      if ( $text !== NULL ) $args['text'] = $text;
      if ( $text_parse_mode !== NULL ) $args['text_parse_mode'] = $text_parse_mode;
      if ( $text_entities !== NULL ) $args['text_entities'] = json_encode( $text_entities );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Verifies a user on behalf of the organization which is represented by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#verifyUser
     *
     * @param int $user_id Unique identifier of the target user
     * @param string|NULL $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization isn't
     *                              allowed to provide a custom verification description.
     *
     * @return stdClass
     */
    public function verifyUser ( int $user_id, ?string $custom_description = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id ]; 
      if ( $custom_description !== NULL ) $args['custom_description'] = $custom_description;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Verifies a chat on behalf of the organization which is represented by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#verifyChat
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param string|NULL $custom_description Custom description for the verification; 0-70 characters. Must be empty if the organization isn't
     *                              allowed to provide a custom verification description.
     *
     * @return stdClass
     */
    public function verifyChat ( int|string $chat_id, ?string $custom_description = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id ]; 
      if ( $custom_description !== NULL ) $args['custom_description'] = $custom_description;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Removes verification from a user who is currently verified on behalf of the organization represented
     * by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#removeUserVerification
     *
     * @param int $user_id Unique identifier of the target user
     *
     * @return stdClass
     */
    public function removeUserVerification ( int $user_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id ] );
    }

    /**
     * Removes verification from a chat that is currently verified on behalf of the organization
     * represented by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#removeChatVerification
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     *
     * @return stdClass
     */
    public function removeChatVerification ( int|string $chat_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'chat_id' => $chat_id ] );
    }

    /**
     * Marks incoming message as read on behalf of a business account. Requires the can_read_messages
     * business bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#readBusinessMessage
     *
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which to read the message
     * @param int $chat_id Unique identifier of the chat in which the message was received. The chat must have been active in
     *                              the last 24 hours.
     * @param int $message_id Unique identifier of the message to mark as read
     *
     * @return stdClass
     */
    public function readBusinessMessage ( string $business_connection_id, int $chat_id, int $message_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id, 'chat_id' => $chat_id, 'message_id' => $message_id ] );
    }

    /**
     * Delete messages on behalf of a business account. Requires the can_delete_outgoing_messages business
     * bot right to delete messages sent by the bot itself, or the can_delete_all_messages business bot
     * right to delete any message. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteBusinessMessages
     *
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which to delete the messages
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. All messages must be from the
     *                              same chat. See deleteMessage for limitations on which messages can be deleted
     *
     * @return stdClass
     */
    public function deleteBusinessMessages ( string $business_connection_id, array $message_ids ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id, 'message_ids' => json_encode( $message_ids ) ] );
    }

    /**
     * Changes the first and last name of a managed business account. Requires the can_change_name business
     * bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setBusinessAccountName
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $first_name The new value of the first name for the business account; 1-64 characters
     * @param string|NULL $last_name The new value of the last name for the business account; 0-64 characters
     *
     * @return stdClass
     */
    public function setBusinessAccountName ( string $business_connection_id, string $first_name, ?string $last_name = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id, 'first_name' => $first_name ]; 
      if ( $last_name !== NULL ) $args['last_name'] = $last_name;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Changes the username of a managed business account. Requires the can_change_username business bot
     * right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setBusinessAccountUsername
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string|NULL $username The new value of the username for the business account; 0-32 characters
     *
     * @return stdClass
     */
    public function setBusinessAccountUsername ( string $business_connection_id, ?string $username = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id ]; 
      if ( $username !== NULL ) $args['username'] = $username;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Changes the bio of a managed business account. Requires the can_change_bio business bot right.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setBusinessAccountBio
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string|NULL $bio The new value of the bio for the business account; 0-140 characters
     *
     * @return stdClass
     */
    public function setBusinessAccountBio ( string $business_connection_id, ?string $bio = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id ]; 
      if ( $bio !== NULL ) $args['bio'] = $bio;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Changes the profile photo of a managed business account. Requires the can_edit_profile_photo
     * business bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setBusinessAccountProfilePhoto
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param InputProfilePhoto $photo The new profile photo to set
     * @param bool|NULL $is_public Pass True to set the public photo, which will be visible even if the main photo is hidden by the
     *                              business account's privacy settings. An account can have only one public photo.
     *
     * @return stdClass
     */
    public function setBusinessAccountProfilePhoto ( string $business_connection_id, array $photo, ?bool $is_public = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id, 'photo' => json_encode( $photo ) ]; 
      if ( $is_public !== NULL ) $args['is_public'] = $is_public;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Removes the current profile photo of a managed business account. Requires the can_edit_profile_photo
     * business bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#removeBusinessAccountProfilePhoto
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param bool|NULL $is_public Pass True to remove the public photo, which is visible even if the main photo is hidden by the
     *                              business account's privacy settings. After the main photo is removed, the previous profile photo (if
     *                              present) becomes the main photo.
     *
     * @return stdClass
     */
    public function removeBusinessAccountProfilePhoto ( string $business_connection_id, ?bool $is_public = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id ]; 
      if ( $is_public !== NULL ) $args['is_public'] = $is_public;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Changes the privacy settings pertaining to incoming gifts in a managed business account. Requires
     * the can_change_gift_settings business bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setBusinessAccountGiftSettings
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param bool $show_gift_button Pass True, if a button for sending a gift to the user or by the business account must always be
     *                              shown in the input field
     * @param AcceptedGiftTypes $accepted_gift_types Types of gifts accepted by the business account
     *
     * @return stdClass
     */
    public function setBusinessAccountGiftSettings ( string $business_connection_id, bool $show_gift_button, array $accepted_gift_types ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id, 'show_gift_button' => $show_gift_button, 'accepted_gift_types' => json_encode( $accepted_gift_types ) ] );
    }

    /**
     * Returns the amount of Telegram Stars owned by a managed business account. Requires the
     * can_view_gifts_and_stars business bot right. Returns StarAmount on success.
     * 
     * @see https://core.telegram.org/bots/api#getBusinessAccountStarBalance
     *
     * @param string $business_connection_id Unique identifier of the business connection
     *
     * @return stdClass
     */
    public function getBusinessAccountStarBalance ( string $business_connection_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id ] );
    }

    /**
     * Transfers Telegram Stars from the business account balance to the bot's balance. Requires the
     * can_transfer_stars business bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#transferBusinessAccountStars
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param int $star_count Number of Telegram Stars to transfer; 1-10000
     *
     * @return stdClass
     */
    public function transferBusinessAccountStars ( string $business_connection_id, int $star_count ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id, 'star_count' => $star_count ] );
    }

    /**
     * Returns the gifts received and owned by a managed business account. Requires the
     * can_view_gifts_and_stars business bot right. Returns OwnedGifts on success.
     * 
     * @see https://core.telegram.org/bots/api#getBusinessAccountGifts
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param bool|NULL $exclude_unsaved Pass True to exclude gifts that aren't saved to the account's profile page
     * @param bool|NULL $exclude_saved Pass True to exclude gifts that are saved to the account's profile page
     * @param bool|NULL $exclude_unlimited Pass True to exclude gifts that can be purchased an unlimited number of times
     * @param bool|NULL $exclude_limited Pass True to exclude gifts that can be purchased a limited number of times
     * @param bool|NULL $exclude_unique Pass True to exclude unique gifts
     * @param bool|NULL $sort_by_price Pass True to sort results by gift price instead of send date. Sorting is applied before pagination.
     * @param string|NULL $offset Offset of the first entry to return as received from the previous request; use empty string to get
     *                              the first chunk of results
     * @param int|NULL $limit The maximum number of gifts to be returned; 1-100. Defaults to 100
     *
     * @return stdClass
     */
    public function getBusinessAccountGifts ( string $business_connection_id, ?bool $exclude_unsaved = NULL, ?bool $exclude_saved = NULL, ?bool $exclude_unlimited = NULL, ?bool $exclude_limited = NULL, ?bool $exclude_unique = NULL, ?bool $sort_by_price = NULL, ?string $offset = NULL, ?int $limit = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id ]; 
      if ( $exclude_unsaved !== NULL ) $args['exclude_unsaved'] = $exclude_unsaved;
      if ( $exclude_saved !== NULL ) $args['exclude_saved'] = $exclude_saved;
      if ( $exclude_unlimited !== NULL ) $args['exclude_unlimited'] = $exclude_unlimited;
      if ( $exclude_limited !== NULL ) $args['exclude_limited'] = $exclude_limited;
      if ( $exclude_unique !== NULL ) $args['exclude_unique'] = $exclude_unique;
      if ( $sort_by_price !== NULL ) $args['sort_by_price'] = $sort_by_price;
      if ( $offset !== NULL ) $args['offset'] = $offset;
      if ( $limit !== NULL ) $args['limit'] = $limit;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Converts a given regular gift to Telegram Stars. Requires the can_convert_gifts_to_stars business
     * bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#convertGiftToStars
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id Unique identifier of the regular gift that should be converted to Telegram Stars
     *
     * @return stdClass
     */
    public function convertGiftToStars ( string $business_connection_id, string $owned_gift_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id, 'owned_gift_id' => $owned_gift_id ] );
    }

    /**
     * Upgrades a given regular gift to a unique gift. Requires the can_transfer_and_upgrade_gifts business
     * bot right. Additionally requires the can_transfer_stars business bot right if the upgrade is paid.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#upgradeGift
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id Unique identifier of the regular gift that should be upgraded to a unique one
     * @param bool|NULL $keep_original_details Pass True to keep the original gift text, sender and receiver in the upgraded gift
     * @param int|NULL $star_count The amount of Telegram Stars that will be paid for the upgrade from the business account balance. If
     *                              gift.prepaid_upgrade_star_count > 0, then pass 0, otherwise, the can_transfer_stars business bot
     *                              right is required and gift.upgrade_star_count must be passed.
     *
     * @return stdClass
     */
    public function upgradeGift ( string $business_connection_id, string $owned_gift_id, ?bool $keep_original_details = NULL, ?int $star_count = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id, 'owned_gift_id' => $owned_gift_id ]; 
      if ( $keep_original_details !== NULL ) $args['keep_original_details'] = $keep_original_details;
      if ( $star_count !== NULL ) $args['star_count'] = $star_count;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Transfers an owned unique gift to another user. Requires the can_transfer_and_upgrade_gifts business
     * bot right. Requires can_transfer_stars business bot right if the transfer is paid. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#transferGift
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id Unique identifier of the regular gift that should be transferred
     * @param int $new_owner_chat_id Unique identifier of the chat which will own the gift. The chat must be active in the last 24 hours.
     * @param int|NULL $star_count The amount of Telegram Stars that will be paid for the transfer from the business account balance.
     *                              If positive, then the can_transfer_stars business bot right is required.
     *
     * @return stdClass
     */
    public function transferGift ( string $business_connection_id, string $owned_gift_id, int $new_owner_chat_id, ?int $star_count = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id, 'owned_gift_id' => $owned_gift_id, 'new_owner_chat_id' => $new_owner_chat_id ]; 
      if ( $star_count !== NULL ) $args['star_count'] = $star_count;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Posts a story on behalf of a managed business account. Requires the can_manage_stories business bot
     * right. Returns Story on success.
     * 
     * @see https://core.telegram.org/bots/api#postStory
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param InputStoryContent $content Content of the story
     * @param int $active_period Period after which the story is moved to the archive, in seconds; must be one of 6 * 3600, 12 *
     *                              3600, 86400, or 2 * 86400
     * @param string|NULL $caption Caption of the story, 0-2048 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the story caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param StoryArea[]|NULL $areas A JSON-serialized list of clickable areas to be shown on the story
     * @param bool|NULL $post_to_chat_page Pass True to keep the story accessible after it expires
     * @param bool|NULL $protect_content Pass True if the content of the story must be protected from forwarding and screenshotting
     *
     * @return stdClass
     */
    public function postStory ( string $business_connection_id, array $content, int $active_period, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?array $areas = NULL, ?bool $post_to_chat_page = NULL, ?bool $protect_content = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id, 'content' => json_encode( $content ), 'active_period' => $active_period ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $areas !== NULL ) $args['areas'] = json_encode( $areas );
      if ( $post_to_chat_page !== NULL ) $args['post_to_chat_page'] = $post_to_chat_page;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Edits a story previously posted by the bot on behalf of a managed business account. Requires the
     * can_manage_stories business bot right. Returns Story on success.
     * 
     * @see https://core.telegram.org/bots/api#editStory
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param int $story_id Unique identifier of the story to edit
     * @param InputStoryContent $content Content of the story
     * @param string|NULL $caption Caption of the story, 0-2048 characters after entities parsing
     * @param string|NULL $parse_mode Mode for parsing entities in the story caption. See formatting options for more details.
     * @param MessageEntity[]|NULL $caption_entities A JSON-serialized list of special entities that appear in the caption, which can be specified
     *                              instead of parse_mode
     * @param StoryArea[]|NULL $areas A JSON-serialized list of clickable areas to be shown on the story
     *
     * @return stdClass
     */
    public function editStory ( string $business_connection_id, int $story_id, array $content, ?string $caption = NULL, ?string $parse_mode = NULL, ?array $caption_entities = NULL, ?array $areas = NULL ) : stdClass {
      $args = [ 'business_connection_id' => $business_connection_id, 'story_id' => $story_id, 'content' => json_encode( $content ) ]; 
      if ( $caption !== NULL ) $args['caption'] = $caption;
      if ( $parse_mode !== NULL ) $args['parse_mode'] = $parse_mode;
      if ( $caption_entities !== NULL ) $args['caption_entities'] = json_encode( $caption_entities );
      if ( $areas !== NULL ) $args['areas'] = json_encode( $areas );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Deletes a story previously posted by the bot on behalf of a managed business account. Requires the
     * can_manage_stories business bot right. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteStory
     *
     * @param string $business_connection_id Unique identifier of the business connection
     * @param int $story_id Unique identifier of the story to delete
     *
     * @return stdClass
     */
    public function deleteStory ( string $business_connection_id, int $story_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'business_connection_id' => $business_connection_id, 'story_id' => $story_id ] );
    }

    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent
     * Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendSticker
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param InputFile|string $sticker Sticker to send. Pass a file_id as String to send a file that exists on the Telegram servers
     *                              (recommended), pass an HTTP URL as a String for Telegram to get a .WEBP sticker from the Internet,
     *                              or upload a new .WEBP, .TGS, or .WEBM sticker using multipart/form-data. More information on Sending
     *                              Files ». Video and animated stickers can't be sent via an HTTP URL.
     * @param string|NULL $emoji Emoji associated with the sticker; only for just uploaded stickers
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|NULL $reply_markup Additional interface options. A JSON-serialized object for an inline keyboard, custom reply
     *                              keyboard, instructions to remove a reply keyboard or to force a reply from the user
     *
     * @return stdClass
     */
    public function sendSticker ( int|string $chat_id, CURLFile|string $sticker, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?string $emoji = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'sticker' => $sticker ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $emoji !== NULL ) $args['emoji'] = $emoji;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     * 
     * @see https://core.telegram.org/bots/api#getStickerSet
     *
     * @param string $name Name of the sticker set
     *
     * @return stdClass
     */
    public function getStickerSet ( string $name ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'name' => $name ] );
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an
     * Array of Sticker objects.
     * 
     * @see https://core.telegram.org/bots/api#getCustomEmojiStickers
     *
     * @param string[] $custom_emoji_ids A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers can be specified.
     *
     * @return stdClass
     */
    public function getCustomEmojiStickers ( array $custom_emoji_ids ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'custom_emoji_ids' => json_encode( $custom_emoji_ids ) ] );
    }

    /**
     * Use this method to upload a file with a sticker for later use in the createNewStickerSet,
     * addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the
     * uploaded File on success.
     * 
     * @see https://core.telegram.org/bots/api#uploadStickerFile
     *
     * @param int $user_id User identifier of sticker file owner
     * @param InputFile $sticker A file with the sticker in .WEBP, .PNG, .TGS, or .WEBM format. See
     *                              https://core.telegram.org/stickers for technical requirements. More information on Sending Files »
     * @param string $sticker_format Format of the sticker, must be one of “static”, “animated”, “video”
     *
     * @return stdClass
     */
    public function uploadStickerFile ( int $user_id, CURLFile $sticker, string $sticker_format ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id, 'sticker' => $sticker, 'sticker_format' => $sticker_format ] );
    }

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the
     * sticker set thus created. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#createNewStickerSet
     *
     * @param int $user_id User identifier of created sticker set owner
     * @param string $name Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only
     *                              English letters, digits and underscores. Must begin with a letter, can't contain consecutive
     *                              underscores and must end in "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters.
     * @param string $title Sticker set title, 1-64 characters
     * @param InputSticker[] $stickers A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
     * @param string|NULL $sticker_type Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a
     *                              regular sticker set is created.
     * @param bool|NULL $needs_repainting Pass True if stickers in the sticker set must be repainted to the color of text when used in
     *                              messages, the accent color if used as emoji status, white on chat photos, or another appropriate
     *                              color based on context; for custom emoji sticker sets only
     *
     * @return stdClass
     */
    public function createNewStickerSet ( int $user_id, string $name, string $title, array $stickers, ?string $sticker_type = NULL, ?bool $needs_repainting = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id, 'name' => $name, 'title' => $title, 'stickers' => json_encode( $stickers ) ]; 
      if ( $sticker_type !== NULL ) $args['sticker_type'] = $sticker_type;
      if ( $needs_repainting !== NULL ) $args['needs_repainting'] = $needs_repainting;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to
     * 200 stickers. Other sticker sets can have up to 120 stickers. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#addStickerToSet
     *
     * @param int $user_id User identifier of sticker set owner
     * @param string $name Sticker set name
     * @param InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker had
     *                              already been added to the set, then the set isn't changed.
     *
     * @return stdClass
     */
    public function addStickerToSet ( int $user_id, string $name, array $sticker ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id, 'name' => $name, 'sticker' => json_encode( $sticker ) ] );
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position. Returns True
     * on success.
     * 
     * @see https://core.telegram.org/bots/api#setStickerPositionInSet
     *
     * @param string $sticker File identifier of the sticker
     * @param int $position New sticker position in the set, zero-based
     *
     * @return stdClass
     */
    public function setStickerPositionInSet ( string $sticker, int $position ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'sticker' => $sticker, 'position' => $position ] );
    }

    /**
     * Use this method to delete a sticker from a set created by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteStickerFromSet
     *
     * @param string $sticker File identifier of the sticker
     *
     * @return stdClass
     */
    public function deleteStickerFromSet ( string $sticker ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'sticker' => $sticker ] );
    }

    /**
     * Use this method to replace an existing sticker in a sticker set with a new one. The method is
     * equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet.
     * Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#replaceStickerInSet
     *
     * @param int $user_id User identifier of the sticker set owner
     * @param string $name Sticker set name
     * @param string $old_sticker File identifier of the replaced sticker
     * @param InputSticker $sticker A JSON-serialized object with information about the added sticker. If exactly the same sticker had
     *                              already been added to the set, then the set remains unchanged.
     *
     * @return stdClass
     */
    public function replaceStickerInSet ( int $user_id, string $name, string $old_sticker, array $sticker ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id, 'name' => $name, 'old_sticker' => $old_sticker, 'sticker' => json_encode( $sticker ) ] );
    }

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The
     * sticker must belong to a sticker set created by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setStickerEmojiList
     *
     * @param string $sticker File identifier of the sticker
     * @param string[] $emoji_list A JSON-serialized list of 1-20 emoji associated with the sticker
     *
     * @return stdClass
     */
    public function setStickerEmojiList ( string $sticker, array $emoji_list ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'sticker' => $sticker, 'emoji_list' => json_encode( $emoji_list ) ] );
    }

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker
     * must belong to a sticker set created by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setStickerKeywords
     *
     * @param string $sticker File identifier of the sticker
     * @param string[]|NULL $keywords A JSON-serialized list of 0-20 search keywords for the sticker with total length of up to 64 characters
     *
     * @return stdClass
     */
    public function setStickerKeywords ( string $sticker, ?array $keywords = NULL ) : stdClass {
      $args = [ 'sticker' => $sticker ]; 
      if ( $keywords !== NULL ) $args['keywords'] = json_encode( $keywords );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker
     * set that was created by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setStickerMaskPosition
     *
     * @param string $sticker File identifier of the sticker
     * @param MaskPosition|NULL $mask_position A JSON-serialized object with the position where the mask should be placed on faces. Omit the
     *                              parameter to remove the mask position.
     *
     * @return stdClass
     */
    public function setStickerMaskPosition ( string $sticker, ?array $mask_position = NULL ) : stdClass {
      $args = [ 'sticker' => $sticker ]; 
      if ( $mask_position !== NULL ) $args['mask_position'] = json_encode( $mask_position );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to set the title of a created sticker set. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setStickerSetTitle
     *
     * @param string $name Sticker set name
     * @param string $title Sticker set title, 1-64 characters
     *
     * @return stdClass
     */
    public function setStickerSetTitle ( string $name, string $title ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'name' => $name, 'title' => $title ] );
    }

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail
     * file must match the format of the stickers in the set. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setStickerSetThumbnail
     *
     * @param string $name Sticker set name
     * @param int $user_id User identifier of the sticker set owner
     * @param InputFile|string|NULL $thumbnail A .WEBP or .PNG image with the thumbnail, must be up to 128 kilobytes in size and have a width and
     *                              height of exactly 100px, or a .TGS animation with a thumbnail up to 32 kilobytes in size (see
     *                              https://core.telegram.org/stickers#animation-requirements for animated sticker technical
     *                              requirements), or a .WEBM video with the thumbnail up to 32 kilobytes in size; see
     *                              https://core.telegram.org/stickers#video-requirements for video sticker technical requirements. Pass
     *                              a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP URL
     *                              as a String for Telegram to get a file from the Internet, or upload a new one using
     *                              multipart/form-data. More information on Sending Files ». Animated and video sticker set thumbnails
     *                              can't be uploaded via HTTP URL. If omitted, then the thumbnail is dropped and the first sticker is
     *                              used as the thumbnail.
     * @param string $format Format of the thumbnail, must be one of “static” for a .WEBP or .PNG image, “animated” for a
     *                              .TGS animation, or “video” for a .WEBM video
     *
     * @return stdClass
     */
    public function setStickerSetThumbnail ( string $name, int $user_id, string $format, CURLFile|string|null $thumbnail = NULL ) : stdClass {
      $args = [ 'name' => $name, 'user_id' => $user_id, 'format' => $format ]; 
      if ( $thumbnail !== NULL ) $args['thumbnail'] = $thumbnail;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#setCustomEmojiStickerSetThumbnail
     *
     * @param string $name Sticker set name
     * @param string|NULL $custom_emoji_id Custom emoji identifier of a sticker from the sticker set; pass an empty string to drop the
     *                              thumbnail and use the first sticker as the thumbnail.
     *
     * @return stdClass
     */
    public function setCustomEmojiStickerSetThumbnail ( string $name, ?string $custom_emoji_id = NULL ) : stdClass {
      $args = [ 'name' => $name ]; 
      if ( $custom_emoji_id !== NULL ) $args['custom_emoji_id'] = $custom_emoji_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to delete a sticker set that was created by the bot. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#deleteStickerSet
     *
     * @param string $name Sticker set name
     *
     * @return stdClass
     */
    public function deleteStickerSet ( string $name ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'name' => $name ] );
    }

    /**
     * Use this method to send answers to an inline query. On success, True is returned.No more than 50
     * results per query are allowed.
     * 
     * @see https://core.telegram.org/bots/api#answerInlineQuery
     *
     * @param string $inline_query_id Unique identifier for the answered query
     * @param InlineQueryResult[] $results A JSON-serialized array of results for the inline query
     * @param int|NULL $cache_time The maximum amount of time in seconds that the result of the inline query may be cached on the
     *                              server. Defaults to 300.
     * @param bool|NULL $is_personal Pass True if results may be cached on the server side only for the user that sent the query. By
     *                              default, results may be returned to any user who sends the same query.
     * @param string|NULL $next_offset Pass the offset that a client should send in the next query with the same text to receive more
     *                              results. Pass an empty string if there are no more results or if you don't support pagination.
     *                              Offset length can't exceed 64 bytes.
     * @param InlineQueryResultsButton|NULL $button A JSON-serialized object describing a button to be shown above inline query results
     *
     * @return stdClass
     */
    public function answerInlineQuery ( string $inline_query_id, array $results, ?int $cache_time = NULL, ?bool $is_personal = NULL, ?string $next_offset = NULL, ?array $button = NULL ) : stdClass {
      $args = [ 'inline_query_id' => $inline_query_id, 'results' => json_encode( $results ) ]; 
      if ( $cache_time !== NULL ) $args['cache_time'] = $cache_time;
      if ( $is_personal !== NULL ) $args['is_personal'] = $is_personal;
      if ( $next_offset !== NULL ) $args['next_offset'] = $next_offset;
      if ( $button !== NULL ) $args['button'] = json_encode( $button );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to set the result of an interaction with a Web App and send a corresponding message
     * on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage
     * object is returned.
     * 
     * @see https://core.telegram.org/bots/api#answerWebAppQuery
     *
     * @param string $web_app_query_id Unique identifier for the query to be answered
     * @param InlineQueryResult $result A JSON-serialized object describing the message to be sent
     *
     * @return stdClass
     */
    public function answerWebAppQuery ( string $web_app_query_id, array $result ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'web_app_query_id' => $web_app_query_id, 'result' => json_encode( $result ) ] );
    }

    /**
     * Stores a message that can be sent by a user of a Mini App. Returns a PreparedInlineMessage object.
     * 
     * @see https://core.telegram.org/bots/api#savePreparedInlineMessage
     *
     * @param int $user_id Unique identifier of the target user that can use the prepared message
     * @param InlineQueryResult $result A JSON-serialized object describing the message to be sent
     * @param bool|NULL $allow_user_chats Pass True if the message can be sent to private chats with users
     * @param bool|NULL $allow_bot_chats Pass True if the message can be sent to private chats with bots
     * @param bool|NULL $allow_group_chats Pass True if the message can be sent to group and supergroup chats
     * @param bool|NULL $allow_channel_chats Pass True if the message can be sent to channel chats
     *
     * @return stdClass
     */
    public function savePreparedInlineMessage ( int $user_id, array $result, ?bool $allow_user_chats = NULL, ?bool $allow_bot_chats = NULL, ?bool $allow_group_chats = NULL, ?bool $allow_channel_chats = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id, 'result' => json_encode( $result ) ]; 
      if ( $allow_user_chats !== NULL ) $args['allow_user_chats'] = $allow_user_chats;
      if ( $allow_bot_chats !== NULL ) $args['allow_bot_chats'] = $allow_bot_chats;
      if ( $allow_group_chats !== NULL ) $args['allow_group_chats'] = $allow_group_chats;
      if ( $allow_channel_chats !== NULL ) $args['allow_channel_chats'] = $allow_channel_chats;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to send invoices. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendInvoice
     *
     * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
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
     * @param int[]|NULL $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer,
     *                              not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must
     *                              be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|NULL $start_parameter Unique deep-linking parameter. If left empty, forwarded copies of the sent message will have a Pay
     *                              button, allowing multiple users to pay directly from the forwarded message, using the same invoice.
     *                              If non-empty, forwarded copies of the sent message will have a URL button with a deep link to the
     *                              bot (instead of a Pay button), with the value used as the start parameter
     * @param string|NULL $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed
     *                              description of required fields should be provided by the payment provider.
     * @param string|NULL $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a
     *                              service. People like it better when they see what they are paying for.
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
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price' button will be
     *                              shown. If not empty, the first button must be a Pay button.
     *
     * @return stdClass
     */
    public function sendInvoice ( int|string $chat_id, string $title, string $description, string $payload, string $currency, array $prices, ?int $message_thread_id = NULL, ?string $provider_token = NULL, ?int $max_tip_amount = NULL, ?array $suggested_tip_amounts = NULL, ?string $start_parameter = NULL, ?string $provider_data = NULL, ?string $photo_url = NULL, ?int $photo_size = NULL, ?int $photo_width = NULL, ?int $photo_height = NULL, ?bool $need_name = NULL, ?bool $need_phone_number = NULL, ?bool $need_email = NULL, ?bool $need_shipping_address = NULL, ?bool $send_phone_number_to_provider = NULL, ?bool $send_email_to_provider = NULL, ?bool $is_flexible = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'title' => $title, 'description' => $description, 'payload' => $payload, 'currency' => $currency, 'prices' => json_encode( $prices ) ]; 
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $provider_token !== NULL ) $args['provider_token'] = $provider_token;
      if ( $max_tip_amount !== NULL ) $args['max_tip_amount'] = $max_tip_amount;
      if ( $suggested_tip_amounts !== NULL ) $args['suggested_tip_amounts'] = json_encode( $suggested_tip_amounts );
      if ( $start_parameter !== NULL ) $args['start_parameter'] = $start_parameter;
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
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
     * 
     * @see https://core.telegram.org/bots/api#createInvoiceLink
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the link will be created. For
     *                              payments in Telegram Stars only.
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your
     *                              internal processes.
     * @param string|NULL $provider_token Payment provider token, obtained via @BotFather. Pass an empty string for payments in Telegram Stars.
     * @param string $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram
     *                              Stars.
     * @param LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
     *                              cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param int|NULL $subscription_period The number of seconds the subscription will be active for before the next payment. The currency must
     *                              be set to “XTR” (Telegram Stars) if the parameter is used. Currently, it must always be 2592000
     *                              (30 days) if specified. Any number of subscriptions can be active for a given bot at the same time,
     *                              including multiple concurrent subscriptions from the same user. Subscription price must no exceed
     *                              10000 Telegram Stars.
     * @param int|NULL $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not
     *                              float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp
     *                              parameter in currencies.json, it shows the number of digits past the decimal point for each currency
     *                              (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars.
     * @param int[]|NULL $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the currency (integer,
     *                              not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must
     *                              be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|NULL $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider. A detailed
     *                              description of required fields should be provided by the payment provider.
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
     * @return stdClass
     */
    public function createInvoiceLink ( string $title, string $description, string $payload, string $currency, array $prices, ?string $business_connection_id = NULL, ?string $provider_token = NULL, ?int $subscription_period = NULL, ?int $max_tip_amount = NULL, ?array $suggested_tip_amounts = NULL, ?string $provider_data = NULL, ?string $photo_url = NULL, ?int $photo_size = NULL, ?int $photo_width = NULL, ?int $photo_height = NULL, ?bool $need_name = NULL, ?bool $need_phone_number = NULL, ?bool $need_email = NULL, ?bool $need_shipping_address = NULL, ?bool $send_phone_number_to_provider = NULL, ?bool $send_email_to_provider = NULL, ?bool $is_flexible = NULL ) : stdClass {
      $args = [ 'title' => $title, 'description' => $description, 'payload' => $payload, 'currency' => $currency, 'prices' => json_encode( $prices ) ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $provider_token !== NULL ) $args['provider_token'] = $provider_token;
      if ( $subscription_period !== NULL ) $args['subscription_period'] = $subscription_period;
      if ( $max_tip_amount !== NULL ) $args['max_tip_amount'] = $max_tip_amount;
      if ( $suggested_tip_amounts !== NULL ) $args['suggested_tip_amounts'] = json_encode( $suggested_tip_amounts );
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
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified,
     * the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to
     * shipping queries. On success, True is returned.
     * 
     * @see https://core.telegram.org/bots/api#answerShippingQuery
     *
     * @param string $shipping_query_id Unique identifier for the query to be answered
     * @param bool $ok Pass True if delivery to the specified address is possible and False if there are any problems (for
     *                              example, if delivery to the specified address is not possible)
     * @param ShippingOption[]|NULL $shipping_options Required if ok is True. A JSON-serialized array of available shipping options.
     * @param string|NULL $error_message Required if ok is False. Error message in human readable form that explains why it is impossible to
     *                              complete the order (e.g. “Sorry, delivery to your desired address is unavailable”). Telegram
     *                              will display this message to the user.
     *
     * @return stdClass
     */
    public function answerShippingQuery ( string $shipping_query_id, bool $ok, ?array $shipping_options = NULL, ?string $error_message = NULL ) : stdClass {
      $args = [ 'shipping_query_id' => $shipping_query_id, 'ok' => $ok ]; 
      if ( $shipping_options !== NULL ) $args['shipping_options'] = json_encode( $shipping_options );
      if ( $error_message !== NULL ) $args['error_message'] = $error_message;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final
     * confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond
     * to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer
     * within 10 seconds after the pre-checkout query was sent.
     * 
     * @see https://core.telegram.org/bots/api#answerPreCheckoutQuery
     *
     * @param string $pre_checkout_query_id Unique identifier for the query to be answered
     * @param bool $ok Specify True if everything is alright (goods are available, etc.) and the bot is ready to proceed
     *                              with the order. Use False if there are any problems.
     * @param string|NULL $error_message Required if ok is False. Error message in human readable form that explains the reason for failure
     *                              to proceed with the checkout (e.g. "Sorry, somebody just bought the last of our amazing black
     *                              T-shirts while you were busy filling out your payment details. Please choose a different color or
     *                              garment!"). Telegram will display this message to the user.
     *
     * @return stdClass
     */
    public function answerPreCheckoutQuery ( string $pre_checkout_query_id, bool $ok, ?string $error_message = NULL ) : stdClass {
      $args = [ 'pre_checkout_query_id' => $pre_checkout_query_id, 'ok' => $ok ]; 
      if ( $error_message !== NULL ) $args['error_message'] = $error_message;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Returns the bot's Telegram Star transactions in chronological order. On success, returns a
     * StarTransactions object.
     * 
     * @see https://core.telegram.org/bots/api#getStarTransactions
     *
     * @param int|NULL $offset Number of transactions to skip in the response
     * @param int|NULL $limit The maximum number of transactions to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     *
     * @return stdClass
     */
    public function getStarTransactions ( ?int $offset = NULL, ?int $limit = NULL ) : stdClass {
      $args = []; 
      if ( $offset !== NULL ) $args['offset'] = $offset;
      if ( $limit !== NULL ) $args['limit'] = $limit;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Refunds a successful payment in Telegram Stars. Returns True on success.
     * 
     * @see https://core.telegram.org/bots/api#refundStarPayment
     *
     * @param int $user_id Identifier of the user whose payment will be refunded
     * @param string $telegram_payment_charge_id Telegram payment identifier
     *
     * @return stdClass
     */
    public function refundStarPayment ( int $user_id, string $telegram_payment_charge_id ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id, 'telegram_payment_charge_id' => $telegram_payment_charge_id ] );
    }

    /**
     * Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns
     * True on success.
     * 
     * @see https://core.telegram.org/bots/api#editUserStarSubscription
     *
     * @param int $user_id Identifier of the user whose subscription will be edited
     * @param string $telegram_payment_charge_id Telegram payment identifier for the subscription
     * @param bool $is_canceled Pass True to cancel extension of the user subscription; the subscription must be active up to the
     *                              end of the current subscription period. Pass False to allow the user to re-enable a subscription
     *                              that was previously canceled by the bot.
     *
     * @return stdClass
     */
    public function editUserStarSubscription ( int $user_id, string $telegram_payment_charge_id, bool $is_canceled ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id, 'telegram_payment_charge_id' => $telegram_payment_charge_id, 'is_canceled' => $is_canceled ] );
    }

    /**
     * Informs a user that some of the Telegram Passport elements they provided contains errors. The user
     * will not be able to re-submit their Passport to you until the errors are fixed (the contents of the
     * field for which you returned the error must change). Returns True on success.
     * Use this if the
     * data submitted by the user doesn't satisfy the standards your service requires for any reason. For
     * example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of
     * tampering, etc. Supply some details in the error message to make sure the user knows how to correct
     * the issues.
     * 
     * @see https://core.telegram.org/bots/api#setPassportDataErrors
     *
     * @param int $user_id User identifier
     * @param PassportElementError[] $errors A JSON-serialized array describing the errors
     *
     * @return stdClass
     */
    public function setPassportDataErrors ( int $user_id, array $errors ) : stdClass {
      return $this->Request( __FUNCTION__, [ 'user_id' => $user_id, 'errors' => json_encode( $errors ) ] );
    }

    /**
     * Use this method to send a game. On success, the sent Message is returned.
     * 
     * @see https://core.telegram.org/bots/api#sendGame
     *
     * @param string|NULL $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
     * @param int $chat_id Unique identifier for the target chat
     * @param int|NULL $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param string $game_short_name Short name of the game, serves as the unique identifier for the game. Set up your games via @BotFather.
     * @param bool|NULL $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|NULL $protect_content Protects the contents of the sent message from forwarding and saving
     * @param bool|NULL $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1
     *                              Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param string|NULL $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param ReplyParameters|NULL $reply_parameters Description of the message to reply to
     * @param InlineKeyboardMarkup|NULL $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title' button will be
     *                              shown. If not empty, the first button must launch the game.
     *
     * @return stdClass
     */
    public function sendGame ( int $chat_id, string $game_short_name, ?string $business_connection_id = NULL, ?int $message_thread_id = NULL, ?bool $disable_notification = NULL, ?bool $protect_content = NULL, ?bool $allow_paid_broadcast = NULL, ?string $message_effect_id = NULL, ?array $reply_parameters = NULL, ?array $reply_markup = NULL ) : stdClass {
      $args = [ 'chat_id' => $chat_id, 'game_short_name' => $game_short_name ]; 
      if ( $business_connection_id !== NULL ) $args['business_connection_id'] = $business_connection_id;
      if ( $message_thread_id !== NULL ) $args['message_thread_id'] = $message_thread_id;
      if ( $disable_notification !== NULL ) $args['disable_notification'] = $disable_notification;
      if ( $protect_content !== NULL ) $args['protect_content'] = $protect_content;
      if ( $allow_paid_broadcast !== NULL ) $args['allow_paid_broadcast'] = $allow_paid_broadcast;
      if ( $message_effect_id !== NULL ) $args['message_effect_id'] = $message_effect_id;
      if ( $reply_parameters !== NULL ) $args['reply_parameters'] = json_encode( $reply_parameters );
      if ( $reply_markup !== NULL ) $args['reply_markup'] = json_encode( $reply_markup );
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to set the score of the specified user in a game message. On success, if the message
     * is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if
     * the new score is not greater than the user's current score in the chat and force is False.
     * 
     * @see https://core.telegram.org/bots/api#setGameScore
     *
     * @param int $user_id User identifier
     * @param int $score New score, must be non-negative
     * @param bool|NULL $force Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or
     *                              banning cheaters
     * @param bool|NULL $disable_edit_message Pass True if the game message should not be automatically edited to include the current scoreboard
     * @param int|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     *
     * @return stdClass
     */
    public function setGameScore ( int $user_id, int $score, ?bool $force = NULL, ?bool $disable_edit_message = NULL, ?int $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id, 'score' => $score ]; 
      if ( $force !== NULL ) $args['force'] = $force;
      if ( $disable_edit_message !== NULL ) $args['disable_edit_message'] = $disable_edit_message;
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      return $this->Request( __FUNCTION__, $args );
    }

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and
     * several of their neighbors in a game. Returns an Array of GameHighScore objects.
     * 
     * @see https://core.telegram.org/bots/api#getGameHighScores
     *
     * @param int $user_id Target user id
     * @param int|NULL $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param int|NULL $message_id Required if inline_message_id is not specified. Identifier of the sent message
     * @param string|NULL $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     *
     * @return stdClass
     */
    public function getGameHighScores ( int $user_id, ?int $chat_id = NULL, ?int $message_id = NULL, ?string $inline_message_id = NULL ) : stdClass {
      $args = [ 'user_id' => $user_id ]; 
      if ( $chat_id !== NULL ) $args['chat_id'] = $chat_id;
      if ( $message_id !== NULL ) $args['message_id'] = $message_id;
      if ( $inline_message_id !== NULL ) $args['inline_message_id'] = $inline_message_id;
      return $this->Request( __FUNCTION__, $args );
    }

  }