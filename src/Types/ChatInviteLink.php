<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an invite link for a chat.
 *
 * @see https://core.telegram.org/bots/api#chatinvitelink
 *
 * @param string $invite_link The invite link. If the link was created by another chat administrator, then the second part of the
 *     link will be replaced with “…”.
 * @param User|array $creator Creator of the link
 * @param bool $creates_join_request True, if users joining the chat via the link need to be approved by chat administrators
 * @param bool $is_primary True, if the link is primary
 * @param bool $is_revoked True, if the link is revoked
 * @param ?string $name Optional. Invite link name (optional)
 * @param ?int $expire_date Optional. Point in time (Unix timestamp) when the link will expire or has been expired (optional)
 * @param ?int $member_limit Optional. The maximum number of users that can be members of the chat simultaneously after joining
 *     the chat via this invite link; 1-99999 (optional)
 * @param ?int $pending_join_request_count Optional. Number of pending join requests created using this link (optional)
 * @param ?int $subscription_period Optional. The number of seconds the subscription will be active for before the next payment (optional)
 * @param ?int $subscription_price Optional. The amount of Telegram Stars a user must pay initially and after each subsequent
 *     subscription period to be a member of the chat using the link (optional)
 */
final class ChatInviteLink implements \JsonSerializable
{
    public function __construct(
        public readonly string $invite_link,
        public readonly User|array $creator,
        public readonly bool $creates_join_request,
        public readonly bool $is_primary,
        public readonly bool $is_revoked,
        public readonly ?string $name = null,
        public readonly ?int $expire_date = null,
        public readonly ?int $member_limit = null,
        public readonly ?int $pending_join_request_count = null,
        public readonly ?int $subscription_period = null,
        public readonly ?int $subscription_price = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['invite_link'] = $this->invite_link;
        $data['creator'] = $this->creator;
        $data['creates_join_request'] = $this->creates_join_request;
        $data['is_primary'] = $this->is_primary;
        $data['is_revoked'] = $this->is_revoked;
        if ($this->name !== null) $data['name'] = $this->name;

        if ($this->expire_date !== null) $data['expire_date'] = $this->expire_date;

        if ($this->member_limit !== null) $data['member_limit'] = $this->member_limit;

        if ($this->pending_join_request_count !== null) $data['pending_join_request_count'] = $this->pending_join_request_count;

        if ($this->subscription_period !== null) $data['subscription_period'] = $this->subscription_period;

        if ($this->subscription_price !== null) $data['subscription_price'] = $this->subscription_price;


        return $data;
    }
}
