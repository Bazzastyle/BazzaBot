<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of an invoice message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputinvoicemessagecontent
 *
 * @param string $title Product name, 1-32 characters
 * @param string $description Product description, 1-255 characters
 * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your
 *     internal processes.
 * @param string $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram
 *     Stars.
 * @param array $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
 *     cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
 * @param ?string $provider_token Optional. Payment provider token, obtained via @BotFather. Pass an empty string for payments in
 *     Telegram Stars. (optional)
 * @param ?int $max_tip_amount Optional. The maximum accepted amount for tips in the smallest units of the currency (integer, not
 *     float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp
 *     parameter in currencies.json, it shows the number of digits past the decimal point for each currency
 *     (2 for the majority of currencies). Defaults to 0. Not supported for payments in Telegram Stars. (optional)
 * @param ?array $suggested_tip_amounts Optional. A JSON-serialized Array of suggested amounts of tip in the smallest units of the currency
 *     (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip
 *     amounts must be positive, passed in a strictly increased order and must not exceed max_tip_amount. (optional)
 * @param ?string $provider_data Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment
 *     provider. A detailed description of the required fields should be provided by the payment provider. (optional)
 * @param ?string $photo_url Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image
 *     for a service. (optional)
 * @param ?int $photo_size Optional. Photo size in bytes (optional)
 * @param ?int $photo_width Optional. Photo width (optional)
 * @param ?int $photo_height Optional. Photo height (optional)
 * @param ?bool $need_name Optional. Pass True if you require the user's full name to complete the order. Ignored for payments
 *     in Telegram Stars. (optional)
 * @param ?bool $need_phone_number Optional. Pass True if you require the user's phone number to complete the order. Ignored for
 *     payments in Telegram Stars. (optional)
 * @param ?bool $need_email Optional. Pass True if you require the user's email address to complete the order. Ignored for
 *     payments in Telegram Stars. (optional)
 * @param ?bool $need_shipping_address Optional. Pass True if you require the user's shipping address to complete the order. Ignored for
 *     payments in Telegram Stars. (optional)
 * @param ?bool $send_phone_number_to_provider Optional. Pass True if the user's phone number should be sent to the provider. Ignored for payments
 *     in Telegram Stars. (optional)
 * @param ?bool $send_email_to_provider Optional. Pass True if the user's email address should be sent to the provider. Ignored for payments
 *     in Telegram Stars. (optional)
 * @param ?bool $is_flexible Optional. Pass True if the final price depends on the shipping method. Ignored for payments in
 *     Telegram Stars. (optional)
 */
final class InputInvoiceMessageContent implements InputMessageContent, \JsonSerializable
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $payload,
        public readonly string $currency,
        public readonly array $prices,
        public readonly ?string $provider_token = null,
        public readonly ?int $max_tip_amount = null,
        public readonly ?array $suggested_tip_amounts = null,
        public readonly ?string $provider_data = null,
        public readonly ?string $photo_url = null,
        public readonly ?int $photo_size = null,
        public readonly ?int $photo_width = null,
        public readonly ?int $photo_height = null,
        public readonly ?bool $need_name = null,
        public readonly ?bool $need_phone_number = null,
        public readonly ?bool $need_email = null,
        public readonly ?bool $need_shipping_address = null,
        public readonly ?bool $send_phone_number_to_provider = null,
        public readonly ?bool $send_email_to_provider = null,
        public readonly ?bool $is_flexible = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['title'] = $this->title;
        $data['description'] = $this->description;
        $data['payload'] = $this->payload;
        $data['currency'] = $this->currency;
        $data['prices'] = $this->prices;
        if ($this->provider_token !== null) $data['provider_token'] = $this->provider_token;

        if ($this->max_tip_amount !== null) $data['max_tip_amount'] = $this->max_tip_amount;

        if ($this->suggested_tip_amounts !== null) $data['suggested_tip_amounts'] = $this->suggested_tip_amounts;

        if ($this->provider_data !== null) $data['provider_data'] = $this->provider_data;

        if ($this->photo_url !== null) $data['photo_url'] = $this->photo_url;

        if ($this->photo_size !== null) $data['photo_size'] = $this->photo_size;

        if ($this->photo_width !== null) $data['photo_width'] = $this->photo_width;

        if ($this->photo_height !== null) $data['photo_height'] = $this->photo_height;

        if ($this->need_name !== null) $data['need_name'] = $this->need_name;

        if ($this->need_phone_number !== null) $data['need_phone_number'] = $this->need_phone_number;

        if ($this->need_email !== null) $data['need_email'] = $this->need_email;

        if ($this->need_shipping_address !== null) $data['need_shipping_address'] = $this->need_shipping_address;

        if ($this->send_phone_number_to_provider !== null) $data['send_phone_number_to_provider'] = $this->send_phone_number_to_provider;

        if ($this->send_email_to_provider !== null) $data['send_email_to_provider'] = $this->send_email_to_provider;

        if ($this->is_flexible !== null) $data['is_flexible'] = $this->is_flexible;


        return $data;
    }
}
