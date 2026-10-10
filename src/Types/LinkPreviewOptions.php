<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Describes the options used for link preview generation.
 *
 * @see https://core.telegram.org/bots/api#linkpreviewoptions
 *
 * @param ?bool $is_disabled Optional. True, if the link preview is disabled (optional)
 * @param ?string $url Optional. URL to use for the link preview. If empty, then the first URL found in the message text
 *     will be used. (optional)
 * @param ?bool $prefer_small_media Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't
 *     explicitly specified or media size change isn't supported for the preview (optional)
 * @param ?bool $prefer_large_media Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL
 *     isn't explicitly specified or media size change isn't supported for the preview (optional)
 * @param ?bool $show_above_text Optional. True, if the link preview must be shown above the message text; otherwise, the link
 *     preview will be shown below the message text (optional)
 */
final class LinkPreviewOptions implements \JsonSerializable
{
    public function __construct(
        public readonly ?bool $is_disabled = null,
        public readonly ?string $url = null,
        public readonly ?bool $prefer_small_media = null,
        public readonly ?bool $prefer_large_media = null,
        public readonly ?bool $show_above_text = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->is_disabled !== null) $data['is_disabled'] = $this->is_disabled;

        if ($this->url !== null) $data['url'] = $this->url;

        if ($this->prefer_small_media !== null) $data['prefer_small_media'] = $this->prefer_small_media;

        if ($this->prefer_large_media !== null) $data['prefer_large_media'] = $this->prefer_large_media;

        if ($this->show_above_text !== null) $data['show_above_text'] = $this->show_above_text;


        return $data;
    }
}
