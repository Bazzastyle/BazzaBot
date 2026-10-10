<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains the list of gifts received and owned by a user or a chat.
 *
 * @see https://core.telegram.org/bots/api#ownedgifts
 *
 * @param int $total_count The total number of gifts owned by the user or the chat
 * @param array $gifts The list of gifts
 * @param ?string $next_offset Optional. Offset for the next request. If empty, then there are no more results. (optional)
 */
final class OwnedGifts implements \JsonSerializable
{
    public function __construct(
        public readonly int $total_count,
        public readonly array $gifts,
        public readonly ?string $next_offset = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['total_count'] = $this->total_count;
        $data['gifts'] = $this->gifts;
        if ($this->next_offset !== null) $data['next_offset'] = $this->next_offset;


        return $data;
    }
}
