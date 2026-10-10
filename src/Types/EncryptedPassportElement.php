<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes documents or other Telegram Passport elements shared with the bot by the user.
 *
 * @see https://core.telegram.org/bots/api#encryptedpassportelement
 *
 * @param string $type Element type. One of “personal_details”, “passport”, “driver_license”,
 *     “identity_card”, “internal_passport”, “address”, “utility_bill”,
 *     “bank_statement”, “rental_agreement”, “passport_registration”,
 *     “temporary_registration”, “phone_number”, “email”.
 * @param string $hash Base64-encoded element hash for using in PassportElementErrorUnspecified
 * @param ?string $data Optional. Base64-encoded encrypted Telegram Passport element data provided by the user; available
 *     only for “personal_details”, “passport”, “driver_license”, “identity_card”,
 *     “internal_passport” and “address” types. Can be decrypted and verified using the
 *     accompanying EncryptedCredentials. (optional)
 * @param ?string $phone_number Optional. User's verified phone number; available only for “phone_number” type (optional)
 * @param ?string $email Optional. User's verified email address; available only for “email” type (optional)
 * @param ?array $files Optional. Array of encrypted files with documents provided by the user; available only for
 *     “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and
 *     “temporary_registration” types. Files can be decrypted and verified using the accompanying
 *     EncryptedCredentials. (optional)
 * @param PassportFile|array|null $front_side Optional. Encrypted file with the front side of the document, provided by the user; available only
 *     for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file
 *     can be decrypted and verified using the accompanying EncryptedCredentials. (optional)
 * @param PassportFile|array|null $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user; available only
 *     for “driver_license” and “identity_card”. The file can be decrypted and verified using the
 *     accompanying EncryptedCredentials. (optional)
 * @param PassportFile|array|null $selfie Optional. Encrypted file with the selfie of the user holding a document, provided by the user;
 *     available if requested for “passport”, “driver_license”, “identity_card” and
 *     “internal_passport”. The file can be decrypted and verified using the accompanying
 *     EncryptedCredentials. (optional)
 * @param ?array $translation Optional. Array of encrypted files with translated versions of documents provided by the user;
 *     available if requested for “passport”, “driver_license”, “identity_card”,
 *     “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”,
 *     “passport_registration” and “temporary_registration” types. Files can be decrypted and
 *     verified using the accompanying EncryptedCredentials. (optional)
 */
final class EncryptedPassportElement implements \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $hash,
        public readonly ?string $data = null,
        public readonly ?string $phone_number = null,
        public readonly ?string $email = null,
        public readonly ?array $files = null,
        public readonly PassportFile|array|null $front_side = null,
        public readonly PassportFile|array|null $reverse_side = null,
        public readonly PassportFile|array|null $selfie = null,
        public readonly ?array $translation = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['hash'] = $this->hash;
        if ($this->data !== null) $data['data'] = $this->data;

        if ($this->phone_number !== null) $data['phone_number'] = $this->phone_number;

        if ($this->email !== null) $data['email'] = $this->email;

        if ($this->files !== null) $data['files'] = $this->files;

        if ($this->front_side !== null) $data['front_side'] = $this->front_side;

        if ($this->reverse_side !== null) $data['reverse_side'] = $this->reverse_side;

        if ($this->selfie !== null) $data['selfie'] = $this->selfie;

        if ($this->translation !== null) $data['translation'] = $this->translation;


        return $data;
    }
}
