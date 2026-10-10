<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes the source of a transaction, or its recipient for outgoing transactions.
 * Currently, it can be one of
 *
 * Implemented by: TransactionPartnerUser, TransactionPartnerChat, TransactionPartnerAffiliateProgram, TransactionPartnerFragment, TransactionPartnerTelegramAds, TransactionPartnerTelegramApi, TransactionPartnerOther.
 *
 * @see https://core.telegram.org/bots/api#transactionpartner
 */
interface TransactionPartner extends \JsonSerializable
{
}
