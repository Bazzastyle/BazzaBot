<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about a poll.
 *
 * @see https://core.telegram.org/bots/api#poll
 *
 * @param string $id Unique poll identifier
 * @param string $question Poll question, 1-300 characters
 * @param array $options List of poll options
 * @param int $total_voter_count Total number of users that voted in the poll
 * @param bool $is_closed True, if the poll is closed
 * @param bool $is_anonymous True, if the poll is anonymous
 * @param string $type Poll type, currently can be “regular” or “quiz”
 * @param bool $allows_multiple_answers True, if the poll allows multiple answers
 * @param bool $allows_revoting True, if the poll allows to change the chosen answer options
 * @param bool $members_only True if voting is limited to users who have been members of the chat where the poll was originally
 *     sent for more than 24 hours
 * @param ?array $question_entities Optional. Special entities that appear in the question. Currently, only custom emoji entities are
 *     allowed in poll questions (optional)
 * @param ?array $country_codes Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which
 *     users can vote in the poll. The country code “FT” is used for users with anonymous numbers. If
 *     omitted, then users from any country can participate in the poll. (optional)
 * @param ?array $correct_option_ids Optional. Array of 0-based identifiers of the correct answer options. Available only for polls in
 *     quiz mode which are closed or were sent (not forwarded) by the bot or to the private chat with the
 *     bot. (optional)
 * @param ?string $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a
 *     quiz-style poll, 0-200 characters (optional)
 * @param ?array $explanation_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation (optional)
 * @param PollMedia|array|null $explanation_media Optional. Media added to the quiz explanation (optional)
 * @param ?int $open_period Optional. Amount of time in seconds the poll will be active after creation (optional)
 * @param ?int $close_date Optional. Point in time (Unix timestamp) when the poll will be automatically closed (optional)
 * @param ?string $description Optional. Description of the poll; for polls inside the Message object only (optional)
 * @param ?array $description_entities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the description (optional)
 * @param PollMedia|array|null $media Optional. Media added to the poll description; for polls inside the Message object only (optional)
 */
final class Poll implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $question,
        public readonly array $options,
        public readonly int $total_voter_count,
        public readonly bool $is_closed,
        public readonly bool $is_anonymous,
        public readonly string $type,
        public readonly bool $allows_multiple_answers,
        public readonly bool $allows_revoting,
        public readonly bool $members_only,
        public readonly ?array $question_entities = null,
        public readonly ?array $country_codes = null,
        public readonly ?array $correct_option_ids = null,
        public readonly ?string $explanation = null,
        public readonly ?array $explanation_entities = null,
        public readonly PollMedia|array|null $explanation_media = null,
        public readonly ?int $open_period = null,
        public readonly ?int $close_date = null,
        public readonly ?string $description = null,
        public readonly ?array $description_entities = null,
        public readonly PollMedia|array|null $media = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['question'] = $this->question;
        $data['options'] = $this->options;
        $data['total_voter_count'] = $this->total_voter_count;
        $data['is_closed'] = $this->is_closed;
        $data['is_anonymous'] = $this->is_anonymous;
        $data['type'] = $this->type;
        $data['allows_multiple_answers'] = $this->allows_multiple_answers;
        $data['allows_revoting'] = $this->allows_revoting;
        $data['members_only'] = $this->members_only;
        if ($this->question_entities !== null) $data['question_entities'] = $this->question_entities;

        if ($this->country_codes !== null) $data['country_codes'] = $this->country_codes;

        if ($this->correct_option_ids !== null) $data['correct_option_ids'] = $this->correct_option_ids;

        if ($this->explanation !== null) $data['explanation'] = $this->explanation;

        if ($this->explanation_entities !== null) $data['explanation_entities'] = $this->explanation_entities;

        if ($this->explanation_media !== null) $data['explanation_media'] = $this->explanation_media;

        if ($this->open_period !== null) $data['open_period'] = $this->open_period;

        if ($this->close_date !== null) $data['close_date'] = $this->close_date;

        if ($this->description !== null) $data['description'] = $this->description;

        if ($this->description_entities !== null) $data['description_entities'] = $this->description_entities;

        if ($this->media !== null) $data['media'] = $this->media;


        return $data;
    }
}
