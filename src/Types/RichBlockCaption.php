<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Caption of a rich formatted block.
 *
 * @see https://core.telegram.org/bots/api#richblockcaption
 *
 * @param RichText|array $text Block caption
 * @param RichText|array|null $credit Optional. Block credit which corresponds to the HTML tag <cite> (optional)
 */
final class RichBlockCaption implements \JsonSerializable
{
    public function __construct(
        public readonly RichText|array $text,
        public readonly RichText|array|null $credit = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['text'] = $this->text;
        if ($this->credit !== null) $data['credit'] = $this->credit;


        return $data;
    }
}
