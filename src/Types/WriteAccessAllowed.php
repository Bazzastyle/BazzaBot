<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about a user allowing a bot to write messages after adding
 * it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a
 * Web App sent by the method requestWriteAccess.
 *
 * @see https://core.telegram.org/bots/api#writeaccessallowed
 *
 * @param ?bool $from_request Optional. True, if the access was granted after the user accepted an explicit request from a Web App
 *     sent by the method requestWriteAccess (optional)
 * @param ?string $web_app_name Optional. Name of the Web App, if the access was granted when the Web App was launched from a link (optional)
 * @param ?bool $from_attachment_menu Optional. True, if the access was granted when the bot was added to the attachment or side menu (optional)
 */
final class WriteAccessAllowed implements \JsonSerializable
{
    public function __construct(
        public readonly ?bool $from_request = null,
        public readonly ?string $web_app_name = null,
        public readonly ?bool $from_attachment_menu = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        if ($this->from_request !== null) $data['from_request'] = $this->from_request;

        if ($this->web_app_name !== null) $data['web_app_name'] = $this->web_app_name;

        if ($this->from_attachment_menu !== null) $data['from_attachment_menu'] = $this->from_attachment_menu;


        return $data;
    }
}
