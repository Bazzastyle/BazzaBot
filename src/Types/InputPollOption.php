<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about one answer option in a poll to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputpolloption
 *
 * @param string $text Option text, 1-100 characters
 * @param ?string $text_parse_mode Optional. Mode for parsing entities in the text. See formatting options for more details. Currently,
 *     only custom emoji entities are allowed. (optional)
 * @param ?array $text_entities Optional. A JSON-serialized list of special entities that appear in the poll option text. It can be
 *     specified instead of text_parse_mode. (optional)
 * @param InputPollOptionMedia|array|null $media Optional. Media added to the poll option (optional)
 */
final class InputPollOption implements \JsonSerializable
{
    public function __construct(
        public readonly string $text,
        public readonly ?string $text_parse_mode = null,
        public readonly ?array $text_entities = null,
        public readonly InputPollOptionMedia|array|null $media = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['text'] = $this->text;
        if ($this->text_parse_mode !== null) $data['text_parse_mode'] = $this->text_parse_mode;

        if ($this->text_entities !== null) $data['text_entities'] = $this->text_entities;

        if ($this->media !== null) $data['media'] = $this->media;


        return $data;
    }
}
