<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of a text message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputtextmessagecontent
 *
 * @param string $message_text Text of the message to be sent, 1-4096 characters
 * @param ?string $parse_mode Optional. Mode for parsing entities in the message text. See formatting options for more details. (optional)
 * @param ?array $entities Optional. List of special entities that appear in message text, which can be specified instead of
 *     parse_mode (optional)
 * @param LinkPreviewOptions|array|null $link_preview_options Optional. Link preview generation options for the message (optional)
 */
final class InputTextMessageContent implements InputMessageContent, \JsonSerializable
{
    public function __construct(
        public readonly string $message_text,
        public readonly ?string $parse_mode = null,
        public readonly ?array $entities = null,
        public readonly LinkPreviewOptions|array|null $link_preview_options = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['message_text'] = $this->message_text;
        if ($this->parse_mode !== null) $data['parse_mode'] = $this->parse_mode;

        if ($this->entities !== null) $data['entities'] = $this->entities;

        if ($this->link_preview_options !== null) $data['link_preview_options'] = $this->link_preview_options;


        return $data;
    }
}
