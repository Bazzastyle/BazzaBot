<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains parameters of a post that is being suggested by the bot.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostparameters
 *
 * @param SuggestedPostPrice|array|null $price Optional. Proposed price for the post. If the field is omitted, then the post is unpaid. (optional)
 * @param ?int $send_date Optional. Proposed send date of the post. If specified, then the date must be between 300 second and
 *     2678400 seconds (30 days) in the future. If the field is omitted, then the post can be published at
 *     any time within 30 days at the sole discretion of the user who approves it. (optional)
 */
final class SuggestedPostParameters implements \JsonSerializable
{
    public function __construct(
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
        if ($this->price !== null) $data['price'] = $this->price;

        if ($this->send_date !== null) $data['send_date'] = $this->send_date;


        return $data;
    }
}
