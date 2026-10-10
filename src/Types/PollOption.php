<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about one answer option in a poll.
 *
 * @see https://core.telegram.org/bots/api#polloption
 *
 * @param string $persistent_id Unique identifier of the option, persistent on option addition and deletion
 * @param string $text Option text, 1-100 characters
 * @param int $voter_count Number of users who voted for this option; may be 0 if unknown
 * @param ?array $text_entities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are
 *     allowed in poll option texts (optional)
 * @param PollMedia|array|null $media Optional. Media added to the poll option (optional)
 * @param User|array|null $added_by_user Optional. User who added the option; omitted if the option wasn't added by a user after poll
 *     creation (optional)
 * @param Chat|array|null $added_by_chat Optional. Chat that added the option; omitted if the option wasn't added by a chat after poll
 *     creation (optional)
 * @param ?int $addition_date Optional. Point in time (Unix timestamp) when the option was added; omitted if the option existed in
 *     the original poll (optional)
 */
final class PollOption implements \JsonSerializable
{
    public function __construct(
        public readonly string $persistent_id,
        public readonly string $text,
        public readonly int $voter_count,
        public readonly ?array $text_entities = null,
        public readonly PollMedia|array|null $media = null,
        public readonly User|array|null $added_by_user = null,
        public readonly Chat|array|null $added_by_chat = null,
        public readonly ?int $addition_date = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['persistent_id'] = $this->persistent_id;
        $data['text'] = $this->text;
        $data['voter_count'] = $this->voter_count;
        if ($this->text_entities !== null) $data['text_entities'] = $this->text_entities;

        if ($this->media !== null) $data['media'] = $this->media;

        if ($this->added_by_user !== null) $data['added_by_user'] = $this->added_by_user;

        if ($this->added_by_chat !== null) $data['added_by_chat'] = $this->added_by_chat;

        if ($this->addition_date !== null) $data['addition_date'] = $this->addition_date;


        return $data;
    }
}
