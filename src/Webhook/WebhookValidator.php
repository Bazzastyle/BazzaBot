<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Webhook;

use Bazzastyle\BazzaBot\Exception\WebhookValidationException;

/**
 * Validates an incoming webhook request. The secret token check
 * (hash_equals, constant-time) is the primary defense and is always
 * performed. The IP allowlist is optional and off by default: the caller
 * must resolve the real source IP itself (never trust a spoofable header
 * like X-Forwarded-For without knowing the deployment's proxy topology).
 */
final class WebhookValidator
{
    /** Official Telegram webhook source ranges (IPv4 only, per Telegram docs). */
    private const TELEGRAM_CIDR_RANGES = ['149.154.160.0/20', '91.108.4.0/22'];

    public function __construct(
        private readonly ?string $expectedSecretToken,
        private readonly bool $enforceIpAllowlist = false,
    ) {
    }

    public function validateSecretToken(?string $providedToken): void
    {
        if ($this->expectedSecretToken === null || $this->expectedSecretToken === '') {
            return;
        }

        if ($providedToken === null || !hash_equals($this->expectedSecretToken, $providedToken)) {
            throw new WebhookValidationException('Invalid or missing X-Telegram-Bot-Api-Secret-Token header');
        }
    }

    public function validateSourceIp(?string $remoteIp): void
    {
        if (!$this->enforceIpAllowlist) {
            return;
        }

        if ($remoteIp === null) {
            throw new WebhookValidationException('Source IP could not be determined for the allowlist check');
        }

        foreach (self::TELEGRAM_CIDR_RANGES as $cidr) {
            if ($this->ipInRange($remoteIp, $cidr)) {
                return;
            }
        }

        throw new WebhookValidationException(sprintf('Source IP %s is not in the Telegram allowlist', $remoteIp));
    }

    private function ipInRange(string $ip, string $cidr): bool
    {
        [$subnet, $bits] = explode('/', $cidr);
        $ipLong = ip2long($ip);
        $subnetLong = ip2long($subnet);

        if ($ipLong === false || $subnetLong === false) {
            return false;
        }

        $mask = -1 << (32 - (int) $bits);

        return ($ipLong & $mask) === ($subnetLong & $mask);
    }
}
