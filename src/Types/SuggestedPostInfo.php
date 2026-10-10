<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains information about a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostinfo
 *
 * @param string $state State of the suggested post. Currently, it can be one of “pending”, “approved”,
 *     “declined”.
 * @param SuggestedPostPrice|array|null $price Optional. Proposed price of the post. If the field is omitted, then the post is unpaid. (optional)
 * @param ?int $send_date Optional. Proposed send date of the post. If the field is omitted, then the post can be published at
 *     any time within 30 days at the sole discretion of the user or administrator who approves it. (optional)
 */
final class SuggestedPostInfo implements \JsonSerializable
{
    public function __construct(
        public readonly string $state,
        public readonly SuggestedPostPrice|array|null $price = null,
        public readonly ?int $send_date = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['state'] = $this->state;
        if ($this->price !== null) $data['price'] = $this->price;

        if ($this->send_date !== null) $data['send_date'] = $this->send_date;


        return $data;
    }
}
