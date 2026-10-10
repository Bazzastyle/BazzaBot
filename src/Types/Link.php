<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents an HTTP link.
 *
 * @see https://core.telegram.org/bots/api#link
 *
 * @param string $url URL of the link
 */
final class Link implements \JsonSerializable
{
    public function __construct(
        public readonly string $url,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['url'] = $this->url;

        return $data;
    }
}
