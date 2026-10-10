<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object defines the parameters for the creation of a managed bot. Information about the created
 * bot will be shared with the bot using the update managed_bot and a Message with the field
 * managed_bot_created.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestmanagedbot
 *
 * @param int $request_id Signed 32-bit identifier of the request. Must be unique within the message.
 * @param ?string $suggested_name Optional. Suggested name for the bot (optional)
 * @param ?string $suggested_username Optional. Suggested username for the bot (optional)
 */
final class KeyboardButtonRequestManagedBot implements \JsonSerializable
{
    public function __construct(
        public readonly int $request_id,
        public readonly ?string $suggested_name = null,
        public readonly ?string $suggested_username = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['request_id'] = $this->request_id;
        if ($this->suggested_name !== null) $data['suggested_name'] = $this->suggested_name;

        if ($this->suggested_username !== null) $data['suggested_username'] = $this->suggested_username;


        return $data;
    }
}
