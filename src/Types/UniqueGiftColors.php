<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object contains information about the color scheme for a user's name, message replies and link
 * previews based on a unique gift.
 *
 * @see https://core.telegram.org/bots/api#uniquegiftcolors
 *
 * @param string $model_custom_emoji_id Custom emoji identifier of the unique gift's model
 * @param string $symbol_custom_emoji_id Custom emoji identifier of the unique gift's symbol
 * @param int $light_theme_main_color Main color used in light themes; RGB format
 * @param array $light_theme_other_colors List of 1-3 additional colors used in light themes; RGB format
 * @param int $dark_theme_main_color Main color used in dark themes; RGB format
 * @param array $dark_theme_other_colors List of 1-3 additional colors used in dark themes; RGB format
 */
final class UniqueGiftColors implements \JsonSerializable
{
    public function __construct(
        public readonly string $model_custom_emoji_id,
        public readonly string $symbol_custom_emoji_id,
        public readonly int $light_theme_main_color,
        public readonly array $light_theme_other_colors,
        public readonly int $dark_theme_main_color,
        public readonly array $dark_theme_other_colors,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['model_custom_emoji_id'] = $this->model_custom_emoji_id;
        $data['symbol_custom_emoji_id'] = $this->symbol_custom_emoji_id;
        $data['light_theme_main_color'] = $this->light_theme_main_color;
        $data['light_theme_other_colors'] = $this->light_theme_other_colors;
        $data['dark_theme_main_color'] = $this->dark_theme_main_color;
        $data['dark_theme_other_colors'] = $this->dark_theme_other_colors;

        return $data;
    }
}
