<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Loto;

use App\Contracts\Service\LotoServiceInterface;
use App\Tests\BaseServiceTest;

final class LotoServiceGenerateTirageTest extends BaseServiceTest
{
    protected const SERVIC_NAME = LotoServiceInterface::class;

    public function testGenerateTirage(): void
    {
        $service = self::init(self::SERVIC_NAME);
        $arrayNumber = $service->generateTirage(3, 1, 40);
        self::assertEquals(3, $arrayNumber->count());
        foreach ($arrayNumber as $number) {
            $countOfNumber = $arrayNumber->filter(static function (int $n) use ($number) {
                return $n === $number;
            })->count();
            self::assertEquals(1, $countOfNumber);
            self::assertGreaterThanOrEqual(1, $number);
            self::assertLessThanOrEqual(40, $number);
        }
    }
}
