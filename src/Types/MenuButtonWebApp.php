<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * Represents a menu button, which launches a Web App.
 *
 * @see https://core.telegram.org/bots/api#menubuttonwebapp
 *
 * @param string $type Type of the button, must be web_app
 * @param string $text Text on the button
 * @param WebAppInfo|array $web_app Description of the Web App that will be launched when the user presses the button. The Web App will
 *     be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
 *     Alternatively, a t.me link to a Web App of the bot can be specified in the object instead of the Web
 *     App's URL, in which case the Web App will be opened as if the user pressed the link.
 */
final class MenuButtonWebApp implements MenuButton, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $text,
        public readonly WebAppInfo|array $web_app,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['text'] = $this->text;
        $data['web_app'] = $this->web_app;

        return $data;
    }
}
