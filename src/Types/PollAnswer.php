<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an answer of a user in a non-anonymous poll.
 *
 * @see https://core.telegram.org/bots/api#pollanswer
 *
 * @param string $poll_id Unique poll identifier
 * @param array $option_ids 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
 * @param array $option_persistent_ids Persistent identifiers of the chosen answer options. May be empty if the vote was retracted.
 * @param Chat|array|null $voter_chat Optional. The chat that changed the answer to the poll, if the voter is anonymous (optional)
 * @param User|array|null $user Optional. The user that changed the answer to the poll, if the voter isn't anonymous (optional)
 */
final class PollAnswer implements \JsonSerializable
{
    public function __construct(
        public readonly string $poll_id,
        public readonly array $option_ids,
        public readonly array $option_persistent_ids,
        public readonly Chat|array|null $voter_chat = null,
        public readonly User|array|null $user = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['poll_id'] = $this->poll_id;
        $data['option_ids'] = $this->option_ids;
        $data['option_persistent_ids'] = $this->option_persistent_ids;
        if ($this->voter_chat !== null) $data['voter_chat'] = $this->voter_chat;

        if ($this->user !== null) $data['user'] = $this->user;


        return $data;
    }
}
