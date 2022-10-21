<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Simulateur;

use App\Service\SimulateurService;
use App\Tests\BaseServiceTest;

final class SimulateurServiceCalculTjmServiceTest extends BaseServiceTest
{
    protected const CLASS_NAME = SimulateurService::class;

    public function testCalculTjmAvecTvaSuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmAvecTVA = $service::calculTJMAvecTVA(300, 19.6);
        self::assertEquals(358.8, $tjmAvecTVA);
    }

    public function testCalculTjmAvecTvaSuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmAvecTVA = $service::calculTJMAvecTVA(369.60, 13.6);
        self::assertEquals(419.87, $tjmAvecTVA);
    }

    public function testCalculTjmAvecTvaFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmAvecTVA = $service::calculTJMAvecTVA(221.34, 12.5);
        self::assertNotEquals(104.7, $tjmAvecTVA);
    }

    public function testCalculTjmAvecTvaFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmAvecTVA = $service::calculTJMAvecTVA(3.54, 12.94);
        self::assertNotEquals(670.5, $tjmAvecTVA);
    }

    public function testCalculTjmApresImpotSuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresImpots(222.22, 10.7);
        self::assertEquals(198.44, $tjmApresImpot);
    }

    public function testCalculTjmApresImpotSuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresImpots(36598.89, 43.79);
        self::assertEquals(20572.24, $tjmApresImpot);
    }

    public function testCalculTjmApresImpotFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresImpots(390, 1.7);
        self::assertNotEquals(222.22, $tjmApresImpot);
    }

    public function testCalculTjmApresImpotFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresImpots(45938423465.9857, 14.74325432342);
        self::assertNotEquals(123.56, $tjmApresImpot);
    }

    public function testCalculTjmApresUrssafSuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresURSSAF(312.56);
        self::assertEquals(243.17, $tjmApresImpot);
    }

    public function testCalculTjmApresUrssafSuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresURSSAF(19740.779);
        self::assertEquals(15358.33, $tjmApresImpot);
    }

    public function testCalculTjmApresUrssafFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresURSSAF(298.45);
        self::assertNotEquals(0.0, $tjmApresImpot);
    }

    public function testCalculTjmApresUrssafFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $tjmApresImpot = $service::calculTJMApresURSSAF(45938423465.9857);
        self::assertNotEquals(34894.54, $tjmApresImpot);
    }
}
