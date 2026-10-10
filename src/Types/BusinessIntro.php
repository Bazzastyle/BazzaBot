<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Contains information about the start page settings of a Telegram Business account.
 *
 * @see https://core.telegram.org/bots/api#businessintro
 *
 * @param ?string $title Optional. Title text of the business intro (optional)
 * @param ?string $message Optional. Message text of the business intro (optional)
 * @param Sticker|array|null $sticker Optional. Sticker of the business intro (optional)
 */
final class BusinessIntro implements \JsonSerializable
{
    public function __construct(
        public readonly ?string $title = null,
        public readonly ?string $message = null,
        public readonly Sticker|array|null $sticker = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->title !== null) $data['title'] = $this->title;

        if ($this->message !== null) $data['message'] = $this->message;

        if ($this->sticker !== null) $data['sticker'] = $this->sticker;


        return $data;
    }
}
