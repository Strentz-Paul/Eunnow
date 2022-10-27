<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Loto;

use App\Contracts\Service\LotoServiceInterface;
use App\Service\LotoService;
use App\Tests\BaseServiceTest;
use App\ViewModel\EuromillionVM;
use App\ViewModel\LotoVM;

final class LotoServiceGenerateEuromillionGrilleTest extends BaseServiceTest
{
    protected const SERVICE_NAME = LotoServiceInterface::class;

    public function testGenerateGrilleEuromillion(): void
    {
        $service = self::init(self::SERVICE_NAME);
        $tirage = $service->getTirageEuromillion();
        self::assertInstanceOf(EuromillionVM::class, $tirage);
        $countOfNumber = $tirage->getNumbers()->count();
        $countOfSpecials = $tirage->getSpecials()->count();
        self::assertEquals(LotoService::EUROMILLION_COUNT_OF_NUMBER, $countOfNumber);
        self::assertEquals(LotoService::EUROMILLION_COUNT_OF_SPECIAL, $countOfSpecials);
    }

    public function testGenerateMultipleGrilleEuromillion(): void
    {
        $service = self::init(self::SERVICE_NAME);
        $tirages = $service->getMultipleTirageEuromillion(9);
        self::assertInstanceOf(EuromillionVM::class, $tirages->first());
        $countOfGrille = $tirages->count();
        self::assertEquals(9, $countOfGrille);
    }
}
