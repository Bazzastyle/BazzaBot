<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a file ready to be downloaded. The file can be downloaded via the link
 * https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be valid
 * for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
 *
 * @see https://core.telegram.org/bots/api#file
 *
 * @param string $file_id Identifier for this file, which can be used to download or reuse the file
 * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots.
 *     Can't be used to download or reuse the file.
 * @param ?int $file_size Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
 *     difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
 *     64-bit integer or double-precision float type are safe for storing this value. (optional)
 * @param ?string $file_path Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file. (optional)
 */
final class File implements \JsonSerializable
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly ?int $file_size = null,
        public readonly ?string $file_path = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['file_id'] = $this->file_id;
        $data['file_unique_id'] = $this->file_unique_id;
        if ($this->file_size !== null) $data['file_size'] = $this->file_size;

        if ($this->file_path !== null) $data['file_path'] = $this->file_path;


        return $data;
    }
}
