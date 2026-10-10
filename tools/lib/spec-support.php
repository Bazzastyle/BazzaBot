<?php

declare(strict_types=1);

/**
 * Shared helpers for tools/generate-methods.php and tools/generate-types.php.
 * Both read the same Telegram Bot API spec and need the same field-type
 * mapping rules, so the logic lives here once instead of being duplicated.
 */

const SPEC_URL = 'https://raw.githubusercontent.com/davtur19/TuriBotGen/refs/heads/master/botapi.json';
const LINE_WIDTH = 100;

function fetchSpec(string $url = SPEC_URL): stdClass
{
    $context = stream_context_create(['http' => [
        'timeout' => 30,
        'header' => "User-Agent: bazzastyle-bazzabot-generator\r\n",
    ]]);
    $json = @file_get_contents($url, false, $context);

    if ($json === false) {
        fwrite(STDERR, "Unable to download the API spec from {$url}\n");
        exit(1);
    }

    $data = json_decode($json);

    if (!$data instanceof stdClass || !isset($data->methods, $data->types)) {
        fwrite(STDERR, "Downloaded spec is not in the expected format (missing \"methods\"/\"types\")\n");
        exit(1);
    }

    return $data;
}

function wrapComment(string $text, string $continuationIndent, int $width = LINE_WIDTH): string
{
    $text = trim(preg_replace('/\s+/', ' ', str_replace('*/', '* /', $text)) ?? '');

    return wordwrap($text, $width, "\n{$continuationIndent}", false);
}

/**
 * Type names that are pure interfaces: the spec lists no fields of their
 * own, only concrete subtypes in `extended_by` (e.g. InputMedia, ChatMember,
 * BotCommandScope). Every one of their listed subtypes is expected to exist
 * as its own entry in $spec->types.
 *
 * @return array<string, true>
 */
function abstractTypeNames(stdClass $spec): array
{
    $names = [];
    foreach ($spec->types as $type) {
        if (($type->fields ?? []) === [] && ($type->extended_by ?? []) !== []) {
            $names[$type->name] = true;
        }
    }

    return $names;
}

/**
 * All type names the generator will treat as real PHP classes/interfaces,
 * excluding "InputFile": that concept is already represented by
 * Bazzastyle\BazzaBot\Http\InputFile (a local-file upload wrapper), so no
 * Types\InputFile class is generated for it.
 *
 * @return array<string, true>
 */
function knownTypeNames(stdClass $spec): array
{
    $names = [];
    foreach ($spec->types as $type) {
        if ($type->name !== 'InputFile') {
            $names[$type->name] = true;
        }
    }

    return $names;
}

/**
 * Maps one field's raw `types` list (as found in the spec) to a PHP type
 * string, WITHOUT the nullable/optional suffix (see nullableType()).
 *
 * Rules: scalars pass through as-is; "InputFile" becomes the fully-qualified
 * upload wrapper; any "Array<...>" becomes plain `array` (PHP has no
 * generics — the element type is documented in the docblock instead);
 * abstract type names become their generated interface; concrete type names
 * become their generated class. Whenever the result contains at least one
 * class/interface name, a plain `array` alternative is appended so callers
 * can always pass a raw associative array instead of building the object
 * graph, keeping strong typing opt-in rather than mandatory.
 *
 * @param array<int, string> $rawTypes
 * @param array<string, true> $abstractNames
 * @param array<string, true> $knownTypeNames
 */
function mapFieldType(array $rawTypes, array $abstractNames, array $knownTypeNames): string
{
    $mapped = [];
    $hasNamedType = false;

    foreach ($rawTypes as $type) {
        if (in_array($type, ['int', 'string', 'bool', 'float'], true)) {
            $mapped[] = $type;
        } elseif ($type === 'InputFile') {
            $mapped[] = '\\Bazzastyle\\BazzaBot\\Http\\InputFile';
        } elseif (str_starts_with($type, 'Array<')) {
            $mapped[] = 'array';
        } elseif (isset($abstractNames[$type]) || isset($knownTypeNames[$type])) {
            $mapped[] = $type;
            $hasNamedType = true;
        } else {
            $mapped[] = 'array';
        }
    }

    if ($hasNamedType && !in_array('array', $mapped, true)) {
        $mapped[] = 'array';
    }

    return implode('|', array_unique($mapped));
}

function nullableType(string $type, bool $optional): string
{
    if (!$optional) {
        return $type;
    }

    return str_contains($type, '|') ? "{$type}|null" : "?{$type}";
}

/**
 * Builds a ready-to-splice `use` block (including trailing blank line) for
 * one or more class names under the same namespace prefix, as a grouped
 * `use Prefix\{A, B};` statement once there is more than one name to avoid
 * stretching the import block with repeated prefixes. Returns an empty
 * string when $names is empty, so callers can always append the result
 * without an extra conditional.
 *
 * @param array<int, string> $names
 */
function buildGroupedUseLines(string $prefix, array $names): string
{
    if ($names === []) {
        return '';
    }

    if (count($names) === 1) {
        return "use {$prefix}\\{$names[0]};\n\n";
    }

    return "use {$prefix}\\{\n    " . implode(",\n    ", $names) . ",\n};\n\n";
}

/**
 * Removes every generated *.php file from a directory before a fresh
 * regeneration, so types Telegram has since removed don't linger. Files
 * are recognised by the shared "AUTO-GENERATED" header, not by wiping the
 * directory wholesale, in case a maintainer ever drops a hand-written file
 * there by mistake.
 */
function clearGeneratedFiles(string $directory): void
{
    if (!is_dir($directory)) {
        mkdir($directory, 0775, true);

        return;
    }

    foreach (glob($directory . '/*.php') ?: [] as $file) {
        $contents = file_get_contents($file);
        if ($contents !== false && str_contains($contents, 'AUTO-GENERATED')) {
            unlink($file);
        }
    }
}
