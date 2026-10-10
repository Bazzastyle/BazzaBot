<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Types;

/**
 * AUTO-GENERATED — DO NOT EDIT BY HAND. Regenerate with: php tools/generate-types.php
 *
 * This object represents the scope to which bot commands are applied. Currently, the following 7
 * scopes are supported:
 *
 * Implemented by: BotCommandScopeDefault, BotCommandScopeAllPrivateChats, BotCommandScopeAllGroupChats, BotCommandScopeAllChatAdministrators, BotCommandScopeChat, BotCommandScopeChatAdministrators, BotCommandScopeChatMember.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope
 */
interface BotCommandScope extends \JsonSerializable
{
}
