<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Webhook;

use Bazzastyle\BazzaBot\Exception\{InvalidUpdateException, WebhookValidationException};
use Bazzastyle\BazzaBot\Http\TelegramClient;
use Bazzastyle\BazzaBot\Routing\{Context, Router};
use Bazzastyle\BazzaBot\Update\Update;
use Psr\Log\LoggerInterface;

/**
 * Entry point for public/index.php in webhook mode: validates the request,
 * parses the update, and dispatches it through the Router. Only ever
 * responds with a plain HTTP status — no internal detail (stack trace,
 * error message) is ever exposed to the caller (Telegram).
 */
final class WebhookHandler
{
    public function __construct(
        private readonly TelegramClient $client,
        private readonly Router $router,
        private readonly WebhookValidator $validator,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function handle(?string $rawBody = null, ?string $secretHeader = null, ?string $sourceIp = null): void
    {
        try {
            $this->validator->validateSecretToken($secretHeader);
            $this->validator->validateSourceIp($sourceIp);

            $body = $rawBody ?? file_get_contents('php://input');
            if ($body === '' || $body === false) {
                throw new InvalidUpdateException('Empty request body');
            }

            $update = Update::fromJson($body);
            $context = new Context($update, $this->client, $this->logger);
            $this->router->dispatch($context);

            $this->respond(200);
        } catch (WebhookValidationException $e) {
            $this->logger->warning('Webhook validation failed: {message}', ['message' => $e->getMessage()]);
            $this->respond(401);
        } catch (InvalidUpdateException $e) {
            $this->logger->warning('Invalid update payload: {message}', ['message' => $e->getMessage()]);
            $this->respond(400);
        } catch (\Throwable $e) {
            $this->logger->critical('Unhandled exception in webhook: {message}', [
                'message' => $e->getMessage(),
                'exception' => $e,
            ]);
            $this->respond(500);
        }
    }

    private function respond(int $statusCode): void
    {
        if (!headers_sent()) {
            http_response_code($statusCode);
        }
    }
}
