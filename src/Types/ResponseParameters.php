<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes why a request was unsuccessful.
 *
 * @see https://core.telegram.org/bots/api#responseparameters
 *
 * @param ?int $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may
 *     have more than 32 significant bits and some programming languages may have difficulty/silent defects
 *     in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or
 *     double-precision float type are safe for storing this identifier. (optional)
 * @param ?int $retry_after Optional. In case of exceeding flood control, the number of seconds left to wait before the request
 *     can be repeated (optional)
 */
final class ResponseParameters implements \JsonSerializable
{
    public function __construct(
        public readonly ?int $migrate_to_chat_id = null,
        public readonly ?int $retry_after = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->migrate_to_chat_id !== null) $data['migrate_to_chat_id'] = $this->migrate_to_chat_id;

        if ($this->retry_after !== null) $data['retry_after'] = $this->retry_after;


        return $data;
    }
}
