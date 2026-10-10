<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Exception;

use Bazzastyle\BazzaBot\Http\TelegramResponse;

/**
 * Thrown when Telegram responds with {"ok": false, ...}.
 */
class TelegramApiException extends BazzabotException
{
    public function __construct(
        private readonly TelegramResponse $response,
        private readonly string $method,
        private readonly array $params = [],
    ) {
        parent::__construct(
            sprintf(
                'Telegram API error on "%s": [%d] %s',
                $method,
                $response->errorCode ?? 0,
                $response->description ?? 'unknown error',
            ),
            $response->errorCode ?? 0,
        );
    }

    public function getResponse(): TelegramResponse
    {
        return $this->response;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    /** @return array<string, mixed> */
    public function getParams(): array
    {
        return $this->params;
    }
}
