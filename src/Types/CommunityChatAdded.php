<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a chat or a bot being added to a community.
 *
 * @see https://core.telegram.org/bots/api#communitychatadded
 *
 * @param Community|array $community The new community to which the chat or the bot belongs
 */
final class CommunityChatAdded implements \JsonSerializable
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
