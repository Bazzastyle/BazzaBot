<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a chat photo.
 *
 * @see https://core.telegram.org/bots/api#chatphoto
 *
 * @param string $small_file_id File identifier of small (160x160) chat photo. This file_id can be used only for photo download and
 *     only for as long as the photo is not changed.
 * @param string $small_file_unique_id Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and
 *     for different bots. Can't be used to download or reuse the file.
 * @param string $big_file_id File identifier of big (640x640) chat photo. This file_id can be used only for photo download and
 *     only for as long as the photo is not changed.
 * @param string $big_file_unique_id Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and
 *     for different bots. Can't be used to download or reuse the file.
 */
final class ChatPhoto implements \JsonSerializable
{
    public function __construct(
        public readonly string $small_file_id,
        public readonly string $small_file_unique_id,
        public readonly string $big_file_id,
        public readonly string $big_file_unique_id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['small_file_id'] = $this->small_file_id;
        $data['small_file_unique_id'] = $this->small_file_unique_id;
        $data['big_file_id'] = $this->big_file_id;
        $data['big_file_unique_id'] = $this->big_file_unique_id;

        return $data;
    }
}
