<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a media element embedded in an outgoing rich message.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagemedia
 *
 * @param string $id Unique identifier of the media used in a tg://photo?id=, tg://video?id=, tg://document?id=, or
 *     tg://audio?id= link. 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.
 * @param InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote|array $media The media to be sent. Everything except the media itself and its properties is ignored.
 */
final class InputRichMessageMedia implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote|array $media,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['media'] = $this->media;

        return $data;
    }
}
