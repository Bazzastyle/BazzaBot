<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a service message about a change in the price of direct messages sent to a channel chat.
 *
 * @see https://core.telegram.org/bots/api#directmessagepricechanged
 *
 * @param bool $are_direct_messages_enabled True, if direct messages are enabled for the channel chat; False otherwise
 * @param ?int $direct_message_star_count Optional. The new number of Telegram Stars that must be paid by users for each direct message sent
 *     to the channel. Does not apply to users who have been exempted by administrators. Defaults to 0. (optional)
 */
final class DirectMessagePriceChanged implements \JsonSerializable
{
    public function __construct(
        public readonly bool $are_direct_messages_enabled,
        public readonly ?int $direct_message_star_count = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['are_direct_messages_enabled'] = $this->are_direct_messages_enabled;
        if ($this->direct_message_star_count !== null) $data['direct_message_star_count'] = $this->direct_message_star_count;


        return $data;
    }
}
