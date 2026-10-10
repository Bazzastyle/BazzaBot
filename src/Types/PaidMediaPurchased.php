<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about a paid media purchase.
 *
 * @see https://core.telegram.org/bots/api#paidmediapurchased
 *
 * @param User|array $from User who purchased the media
 * @param string $paid_media_payload Bot-specified paid media payload
 */
final class PaidMediaPurchased implements \JsonSerializable
{
    public function __construct(
        public readonly User|array $from,
        public readonly string $paid_media_payload,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['from'] = $this->from;
        $data['paid_media_payload'] = $this->paid_media_payload;

        return $data;
    }
}
