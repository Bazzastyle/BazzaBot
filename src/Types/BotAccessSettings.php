<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the access settings of a bot.
 *
 * @see https://core.telegram.org/bots/api#botaccesssettings
 *
 * @param bool $is_access_restricted True, if only selected users can access the bot. The bot's owner can always access it.
 * @param ?array $added_users Optional. The list of other users who have access to the bot if the access is restricted (optional)
 */
final class BotAccessSettings implements \JsonSerializable
{
    public function __construct(
        public readonly bool $is_access_restricted,
        public readonly ?array $added_users = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['is_access_restricted'] = $this->is_access_restricted;
        if ($this->added_users !== null) $data['added_users'] = $this->added_users;


        return $data;
    }
}
