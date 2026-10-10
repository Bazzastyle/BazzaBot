<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A preformatted text block, corresponding to the nested HTML tags <pre> and <code>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockpreformatted
 *
 * @param string $type Type of the block, always “pre”
 * @param RichText|array $text Text of the block
 * @param ?string $language Optional. The programming language of the text (optional)
 */
final class InputRichBlockPreformatted implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly RichText|array $text,
        public readonly ?string $language = null,
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
        if ($this->language !== null) $data['language'] = $this->language;


        return $data;
    }
}
