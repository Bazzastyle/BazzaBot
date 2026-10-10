<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of a contact message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputcontactmessagecontent
 *
 * @param string $phone_number Contact's phone number
 * @param string $first_name Contact's first name
 * @param ?string $last_name Optional. Contact's last name (optional)
 * @param ?string $vcard Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes (optional)
 */
final class InputContactMessageContent implements InputMessageContent, \JsonSerializable
{
    public function __construct(
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name = null,
        public readonly ?string $vcard = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['phone_number'] = $this->phone_number;
        $data['first_name'] = $this->first_name;
        if ($this->last_name !== null) $data['last_name'] = $this->last_name;

        if ($this->vcard !== null) $data['vcard'] = $this->vcard;


        return $data;
    }
}
