<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a rich message to be sent. Exactly one of the fields html, markdown, or blocks must be
 * used.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessage
 *
 * @param ?array $blocks Optional. Content of the rich message to send described as a list of blocks (optional)
 * @param ?string $html Optional. Content of the rich message to send described using HTML formatting. See rich message
 *     formatting options for more details. Use media field to specify the media used in the message. (optional)
 * @param ?string $markdown Optional. Content of the rich message to send described using Markdown formatting. See rich message
 *     formatting options for more details. Use media field to specify the media used in the message. (optional)
 * @param ?array $media Optional. List of media that are specified in the markdown or html fields using tg://photo?id=,
 *     tg://video?id=, tg://document?id=, and tg://audio?id= links (optional)
 * @param ?bool $is_rtl Optional. Pass True if the rich message must be shown right-to-left (optional)
 * @param ?bool $skip_entity_detection Optional. Pass True to skip automatic detection of entities (e.g., URLs, email addresses, username
 *     mentions, hashtags, cashtags, bot commands, or phone numbers) in the text (optional)
 */
final class InputRichMessage implements \JsonSerializable
{
    public function __construct(
        public readonly ?array $blocks = null,
        public readonly ?string $html = null,
        public readonly ?string $markdown = null,
        public readonly ?array $media = null,
        public readonly ?bool $is_rtl = null,
        public readonly ?bool $skip_entity_detection = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->blocks !== null) $data['blocks'] = $this->blocks;

        if ($this->html !== null) $data['html'] = $this->html;

        if ($this->markdown !== null) $data['markdown'] = $this->markdown;

        if ($this->media !== null) $data['media'] = $this->media;

        if ($this->is_rtl !== null) $data['is_rtl'] = $this->is_rtl;

        if ($this->skip_entity_detection !== null) $data['skip_entity_detection'] = $this->skip_entity_detection;


        return $data;
    }
}
