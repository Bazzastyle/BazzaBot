<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
 *
 * @see https://core.telegram.org/bots/api#choseninlineresult
 *
 * @param string $result_id The unique identifier for the result that was chosen
 * @param User|array $from The user that chose the result
 * @param string $query The query that was used to obtain the result
 * @param Location|array|null $location Optional. Sender location, only for bots that require user location (optional)
 * @param ?string $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline keyboard
 *     attached to the message. Will be also received in callback queries and can be used to edit the
 *     message. (optional)
 */
final class ChosenInlineResult implements \JsonSerializable
{
    public function __construct(
        public readonly string $result_id,
        public readonly User|array $from,
        public readonly string $query,
        public readonly Location|array|null $location = null,
        public readonly ?string $inline_message_id = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['result_id'] = $this->result_id;
        $data['from'] = $this->from;
        $data['query'] = $this->query;
        if ($this->location !== null) $data['location'] = $this->location;

        if ($this->inline_message_id !== null) $data['inline_message_id'] = $this->inline_message_id;


        return $data;
    }
}
