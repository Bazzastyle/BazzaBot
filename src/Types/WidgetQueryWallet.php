<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a TON wallet of the user, which is used in a query from a widget.
 *
 * @see https://core.telegram.org/bots/api#widgetquerywallet
 *
 * @param string $address Address of the wallet
 * @param string $amount Balance of the wallet, in the smallest units of the cryptocurrency, as a decimal number
 * @param ?string $public_key Optional. Hex-encoded public key of the wallet; omitted if unknown (optional)
 * @param ?string $state_init Optional. Base64-encoded serialized StateInit of the wallet contract; omitted if and only if
 *     public_key is omitted (optional)
 */
final class WidgetQueryWallet implements \JsonSerializable
{
    public function __construct(
        public readonly string $address,
        public readonly string $amount,
        public readonly ?string $public_key = null,
        public readonly ?string $state_init = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['address'] = $this->address;
        $data['amount'] = $this->amount;
        if ($this->public_key !== null) $data['public_key'] = $this->public_key;

        if ($this->state_init !== null) $data['state_init'] = $this->state_init;


        return $data;
    }
}
