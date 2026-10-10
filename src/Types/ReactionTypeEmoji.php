<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The reaction is based on an emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypeemoji
 *
 * @param string $type Type of the reaction, always “emoji”
 * @param string $emoji Reaction emoji. Currently, it can be one of "❤", "👍", "👎", "🔥", "🥰", "👏", "😁",
 *     "🤔", "🤯", "😱", "🤬", "😢", "🎉", "🤩", "🤮", "💩", "🙏", "👌", "🕊",
 *     "🤡", "🥱", "🥴", "😍", "🐳", "❤‍🔥", "🌚", "🌭", "💯", "🤣", "⚡", "🍌",
 *     "🏆", "💔", "🤨", "😐", "🍓", "🍾", "💋", "🖕", "😈", "😴", "😭", "🤓",
 *     "👻", "👨‍💻", "👀", "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗", "🫡",
 *     "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄", "😘", "💊",
 *     "🙊", "😎", "👾", "🤷‍♂", "🤷", "🤷‍♀", "😡".
 */
final class ReactionTypeEmoji implements ReactionType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $emoji,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['emoji'] = $this->emoji;

        return $data;
    }
}
