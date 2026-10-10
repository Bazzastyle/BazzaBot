<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a list of boosts added to a chat by a user.
 *
 * @see https://core.telegram.org/bots/api#userchatboosts
 *
 * @param array $boosts The list of boosts added to the chat by the user
 */
final class UserChatBoosts implements \JsonSerializable
{
    public function __construct(
        public readonly array $boosts,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['boosts'] = $this->boosts;

        return $data;
    }
}
