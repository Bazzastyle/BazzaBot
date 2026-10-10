<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes an update about a user stopping message generation.
 *
 * @see https://core.telegram.org/bots/api#messagegenerationstopped
 *
 * @param Chat|array $chat Chat in which the message is generated
 * @param int $draft_id Unique identifier of the message draft which was stopped
 * @param ?int $message_thread_id Optional. Unique identifier of the message thread in which the message is generated (optional)
 */
final class MessageGenerationStopped implements \JsonSerializable
{
    public function __construct(
        public readonly Chat|array $chat,
        public readonly int $draft_id,
        public readonly ?int $message_thread_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['chat'] = $this->chat;
        $data['draft_id'] = $this->draft_id;
        if ($this->message_thread_id !== null) $data['message_thread_id'] = $this->message_thread_id;


        return $data;
    }
}
