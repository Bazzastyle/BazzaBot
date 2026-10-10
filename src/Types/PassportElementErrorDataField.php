<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an issue in one of the data fields that was provided by the user. The error is considered
 * resolved when the field's value changes.
 *
 * @see https://core.telegram.org/bots/api#passportelementerrordatafield
 *
 * @param string $source Error source, must be data
 * @param string $type The section of the user's Telegram Passport which has the error, one of “personal_details”,
 *     “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
 * @param string $field_name Name of the data field which has the error
 * @param string $data_hash Base64-encoded data hash
 * @param string $message Error message
 */
final class PassportElementErrorDataField implements PassportElementError, \JsonSerializable
{
    public function __construct(
        public readonly string $source,
        public readonly string $type,
        public readonly string $field_name,
        public readonly string $data_hash,
        public readonly string $message,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['source'] = $this->source;
        $data['type'] = $this->type;
        $data['field_name'] = $this->field_name;
        $data['data_hash'] = $this->data_hash;
        $data['message'] = $this->message;

        return $data;
    }
}
