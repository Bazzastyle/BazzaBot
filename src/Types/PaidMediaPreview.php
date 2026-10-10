<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The paid media isn't available before the payment.
 *
 * @see https://core.telegram.org/bots/api#paidmediapreview
 *
 * @param string $type Type of the paid media, always “preview”
 * @param ?int $width Optional. Media width as defined by the sender (optional)
 * @param ?int $height Optional. Media height as defined by the sender (optional)
 * @param ?int $duration Optional. Duration of the media in seconds as defined by the sender (optional)
 */
final class PaidMediaPreview implements PaidMedia, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly ?int $width = null,
        public readonly ?int $height = null,
        public readonly ?int $duration = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        if ($this->width !== null) $data['width'] = $this->width;

        if ($this->height !== null) $data['height'] = $this->height;

        if ($this->duration !== null) $data['duration'] = $this->duration;


        return $data;
    }
}
