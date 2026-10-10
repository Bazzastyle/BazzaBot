<?php

declare(strict_types=1);

/**
 * Update types: inline_query, chosen_inline_result
 * https://core.telegram.org/bots/api#inlinequery
 * https://core.telegram.org/bots/api#choseninlineresult
 *
 * Fired when a user types "@yourbot ..." in any chat (inline mode must be
 * enabled with @BotFather). Answer with answerInlineQuery(). "chosen_inline_result"
 * fires afterwards if you asked Telegram to report which result was picked
 * (setInlineFeedback in @BotFather, or is_inline_feedback_enabled).
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Types\{InlineQueryResultArticle, InputTextMessageContent};
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::InlineQuery, function (Context $context): void {
    $query = $context->update->raw->inline_query;
    $searchText = trim($query->query);

    $results = [
        new InlineQueryResultArticle(
            type: 'article',
            id: 'echo',
            title: $searchText === '' ? 'Scrivi qualcosa dopo il nome del bot' : "Invia: \"{$searchText}\"",
            input_message_content: new InputTextMessageContent(
                message_text: $searchText === '' ? 'Ciao dal bot!' : $searchText,
            ),
            description: 'Esempio di risultato inline generato al volo',
        ),
    ];

    $context->client->answerInlineQuery(inline_query_id: $query->id, results: $results, cache_time: 0);
});

$bot->router->onUpdateType(UpdateType::ChosenInlineResult, function (Context $context): void {
    $chosen = $context->update->raw->chosen_inline_result;

    $context->logger->info('Risultato inline scelto', [
        'result_id' => $chosen->result_id,
        'user_id' => $chosen->from->id ?? null,
    ]);
});
