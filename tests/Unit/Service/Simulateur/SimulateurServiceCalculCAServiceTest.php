<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Simulateur;

use App\Service\SimulateurService;
use App\Tests\BaseServiceTest;

final class SimulateurServiceCalculCAServiceTest extends BaseServiceTest
{
    protected const CLASS_NAME = SimulateurService::class;

    public function testCalculCaAnnuelSuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $calculCA = $service::calculCAAnnuel(100, 300);
        self::assertEquals(30000.00, $calculCA);
    }

    public function testCalculCaAnnuelSuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $calculCA = $service::calculCAAnnuel(192, 386.78);
        self::assertEquals(74261.76, $calculCA);
    }

    public function testCalculCaAnnuelFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $calculCA = $service::calculCAAnnuel(200, 350);
        self::assertNotEquals(50000.00, $calculCA);
    }

    public function testCalculCaAnnuelFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $calculCA = $service::calculCAAnnuel(177, 326.33);
        self::assertNotEquals(12000.41, $calculCA);
    }
}
