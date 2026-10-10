<?php

declare(strict_types=1);

/**
 * Update types: channel_post, edited_channel_post
 * https://core.telegram.org/bots/api#update
 *
 * Fired for new/edited posts in a channel the bot is a member of (channel
 * posts are not "messages": no "from" user, since channels post as
 * themselves).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::ChannelPost, function (Context $context): void {
    $post = $context->update->raw->channel_post;

    $context->logger->info('Nuovo post nel canale', [
        'chat_id' => $post->chat->id,
        'text' => $post->text ?? $post->caption ?? null,
    ]);
});

$bot->router->onUpdateType(UpdateType::EditedChannelPost, function (Context $context): void {
    $post = $context->update->raw->edited_channel_post;

    $context->logger->info('Post del canale modificato', ['chat_id' => $post->chat->id, 'message_id' => $post->message_id]);
});
