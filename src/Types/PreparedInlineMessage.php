<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes an inline message to be sent by a user of a Mini App.
 *
 * @see https://core.telegram.org/bots/api#preparedinlinemessage
 *
 * @param string $id Unique identifier of the prepared message
 * @param int $expiration_date Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be
 *     used.
 */
final class PreparedInlineMessage implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly int $expiration_date,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['expiration_date'] = $this->expiration_date;

        return $data;
    }
}
