<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an NFT in the TON blockchain.
 *
 * @see https://core.telegram.org/bots/api#tonnft
 *
 * @param string $address Address of the NFT
 * @param string $index Index of the NFT among all NFTs from the collection as a decimal number
 * @param string $name Name of the NFT
 * @param string $description Description of the NFT
 * @param ?string $collection_address Optional. Address of the collection to which the NFT belongs; omitted if unknown (optional)
 * @param ?array $attributes Optional. Attributes of the NFT (optional)
 * @param UniqueGift|array|null $gift Optional. The unique gift corresponding to the NFT (optional)
 */
final class TonNft implements \JsonSerializable
{
    public function __construct(
        public readonly string $address,
        public readonly string $index,
        public readonly string $name,
        public readonly string $description,
        public readonly ?string $collection_address = null,
        public readonly ?array $attributes = null,
        public readonly UniqueGift|array|null $gift = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['address'] = $this->address;
        $data['index'] = $this->index;
        $data['name'] = $this->name;
        $data['description'] = $this->description;
        if ($this->collection_address !== null) $data['collection_address'] = $this->collection_address;

        if ($this->attributes !== null) $data['attributes'] = $this->attributes;

        if ($this->gift !== null) $data['gift'] = $this->gift;


        return $data;
    }
}
