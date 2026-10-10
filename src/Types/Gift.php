<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a gift that can be sent by the bot.
 *
 * @see https://core.telegram.org/bots/api#gift
 *
 * @param string $id Unique identifier of the gift
 * @param Sticker|array $sticker The sticker that represents the gift
 * @param int $star_count The number of Telegram Stars that must be paid to send the sticker
 * @param ?int $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique one (optional)
 * @param ?bool $is_premium Optional. True, if the gift can only be purchased by Telegram Premium subscribers (optional)
 * @param ?bool $has_colors Optional. True, if the gift can be used (after being upgraded) to customize a user's appearance (optional)
 * @param ?int $total_count Optional. The total number of gifts of this type that can be sent by all users; for limited gifts
 *     only (optional)
 * @param ?int $remaining_count Optional. The number of remaining gifts of this type that can be sent by all users; for limited
 *     gifts only (optional)
 * @param ?int $personal_total_count Optional. The total number of gifts of this type that can be sent by the bot; for limited gifts only (optional)
 * @param ?int $personal_remaining_count Optional. The number of remaining gifts of this type that can be sent by the bot; for limited gifts
 *     only (optional)
 * @param GiftBackground|array|null $background Optional. Background of the gift (optional)
 * @param ?int $unique_gift_variant_count Optional. The total number of different unique gifts that can be obtained by upgrading the gift (optional)
 * @param Chat|array|null $publisher_chat Optional. Information about the chat that published the gift (optional)
 */
final class Gift implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly Sticker|array $sticker,
        public readonly int $star_count,
        public readonly ?int $upgrade_star_count = null,
        public readonly ?bool $is_premium = null,
        public readonly ?bool $has_colors = null,
        public readonly ?int $total_count = null,
        public readonly ?int $remaining_count = null,
        public readonly ?int $personal_total_count = null,
        public readonly ?int $personal_remaining_count = null,
        public readonly GiftBackground|array|null $background = null,
        public readonly ?int $unique_gift_variant_count = null,
        public readonly Chat|array|null $publisher_chat = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['sticker'] = $this->sticker;
        $data['star_count'] = $this->star_count;
        if ($this->upgrade_star_count !== null) $data['upgrade_star_count'] = $this->upgrade_star_count;

        if ($this->is_premium !== null) $data['is_premium'] = $this->is_premium;

        if ($this->has_colors !== null) $data['has_colors'] = $this->has_colors;

        if ($this->total_count !== null) $data['total_count'] = $this->total_count;

        if ($this->remaining_count !== null) $data['remaining_count'] = $this->remaining_count;

        if ($this->personal_total_count !== null) $data['personal_total_count'] = $this->personal_total_count;

        if ($this->personal_remaining_count !== null) $data['personal_remaining_count'] = $this->personal_remaining_count;

        if ($this->background !== null) $data['background'] = $this->background;

        if ($this->unique_gift_variant_count !== null) $data['unique_gift_variant_count'] = $this->unique_gift_variant_count;

        if ($this->publisher_chat !== null) $data['publisher_chat'] = $this->publisher_chat;


        return $data;
    }
}
