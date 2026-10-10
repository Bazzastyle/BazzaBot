<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a phone contact.
 *
 * @see https://core.telegram.org/bots/api#contact
 *
 * @param string $phone_number Contact's phone number
 * @param string $first_name Contact's first name
 * @param ?string $last_name Optional. Contact's last name (optional)
 * @param ?int $user_id Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits
 *     and some programming languages may have difficulty/silent defects in interpreting it. But it has at
 *     most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing
 *     this identifier. (optional)
 * @param ?string $vcard Optional. Additional data about the contact in the form of a vCard (optional)
 */
final class Contact implements \JsonSerializable
{
    public function __construct(
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name = null,
        public readonly ?int $user_id = null,
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

        if ($this->user_id !== null) $data['user_id'] = $this->user_id;

        if ($this->vcard !== null) $data['vcard'] = $this->vcard;


        return $data;
    }
}
