<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A mathematical expression.
 *
 * @see https://core.telegram.org/bots/api#richtextmathematicalexpression
 *
 * @param string $type Type of the rich text, always “mathematical_expression”
 * @param string $expression The expression in LaTeX format
 */
final class RichTextMathematicalExpression implements RichText, \JsonSerializable
{
    public function __construct(
        public readonly string $type,
        public readonly string $expression,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        $data = [];
        $data['type'] = $this->type;
        $data['expression'] = $this->expression;

        return $data;
    }
}
