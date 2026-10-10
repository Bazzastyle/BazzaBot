<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents information about an order.
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 *
 * @param ?string $name Optional. User name (optional)
 * @param ?string $phone_number Optional. User's phone number (optional)
 * @param ?string $email Optional. User email (optional)
 * @param ShippingAddress|array|null $shipping_address Optional. User shipping address (optional)
 */
final class OrderInfo implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $phone_number = null,
        public readonly ?string $email = null,
        public readonly ShippingAddress|array|null $shipping_address = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->name !== null) $data['name'] = $this->name;

        if ($this->phone_number !== null) $data['phone_number'] = $this->phone_number;

        if ($this->email !== null) $data['email'] = $this->email;

        if ($this->shipping_address !== null) $data['shipping_address'] = $this->shipping_address;


        return $data;
    }
}
