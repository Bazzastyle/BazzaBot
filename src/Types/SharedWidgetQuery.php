<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents an incoming query from a forwarded message with a shared widget created by
 * the bot. Use answerWidgetQuery to answer the query. Each user can send at most 5 queries per 5
 * seconds to the bot from all its widgets.
 *
 * @see https://core.telegram.org/bots/api#sharedwidgetquery
 *
 * @param string $id Unique identifier for this query
 * @param User|array $from Sender
 * @param WidgetQueryType|array $type Type of the query
 * @param string $data Data of the query, 1-64 bytes
 * @param string $widget_id Unique identifier of the shared widget, which sent the query
 */
final class SharedWidgetQuery implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly User|array $from,
        public readonly WidgetQueryType|array $type,
        public readonly string $data,
        public readonly string $widget_id,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['id'] = $this->id;
        $data['from'] = $this->from;
        $data['type'] = $this->type;
        $data['data'] = $this->data;
        $data['widget_id'] = $this->widget_id;

        return $data;
    }
}
