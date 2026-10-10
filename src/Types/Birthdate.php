<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the birthdate of a user.
 *
 * @see https://core.telegram.org/bots/api#birthdate
 *
 * @param int $day Day of the user's birth; 1-31
 * @param int $month Month of the user's birth; 1-12
 * @param ?int $year Optional. Year of the user's birth (optional)
 */
final class Birthdate implements \JsonSerializable
{
    public function __construct(
        public readonly int $day,
        public readonly int $month,
        public readonly ?int $year = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['day'] = $this->day;
        $data['month'] = $this->month;
        if ($this->year !== null) $data['year'] = $this->year;


        return $data;
    }
}
