<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes a unique gift that was upgraded from a regular gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegift
 *
 * @param string $gift_id Identifier of the regular gift from which the gift was upgraded
 * @param string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
 * @param string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas.
 * @param int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
 * @param UniqueGiftModel|array $model Model of the gift
 * @param UniqueGiftSymbol|array $symbol Symbol of the gift
 * @param UniqueGiftBackdrop|array $backdrop Backdrop of the gift
 * @param ?bool $is_premium Optional. True, if the original regular gift was exclusively purchaseable by Telegram Premium
 *     subscribers (optional)
 * @param ?bool $is_burned Optional. True, if the gift was used to craft another gift and isn't available anymore (optional)
 * @param ?bool $is_from_blockchain Optional. True, if the gift is assigned from the TON blockchain and can't be resold or transferred
 *     in Telegram (optional)
 * @param UniqueGiftColors|array|null $colors Optional. The color scheme that can be used by the gift's owner for the chat's name, replies to
 *     messages and link previews; for business account gifts and gifts that are currently on sale only (optional)
 * @param Chat|array|null $publisher_chat Optional. Information about the chat that published the gift (optional)
 */
final class UniqueGift implements \JsonSerializable
{
    public function __construct(
        public readonly string $gift_id,
        public readonly string $base_name,
        public readonly string $name,
        public readonly int $number,
        public readonly UniqueGiftModel|array $model,
        public readonly UniqueGiftSymbol|array $symbol,
        public readonly UniqueGiftBackdrop|array $backdrop,
        public readonly ?bool $is_premium = null,
        public readonly ?bool $is_burned = null,
        public readonly ?bool $is_from_blockchain = null,
        public readonly UniqueGiftColors|array|null $colors = null,
        public readonly Chat|array|null $publisher_chat = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['gift_id'] = $this->gift_id;
        $data['base_name'] = $this->base_name;
        $data['name'] = $this->name;
        $data['number'] = $this->number;
        $data['model'] = $this->model;
        $data['symbol'] = $this->symbol;
        $data['backdrop'] = $this->backdrop;
        if ($this->is_premium !== null) $data['is_premium'] = $this->is_premium;

        if ($this->is_burned !== null) $data['is_burned'] = $this->is_burned;

        if ($this->is_from_blockchain !== null) $data['is_from_blockchain'] = $this->is_from_blockchain;

        if ($this->colors !== null) $data['colors'] = $this->colors;

        if ($this->publisher_chat !== null) $data['publisher_chat'] = $this->publisher_chat;


        return $data;
    }
}
