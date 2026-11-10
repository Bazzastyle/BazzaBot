<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The query contains data signed by a TON wallet of the user who sent the query. The data is signed
 * for the domain bot<bot_id>, where <bot_id> is the identifier of the bot.
 *
 * @see https://core.telegram.org/bots/api#widgetquerytypesigndata
 *
 * @param string $type Type of the query, always “sign_data”
 * @param WidgetQueryWallet|array $wallet The wallet that signed the data
 * @param string $sign_data JSON-serialized signed data
 */
final class WidgetQueryTypeSignData implements WidgetQueryType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly WidgetQueryWallet|array $wallet,
        public readonly string $sign_data,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['wallet'] = $this->wallet;
        $data['sign_data'] = $this->sign_data;

        return $data;
    }
}
