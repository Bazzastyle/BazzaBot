<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about the approval of a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapproved
 *
 * @param int $send_date Date when the post will be published
 * @param Message|array|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not
 *     contain the reply_to_message field even if it itself is a reply. (optional)
 * @param SuggestedPostPrice|array|null $price Optional. Amount paid for the post (optional)
 */
final class SuggestedPostApproved implements \JsonSerializable
{
    public function __construct(
        public readonly int $send_date,
        public readonly Message|array|null $suggested_post_message = null,
        public readonly SuggestedPostPrice|array|null $price = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['send_date'] = $this->send_date;
        if ($this->suggested_post_message !== null) $data['suggested_post_message'] = $this->suggested_post_message;

        if ($this->price !== null) $data['price'] = $this->price;


        return $data;
    }
}
