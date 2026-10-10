<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about an incoming shipping query.
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 *
 * @param string $id Unique query identifier
 * @param User|array $from User who sent the query
 * @param string $invoice_payload Bot-specified invoice payload
 * @param ShippingAddress|array $shipping_address User specified shipping address
 */
final class ShippingQuery implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $from,
        public readonly string $invoice_payload,
        public readonly ShippingAddress|array $shipping_address,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['from'] = $this->from;
        $data['invoice_payload'] = $this->invoice_payload;
        $data['shipping_address'] = $this->shipping_address;

        return $data;
    }
}
