<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a Game.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresultgame
 *
 * @param string $type Type of the result, must be game
 * @param string $id Unique identifier for this result, 1-64 bytes
 * @param string $game_short_name Short name of the game
 * @param InlineKeyboardMarkup|array|null $reply_markup Optional. Inline keyboard attached to the message (optional)
 */
final class InlineQueryResultGame implements InlineQueryResult, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $id,
        public readonly string $game_short_name,
        public readonly InlineKeyboardMarkup|array|null $reply_markup = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['id'] = $this->id;
        $data['game_short_name'] = $this->game_short_name;
        if ($this->reply_markup !== null) $data['reply_markup'] = $this->reply_markup;


        return $data;
    }
}
