<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a Web App.
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 *
 * @param string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 */
final class WebAppInfo implements \JsonSerializable
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
