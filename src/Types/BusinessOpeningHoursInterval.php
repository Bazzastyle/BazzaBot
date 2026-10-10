<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes an interval of time during which a business is open.
 *
 * @see https://core.telegram.org/bots/api#businessopeninghoursinterval
 *
 * @param int $opening_minute The minute's sequence number in a week, starting on Monday, marking the start of the time interval
 *     during which the business is open; 0 - 7 * 24 * 60
 * @param int $closing_minute The minute's sequence number in a week, starting on Monday, marking the end of the time interval
 *     during which the business is open; 0 - 8 * 24 * 60
 */
final class BusinessOpeningHoursInterval implements \JsonSerializable
{
    public function __construct(
        public readonly int $opening_minute,
        public readonly int $closing_minute,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['opening_minute'] = $this->opening_minute;
        $data['closing_minute'] = $this->closing_minute;

        return $data;
    }
}
