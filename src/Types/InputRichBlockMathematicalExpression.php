<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * A block with a mathematical expression in LaTeX format, corresponding to the custom HTML tag
 * <tg-math-block>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmathematicalexpression
 *
 * @param string $type Type of the block, always “mathematical_expression”
 * @param string $expression The mathematical expression in LaTeX format
 */
final class InputRichBlockMathematicalExpression implements InputRichBlock, \JsonSerializable
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
