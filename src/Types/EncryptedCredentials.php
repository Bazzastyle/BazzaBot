<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes data required for decrypting and authenticating EncryptedPassportElement. See the Telegram
 * Passport Documentation for a complete description of the data decryption and authentication
 * processes.
 *
 * @see https://core.telegram.org/bots/api#encryptedcredentials
 *
 * @param string $data Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets
 *     required for EncryptedPassportElement decryption and authentication
 * @param string $hash Base64-encoded data hash for data authentication
 * @param string $secret Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
 */
final class EncryptedCredentials implements \JsonSerializable
{
    public function __construct(
        public readonly string $data,
        public readonly string $hash,
        public readonly string $secret,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['data'] = $this->data;
        $data['hash'] = $this->hash;
        $data['secret'] = $this->secret;

        return $data;
    }
}
