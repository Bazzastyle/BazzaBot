<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about the sender of the message using a link of the other user, which
 * allows sending messages to the user without paying Telegram Stars. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#paidmessageswaived
 */
final class PaidMessagesWaived implements \JsonSerializable
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [];
    }
}
