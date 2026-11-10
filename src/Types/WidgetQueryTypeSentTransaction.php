<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The query notifies the bot about a transaction sent from a TON wallet of the user who sent the
 * query.
 *
 * @see https://core.telegram.org/bots/api#widgetquerytypesenttransaction
 *
 * @param string $type Type of the query, always “sent_transaction”
 * @param WidgetQueryWallet|array $wallet The wallet from which the transaction was sent
 * @param string $msg_hash Value of msg_hash of the transaction
 */
final class WidgetQueryTypeSentTransaction implements WidgetQueryType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly WidgetQueryWallet|array $wallet,
        public readonly string $msg_hash,
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
        $data['msg_hash'] = $this->msg_hash;

        return $data;
    }
}
