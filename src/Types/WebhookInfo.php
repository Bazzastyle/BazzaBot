<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the current status of a webhook.
 *
 * @see https://core.telegram.org/bots/api#webhookinfo
 *
 * @param string $url Webhook URL, may be empty if webhook is not set up
 * @param bool $has_custom_certificate True, if a custom certificate was provided for webhook certificate checks
 * @param int $pending_update_count Number of updates awaiting delivery
 * @param ?string $ip_address Optional. Currently used webhook IP address (optional)
 * @param ?int $last_error_date Optional. Unix time for the most recent error that happened when trying to deliver an update via
 *     webhook (optional)
 * @param ?string $last_error_message Optional. Error message in human-readable format for the most recent error that happened when trying
 *     to deliver an update via webhook (optional)
 * @param ?int $last_synchronization_error_date Optional. Unix time of the most recent error that happened when trying to synchronize available
 *     updates with Telegram datacenters (optional)
 * @param ?int $max_connections Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update
 *     delivery (optional)
 * @param ?array $allowed_updates Optional. A list of update types the bot is subscribed to. Defaults to all update types except
 *     chat_member, message_reaction, and message_reaction_count. (optional)
 */
final class WebhookInfo implements \JsonSerializable
{
    public function __construct(
        public readonly string $url,
        public readonly bool $has_custom_certificate,
        public readonly int $pending_update_count,
        public readonly ?string $ip_address = null,
        public readonly ?int $last_error_date = null,
        public readonly ?string $last_error_message = null,
        public readonly ?int $last_synchronization_error_date = null,
        public readonly ?int $max_connections = null,
        public readonly ?array $allowed_updates = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['url'] = $this->url;
        $data['has_custom_certificate'] = $this->has_custom_certificate;
        $data['pending_update_count'] = $this->pending_update_count;
        if ($this->ip_address !== null) $data['ip_address'] = $this->ip_address;

        if ($this->last_error_date !== null) $data['last_error_date'] = $this->last_error_date;

        if ($this->last_error_message !== null) $data['last_error_message'] = $this->last_error_message;

        if ($this->last_synchronization_error_date !== null) $data['last_synchronization_error_date'] = $this->last_synchronization_error_date;

        if ($this->max_connections !== null) $data['max_connections'] = $this->max_connections;

        if ($this->allowed_updates !== null) $data['allowed_updates'] = $this->allowed_updates;


        return $data;
    }
}
