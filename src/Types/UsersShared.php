<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about the users whose identifiers were shared with the bot using a
 * KeyboardButtonRequestUsers button.
 *
 * @see https://core.telegram.org/bots/api#usersshared
 *
 * @param int $request_id Identifier of the request
 * @param array $users Information about users shared with the bot
 */
final class UsersShared implements \JsonSerializable
{
    public function __construct(
        public readonly int $request_id,
        public readonly array $users,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['request_id'] = $this->request_id;
        $data['users'] = $this->users;

        return $data;
    }
}
