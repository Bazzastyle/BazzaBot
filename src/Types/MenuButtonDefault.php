<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes that no specific value for the menu button was set.
 *
 * @see https://core.telegram.org/bots/api#menubuttondefault
 *
 * @param string $type Type of the button, must be default
 */
final class MenuButtonDefault implements MenuButton, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;

        return $data;
    }
}
