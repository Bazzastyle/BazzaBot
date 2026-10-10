<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents type of a poll, which is allowed to be created and sent when the
 * corresponding button is pressed.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonpolltype
 *
 * @param ?string $type Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If
 *     regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create
 *     a poll of any type. (optional)
 */
final class KeyboardButtonPollType implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $type = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->type !== null) $data['type'] = $this->type;


        return $data;
    }
}
