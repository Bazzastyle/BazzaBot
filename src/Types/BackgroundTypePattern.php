<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * The background is a .PNG or .TGV (gzipped subset of SVG with MIME type
 * “application/x-tgwallpattern”) pattern to be combined with the background fill chosen by the
 * user.
 *
 * @see https://core.telegram.org/bots/api#backgroundtypepattern
 *
 * @param string $type Type of the background, always “pattern”
 * @param Document|array $document Document with the pattern
 * @param BackgroundFill|array $fill The background fill that is combined with the pattern
 * @param int $intensity Intensity of the pattern when it is shown above the filled background; 0-100
 * @param ?bool $is_inverted Optional. True, if the background fill must be applied only to the pattern itself. All other pixels
 *     are black in this case. For dark themes only. (optional)
 * @param ?bool $is_moving Optional. True, if the background moves slightly when the device is tilted (optional)
 */
final class BackgroundTypePattern implements BackgroundType, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly Document|array $document,
        public readonly BackgroundFill|array $fill,
        public readonly int $intensity,
        public readonly ?bool $is_inverted = null,
        public readonly ?bool $is_moving = null,
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
        $data['fill'] = $this->fill;
        $data['intensity'] = $this->intensity;
        if ($this->is_inverted !== null) $data['is_inverted'] = $this->is_inverted;

        if ($this->is_moving !== null) $data['is_moving'] = $this->is_moving;


        return $data;
    }
}
