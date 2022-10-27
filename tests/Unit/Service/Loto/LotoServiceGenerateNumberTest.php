<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Loto;

use App\Contracts\Service\LotoServiceInterface;
use App\Tests\BaseServiceTest;

final class LotoServiceGenerateNumberTest extends BaseServiceTest
{
    protected const SERVICE_NAME = LotoServiceInterface::class;

    public function testGenerateNumber(): void
    {
        $service = self::init(self::SERVICE_NAME);
        $number = $service->generateOneNumber(0, 100);
        self::assertLessThanOrEqual(100, $number);
        self::assertGreaterThanOrEqual(0, $number);
        $number = $service->generateOneNumber(5, 55);
        self::assertLessThanOrEqual(55, $number);
        self::assertGreaterThanOrEqual(5, $number);
    }
}
