<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes a keyboard button to be used by a user of a Mini App.
 *
 * @see https://core.telegram.org/bots/api#preparedkeyboardbutton
 *
 * @param string $id Unique identifier of the keyboard button
 */
final class PreparedKeyboardButton implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;

        return $data;
    }
}
