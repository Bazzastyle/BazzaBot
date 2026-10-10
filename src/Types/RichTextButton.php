<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A button.
 *
 * @see https://core.telegram.org/bots/api#richtextbutton
 *
 * @param string $type Type of the rich text, always “button”
 * @param RichMessageButton|array $button The button
 */
final class RichTextButton implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichMessageButton|array $button,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['button'] = $this->button;

        return $data;
    }
}
