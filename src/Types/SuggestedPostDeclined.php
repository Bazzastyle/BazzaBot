<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about the rejection of a suggested post.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostdeclined
 *
 * @param Message|array|null $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not
 *     contain the reply_to_message field even if it itself is a reply. (optional)
 * @param ?string $comment Optional. Comment with which the post was declined (optional)
 */
final class SuggestedPostDeclined implements \JsonSerializable
{
    public function __construct(
        public readonly Message|array|null $suggested_post_message = null,
        public readonly ?string $comment = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->suggested_post_message !== null) $data['suggested_post_message'] = $this->suggested_post_message;

        if ($this->comment !== null) $data['comment'] = $this->comment;


        return $data;
    }
}
