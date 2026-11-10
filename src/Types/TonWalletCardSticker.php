<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a sticker on a TON wallet card.
 *
 * @see https://core.telegram.org/bots/api#tonwalletcardsticker
 *
 * @param AreaPosition|array $position Position of the sticker on the card
 * @param TonNft|array $nft The NFT shown as the sticker
 */
final class TonWalletCardSticker implements \JsonSerializable
{
    public function __construct(
        public readonly AreaPosition|array $position,
        public readonly TonNft|array $nft,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['position'] = $this->position;
        $data['nft'] = $this->nft;

        return $data;
    }
}
