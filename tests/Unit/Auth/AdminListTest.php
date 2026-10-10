<?php

declare(strict_types=1);

namespace Bazzastyle\BazzaBot\Tests\Unit\Auth;

use Bazzastyle\BazzaBot\Auth\AdminList;
use Bazzastyle\BazzaBot\Config\Config;
use PHPUnit\Framework\TestCase;

final class AdminListTest extends TestCase
{
    public function testIsAdminTrueForConfiguredIds(): void
    {
        $admins = new AdminList([111, 222]);

        self::assertTrue($admins->isAdmin(111));
        self::assertTrue($admins->isAdmin(222));
        self::assertFalse($admins->isAdmin(333));
    }

    public function testIsAdminAcceptsStringOrIntIndifferently(): void
    {
        $admins = new AdminList(['111', 222]);

        self::assertTrue($admins->isAdmin(111));
        self::assertTrue($admins->isAdmin('111'));
        self::assertTrue($admins->isAdmin(222));
        self::assertTrue($admins->isAdmin('222'));
    }

    public function testIsAdminFalseForNullOrNonNumeric(): void
    {
        $admins = new AdminList([111]);

        self::assertFalse($admins->isAdmin(null));
        self::assertFalse($admins->isAdmin('not-a-number'));
    }

    public function testEmptyListRejectsEveryone(): void
    {
        $admins = new AdminList();

        self::assertTrue($admins->isEmpty());
        self::assertFalse($admins->isAdmin(111));
    }

    public function testFromConfigParsesCommaSeparatedIds(): void
    {
        $path = tempnam(sys_get_temp_dir(), 'tgfw_admins_test_');
        file_put_contents($path, "ADMINS=111111111, 222222222,333333333\n");

        $admins = AdminList::fromConfig(Config::fromEnvFile($path));

        self::assertFalse($admins->isEmpty());
        self::assertTrue($admins->isAdmin(111111111));
        self::assertTrue($admins->isAdmin(222222222));
        self::assertTrue($admins->isAdmin(333333333));
        self::assertSame([111111111, 222222222, 333333333], $admins->all());

        unlink($path);
    }

    public function testFromConfigWithMissingKeyIsEmpty(): void
    {
        $path = tempnam(sys_get_temp_dir(), 'tgfw_admins_test_');
        file_put_contents($path, "TELEGRAM_BOT_TOKEN=x\n");

        $admins = AdminList::fromConfig(Config::fromEnvFile($path));

        self::assertTrue($admins->isEmpty());

        unlink($path);
    }
}
