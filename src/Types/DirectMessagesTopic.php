<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a topic of a direct messages chat.
 *
 * @see https://core.telegram.org/bots/api#directmessagestopic
 *
 * @param int $topic_id Unique identifier of the topic. This number may have more than 32 significant bits and some
 *     programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
 *     significant bits, so a 64-bit integer or double-precision float type are safe for storing this
 *     identifier.
 * @param User|array|null $user Optional. Information about the user that created the topic. Currently, it is always present. (optional)
 */
final class DirectMessagesTopic implements \JsonSerializable
{
    public function __construct(
        public readonly int $topic_id,
        public readonly User|array|null $user = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['topic_id'] = $this->topic_id;
        if ($this->user !== null) $data['user'] = $this->user;


        return $data;
    }
}
