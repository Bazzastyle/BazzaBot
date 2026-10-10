<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents the content of a rich message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputrichmessagecontent
 *
 * @param InputRichMessage|array $rich_message The message to be sent. Only previously uploaded files may be used in the message.
 */
final class InputRichMessageContent implements InputMessageContent, \JsonSerializable
{
    public function __construct(
        public readonly InputRichMessage|array $rich_message,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['rich_message'] = $this->rich_message;

        return $data;
    }
}
