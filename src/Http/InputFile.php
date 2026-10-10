<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Http;

use Bazzastyle\BazzaBot\Exception\ConfigException;

/**
 * Wraps a local file path so TelegramClient can detect it and send it as
 * multipart/form-data instead of an inline JSON/urlencoded value.
 */
final class InputFile
{
    private readonly string $path;

    public function __construct(string $path, private readonly ?string $fileName = null)
    {
        if (!is_file($path) || !is_readable($path)) {
            throw new ConfigException(sprintf('InputFile: path not found or not readable: %s', $path));
        }

        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getFileName(): string
    {
        return $this->fileName ?? basename($this->path);
    }

    public function toCurlFile(): \CURLFile
    {
        return new \CURLFile($this->path, mime_content_type($this->path) ?: null, $this->getFileName());
    }
}
