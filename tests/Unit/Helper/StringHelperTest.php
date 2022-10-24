<?php

declare(strict_types=1);

namespace App\Tests\Unit\Helper;

use App\Helper\StringHelper;
use App\Tests\BaseServiceTest;

final class StringHelperTest extends BaseServiceTest
{
    public function testRemoveErrorTextFromStringSuccess(): void
    {
        $string = "ERROR: Je suis un jolie test";
        $result = StringHelper::removeTextFromString("ERROR", $string);
        self::assertStringNotContainsString('ERROR', $result);
    }

    public function testRemoveErrorTextFromStringFail(): void
    {
        $string = "ERROR: Je suis un jolie test";
        $result = StringHelper::removeTextFromString("Error", $string);
        self::assertStringContainsString('ERROR', $result);
    }
}
