<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Loto;

use App\Contracts\Service\LotoServiceInterface;
use App\Service\LotoService;
use App\Tests\BaseServiceTest;
use App\ViewModel\LotoVM;

final class LotoServiceGenerateLotoGrilleTest extends BaseServiceTest
{
    protected const SERVICE_NAME = LotoServiceInterface::class;

    public function testGenerateGrilleLoto(): void
    {
        $service = self::init(self::SERVICE_NAME);
        $tirage = $service->getTirageLoto();
        self::assertInstanceOf(LotoVM::class, $tirage);
        $countOfNumber = $tirage->getNumbers()->count();
        $countOfSpecials = $tirage->getSpecials()->count();
        self::assertEquals(LotoService::LOTO_COUNT_OF_NUMBER, $countOfNumber);
        self::assertEquals(LotoService::LOTO_COUNT_OF_SPECIAL, $countOfSpecials);
    }

    public function testGenerateMultipleGrilleLoto(): void
    {
        $service = self::init(self::SERVICE_NAME);
        $tirages = $service->getMultipleTirageLoto(3);
        self::assertInstanceOf(LotoVM::class, $tirages->first());
        $countOfGrille = $tirages->count();
        self::assertEquals(3, $countOfGrille);
    }
}
