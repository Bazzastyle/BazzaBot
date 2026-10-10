<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents a service message about new members invited to a video chat.
 *
 * @see https://core.telegram.org/bots/api#videochatparticipantsinvited
 *
 * @param array $users New members that were invited to the video chat
 */
final class VideoChatParticipantsInvited implements \JsonSerializable
{
    public function __construct(
        public readonly array $users,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['users'] = $this->users;

        return $data;
    }
}
