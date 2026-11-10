<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a TON wallet card, which is shown on the profile page of a user to everyone.
 *
 * @see https://core.telegram.org/bots/api#tonwalletcard
 *
 * @param string $address Address of the wallet
 * @param string $amount Balance of the wallet, in the smallest units of the cryptocurrency, as a decimal number
 * @param array $stickers Stickers placed on the card
 * @param ?string $background_nft_address Optional. Address of the NFT of one of the stickers, whose colors must be used for the card
 *     background; omitted if the default background must be used (optional)
 */
final class TonWalletCard implements \JsonSerializable
{
    public function __construct(
        public readonly string $address,
        public readonly string $amount,
        public readonly array $stickers,
        public readonly ?string $background_nft_address = null,
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
        $data['stickers'] = $this->stickers;
        if ($this->background_nft_address !== null) $data['background_nft_address'] = $this->background_nft_address;


        return $data;
    }
}
