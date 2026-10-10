<?php

declare(strict_types=1);

/**
 * Update types: poll, poll_answer
 * https://core.telegram.org/bots/api#poll
 * https://core.telegram.org/bots/api#pollanswer
 *
 * "poll" fires for every state change of a poll the bot sent (non-anonymous
 * or not). "poll_answer" fires when a user answers/retracts their vote in a
 * non-anonymous poll.
 */

use Bazzastyle\BazzaBot\Routing\Context;
use Bazzastyle\BazzaBot\Update\UpdateType;

/** @var \Bazzastyle\BazzaBot\Bot $bot */
$bot->router->onUpdateType(UpdateType::Poll, function (Context $context): void {
    $poll = $context->update->raw->poll;

    if ($poll->is_closed) {
        $context->logger->info('Sondaggio chiuso', ['poll_id' => $poll->id, 'total_voter_count' => $poll->total_voter_count]);
    }
});

$bot->router->onUpdateType(UpdateType::PollAnswer, function (Context $context): void {
    $answer = $context->update->raw->poll_answer;
    $userId = $answer->user->id ?? null;
    $optionIds = $answer->option_ids ?? [];

    $context->logger->info('Voto ricevuto', [
        'poll_id' => $answer->poll_id,
        'user_id' => $userId,
        'option_ids' => $optionIds,
    ]);
});
