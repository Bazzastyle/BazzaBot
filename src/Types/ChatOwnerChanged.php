<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about an ownership change in the chat.
 *
 * @see https://core.telegram.org/bots/api#chatownerchanged
 *
 * @param User|array $new_owner The new owner of the chat
 */
final class ChatOwnerChanged implements \JsonSerializable
{
    public function __construct(
        public readonly User|array $new_owner,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['new_owner'] = $this->new_owner;

        return $data;
    }
}
