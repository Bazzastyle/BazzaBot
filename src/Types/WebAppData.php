<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes data sent from a Web App to the bot.
 *
 * @see https://core.telegram.org/bots/api#webappdata
 *
 * @param string $data The data. Be aware that a bad client can send arbitrary data in this field.
 * @param string $button_text Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client
 *     can send arbitrary data in this field.
 */
final class WebAppData implements \JsonSerializable
{
    public function __construct(
        public readonly string $data,
        public readonly string $button_text,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['data'] = $this->data;
        $data['button_text'] = $this->button_text;

        return $data;
    }
}
