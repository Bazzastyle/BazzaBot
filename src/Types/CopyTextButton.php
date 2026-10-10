<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @see https://core.telegram.org/bots/api#copytextbutton
 *
 * @param string $text The text to be copied to the clipboard; 1-256 characters
 */
final class CopyTextButton implements \JsonSerializable
{
    public function __construct(
        public readonly string $text,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['text'] = $this->text;

        return $data;
    }
}
