<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Rich formatted message.
 *
 * @see https://core.telegram.org/bots/api#richmessage
 *
 * @param array $blocks Content of the message
 * @param ?bool $is_rtl Optional. True, if the rich message must be shown right-to-left (optional)
 */
final class RichMessage implements \JsonSerializable
{
    public function __construct(
        public readonly array $blocks,
        public readonly ?bool $is_rtl = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['blocks'] = $this->blocks;
        if ($this->is_rtl !== null) $data['is_rtl'] = $this->is_rtl;


        return $data;
    }
}
