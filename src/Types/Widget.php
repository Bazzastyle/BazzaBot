<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object describes an HTML widget.
 *
 * @see https://core.telegram.org/bots/api#widget
 *
 * @param string $html HTML code of the widget
 * @param ?string $id Optional. Unique identifier of the shared widget, which can be used to send the widget again using
 *     the method sendSharedWidget; omitted if the widget isn't shared (optional)
 * @param ?int $width Optional. Width of the widget in logical pixels; omitted if the widget must occupy the whole width
 *     of the message bubble (optional)
 * @param ?int $height Optional. Height of the widget in logical pixels; omitted if the height of the widget isn't fixed (optional)
 * @param ?string $public_data Optional. Public data of the widget, which is available wherever the widget is shown. All messages
 *     with a shared widget have the same public data. (optional)
 * @param ?string $chat_data Optional. Data of the widget, which is specific to the message (optional)
 */
final class Widget implements \JsonSerializable
{
    public function __construct(
        public readonly string $html,
        public readonly ?string $id = null,
        public readonly ?int $width = null,
        public readonly ?int $height = null,
        public readonly ?string $public_data = null,
        public readonly ?string $chat_data = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['html'] = $this->html;
        if ($this->id !== null) $data['id'] = $this->id;

        if ($this->width !== null) $data['width'] = $this->width;

        if ($this->height !== null) $data['height'] = $this->height;

        if ($this->public_data !== null) $data['public_data'] = $this->public_data;

        if ($this->chat_data !== null) $data['chat_data'] = $this->chat_data;


        return $data;
    }
}
