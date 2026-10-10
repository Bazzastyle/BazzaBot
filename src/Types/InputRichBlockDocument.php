<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a general file, corresponding to the custom HTML tag <tg-document>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdocument
 *
 * @param string $type Type of the block, always “document”
 * @param InputMediaDocument|array $document The document. Caption is ignored.
 * @param RichBlockCaption|array|null $caption Optional. Caption of the block (optional)
 */
final class InputRichBlockDocument implements InputRichBlock, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaDocument|array $document,
        public readonly RichBlockCaption|array|null $caption = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['document'] = $this->document;
        if ($this->caption !== null) $data['caption'] = $this->caption;


        return $data;
    }
}
