<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a game. Use BotFather to create and edit games, their short names will act as
 * unique identifiers.
 *
 * @see https://core.telegram.org/bots/api#game
 *
 * @param string $title Title of the game
 * @param string $description Description of the game
 * @param array $photo Photo that will be displayed in the game message in chats
 * @param ?string $text Optional. Brief description of the game or high scores included in the game message. Can be
 *     automatically edited to include current high scores for the game when the bot calls setGameScore, or
 *     manually edited using editMessageText. 0-4096 characters. (optional)
 * @param ?array $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc. (optional)
 * @param Animation|array|null $animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather. (optional)
 */
final class Game implements \JsonSerializable
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly array $photo,
        public readonly ?string $text = null,
        public readonly ?array $text_entities = null,
        public readonly Animation|array|null $animation = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['photo'] = $this->photo;
        if ($this->text !== null) $data['text'] = $this->text;

        if ($this->text_entities !== null) $data['text_entities'] = $this->text_entities;

        if ($this->animation !== null) $data['animation'] = $this->animation;


        return $data;
    }
}
