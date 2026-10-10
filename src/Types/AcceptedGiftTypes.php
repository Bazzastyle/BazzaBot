<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the types of gifts that can be gifted to a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#acceptedgifttypes
 *
 * @param bool $unlimited_gifts True, if unlimited regular gifts are accepted
 * @param bool $limited_gifts True, if limited regular gifts are accepted
 * @param bool $unique_gifts True, if unique gifts or gifts that can be upgraded to unique for free are accepted
 * @param bool $premium_subscription True, if a Telegram Premium subscription is accepted
 * @param bool $gifts_from_channels True, if transfers of unique gifts from channels are accepted
 */
final class AcceptedGiftTypes implements \JsonSerializable
{
    public function __construct(
        public readonly bool $unlimited_gifts,
        public readonly bool $limited_gifts,
        public readonly bool $unique_gifts,
        public readonly bool $premium_subscription,
        public readonly bool $gifts_from_channels,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['unlimited_gifts'] = $this->unlimited_gifts;
        $data['limited_gifts'] = $this->limited_gifts;
        $data['unique_gifts'] = $this->unique_gifts;
        $data['premium_subscription'] = $this->premium_subscription;
        $data['gifts_from_channels'] = $this->gifts_from_channels;

        return $data;
    }
}
