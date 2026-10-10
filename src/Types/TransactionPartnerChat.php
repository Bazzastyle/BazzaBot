<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a transaction with a chat.
 *
 * @see https://core.telegram.org/bots/api#transactionpartnerchat
 *
 * @param string $type Type of the transaction partner, always “chat”
 * @param Chat|array $chat Information about the chat
 * @param Gift|array|null $gift Optional. The gift sent to the chat by the bot (optional)
 */
final class TransactionPartnerChat implements TransactionPartner, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Chat|array $chat,
        public readonly Gift|array|null $gift = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['chat'] = $this->chat;
        if ($this->gift !== null) $data['gift'] = $this->gift;


        return $data;
    }
}
