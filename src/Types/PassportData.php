<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes Telegram Passport data shared with the bot by the user.
 *
 * @see https://core.telegram.org/bots/api#passportdata
 *
 * @param array $data Array with information about documents and other Telegram Passport elements that was shared with the
 *     bot
 * @param EncryptedCredentials|array $credentials Encrypted credentials required to decrypt the data
 */
final class PassportData implements \JsonSerializable
{
    public function __construct(
        public readonly array $data,
        public readonly EncryptedCredentials|array $credentials,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['data'] = $this->data;
        $data['credentials'] = $this->credentials;

        return $data;
    }
}
