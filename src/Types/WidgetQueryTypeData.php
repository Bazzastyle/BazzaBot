<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The query contains data for the bot.
 *
 * @see https://core.telegram.org/bots/api#widgetquerytypedata
 *
 * @param string $type Type of the query, always “data”
 * @param TonWalletCard|array|null $wallet_card Optional. TON wallet card of the user who sent the query, if it was sent to the bot along with the
 *     query (optional)
 */
final class WidgetQueryTypeData implements WidgetQueryType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly TonWalletCard|array|null $wallet_card = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        if ($this->wallet_card !== null) $data['wallet_card'] = $this->wallet_card;


        return $data;
    }
}
