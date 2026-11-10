<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a transfer with a TON wallet.
 *
 * @see https://core.telegram.org/bots/api#tonwallettransfer
 *
 * @param string $transaction_id Unique identifier of the transaction; may be empty if the transfer hasn't been sent yet
 * @param string $peer_address Address of the transfer peer in the TON blockchain
 * @param string $amount The amount of transferred cryptocurrency, in the smallest units of the cryptocurrency, as a decimal
 *     number; negative for outgoing transfers
 * @param ?string $comment Optional. Comment added to the transfer; omitted if the comment is encrypted (optional)
 */
final class TonWalletTransfer implements \JsonSerializable
{
    public function __construct(
        public readonly string $transaction_id,
        public readonly string $peer_address,
        public readonly string $amount,
        public readonly ?string $comment = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['transaction_id'] = $this->transaction_id;
        $data['peer_address'] = $this->peer_address;
        $data['amount'] = $this->amount;
        if ($this->comment !== null) $data['comment'] = $this->comment;


        return $data;
    }
}
