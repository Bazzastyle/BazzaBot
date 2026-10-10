<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an HTTP link to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputmedialink
 *
 * @param string $type Type of the media, must be link
 * @param string $url HTTP URL of the link
 */
final class InputMediaLink implements InputPollOptionMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $url,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['url'] = $this->url;

        return $data;
    }
}
