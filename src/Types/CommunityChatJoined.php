<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a chat being joined by a user from a community.
 *
 * @see https://core.telegram.org/bots/api#communitychatjoined
 *
 * @param Community|array $community The community from which the chat was joined
 */
final class CommunityChatJoined implements \JsonSerializable
{
    public function __construct(
        public readonly Community|array $community,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['community'] = $this->community;

        return $data;
    }
}
