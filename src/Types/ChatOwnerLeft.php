<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about the chat owner leaving the chat.
 *
 * @see https://core.telegram.org/bots/api#chatownerleft
 *
 * @param User|array|null $new_owner Optional. The user who will become the new owner of the chat if the previous owner does not return
 *     to the chat (optional)
 */
final class ChatOwnerLeft implements \JsonSerializable
{
    public function __construct(
        public readonly User|array|null $new_owner = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->new_owner !== null) $data['new_owner'] = $this->new_owner;


        return $data;
    }
}
