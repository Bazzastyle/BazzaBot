<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Auth;

use Bazzastyle\BazzaBot\Config\Config;

/**
 * Checks a Telegram user id against a configured list of bot administrators
 * (the ADMINS env var: comma-separated numeric Telegram user ids, e.g.
 * ADMINS=111111111,222222222). Not a permissions/roles system — just a flat
 * "is this user allowed to use admin-only commands" check, which is what
 * most bots actually need.
 */
final class AdminList
{
    /** @var array<int, true> */
    private readonly array $ids;

    /** @param array<int, int|string> $ids */
    public function __construct(array $ids = [])
    {
        $normalized = [];
        foreach ($ids as $id) {
            if (is_numeric($id)) {
                $normalized[(int) $id] = true;
            }
        }

        $this->ids = $normalized;
    }

    public static function fromConfig(Config $config, string $key = 'ADMINS'): self
    {
        $raw = $config->getString($key, '') ?? '';
        $ids = array_filter(
            array_map('trim', explode(',', $raw)),
            static fn (string $id): bool => $id !== '',
        );

        return new self($ids);
    }

    /**
     * True if $userId is a configured admin. Accepts null (e.g. the result
     * of Update::getFromId() for update types with no "from" user) and
     * always returns false for it, so callers don't need a separate null
     * check before calling isAdmin().
     */
    public function isAdmin(int|string|null $userId): bool
    {
        if ($userId === null || !is_numeric($userId)) {
            return false;
        }

        return isset($this->ids[(int) $userId]);
    }

    public function isEmpty(): bool
    {
        return $this->ids === [];
    }

    /** @return array<int, int> */
    public function all(): array
    {
        return array_keys($this->ids);
    }
}
