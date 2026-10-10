<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object defines the criteria used to request suitable users. Information about the selected
 * users will be shared with the bot when the corresponding button is pressed. More about requesting
 * users »
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestusers
 *
 * @param int $request_id Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must
 *     be unique within the message.
 * @param ?bool $user_is_bot Optional. Pass True to request bots, pass False to request regular users. If not specified, no
 *     additional restrictions are applied. (optional)
 * @param ?bool $user_is_premium Optional. Pass True to request premium users, pass False to request non-premium users. If not
 *     specified, no additional restrictions are applied. (optional)
 * @param ?int $max_quantity Optional. The maximum number of users to be selected; 1-10. Defaults to 1. (optional)
 * @param ?bool $request_name Optional. Pass True to request the users' first and last names (optional)
 * @param ?bool $request_username Optional. Pass True to request the users' usernames (optional)
 * @param ?bool $request_photo Optional. Pass True to request the users' photos (optional)
 */
final class KeyboardButtonRequestUsers implements \JsonSerializable
{
    public function __construct(
        public readonly int $request_id,
        public readonly ?bool $user_is_bot = null,
        public readonly ?bool $user_is_premium = null,
        public readonly ?int $max_quantity = null,
        public readonly ?bool $request_name = null,
        public readonly ?bool $request_username = null,
        public readonly ?bool $request_photo = null,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['request_id'] = $this->request_id;
        if ($this->user_is_bot !== null) $data['user_is_bot'] = $this->user_is_bot;

        if ($this->user_is_premium !== null) $data['user_is_premium'] = $this->user_is_premium;

        if ($this->max_quantity !== null) $data['max_quantity'] = $this->max_quantity;

        if ($this->request_name !== null) $data['request_name'] = $this->request_name;

        if ($this->request_username !== null) $data['request_username'] = $this->request_username;

        if ($this->request_photo !== null) $data['request_photo'] = $this->request_photo;


        return $data;
    }
}
