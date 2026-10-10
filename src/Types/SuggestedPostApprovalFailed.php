<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about the failed approval of a suggested post. Currently, only caused by
 * insufficient user funds at the time of approval.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapprovalfailed
 *
 * @param SuggestedPostPrice|array $price Expected price of the post
 * @param Message|array|null $suggested_post_message Optional. Message containing the suggested post whose approval has failed. Note that the Message
 *     object in this field will not contain the reply_to_message field even if it itself is a reply. (optional)
 */
final class SuggestedPostApprovalFailed implements \JsonSerializable
{
    public function __construct(
        public readonly SuggestedPostPrice|array $price,
        public readonly Message|array|null $suggested_post_message = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['price'] = $this->price;
        if ($this->suggested_post_message !== null) $data['suggested_post_message'] = $this->suggested_post_message;


        return $data;
    }
}
