<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents the content of a service message, sent whenever a user in the chat triggers a
 * proximity alert set by another user.
 *
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 *
 * @param User|array $traveler User that triggered the alert
 * @param User|array $watcher User that set the alert
 * @param int $distance The distance between the users
 */
final class ProximityAlertTriggered implements \JsonSerializable
{
    public function __construct(
        public readonly User|array $traveler,
        public readonly User|array $watcher,
        public readonly int $distance,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['traveler'] = $this->traveler;
        $data['watcher'] = $this->watcher;
        $data['distance'] = $this->distance;

        return $data;
    }
}
