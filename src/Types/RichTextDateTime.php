<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Formatted date and time.
 *
 * @see https://core.telegram.org/bots/api#richtextdatetime
 *
 * @param string $type Type of the rich text, always “date_time”
 * @param RichText|array $text The text
 * @param int $unix_time The Unix time associated with the entity
 * @param string $date_time_format The string that defines the formatting of the date and time. See date-time entity formatting for
 *     more details.
 */
final class RichTextDateTime implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly int $unix_time,
        public readonly string $date_time_format,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['text'] = $this->text;
        $data['unix_time'] = $this->unix_time;
        $data['date_time_format'] = $this->date_time_format;

        return $data;
    }
}
