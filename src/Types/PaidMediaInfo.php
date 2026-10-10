<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the paid media added to a message.
 *
 * @see https://core.telegram.org/bots/api#paidmediainfo
 *
 * @param int $star_count The number of Telegram Stars that must be paid to buy access to the media
 * @param array $paid_media Information about the paid media
 */
final class PaidMediaInfo implements \JsonSerializable
{
    public function __construct(
        public readonly int $star_count,
        public readonly array $paid_media,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['star_count'] = $this->star_count;
        $data['paid_media'] = $this->paid_media;

        return $data;
    }
}
