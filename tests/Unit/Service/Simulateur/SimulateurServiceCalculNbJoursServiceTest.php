<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Simulateur;

use App\Service\SimulateurService;
use App\Tests\BaseServiceTest;

final class SimulateurServiceCalculNbJoursServiceTest extends BaseServiceTest
{
    protected const CLASS_NAME = SimulateurService::class;

    public function testCalculNbJoursAvantSeuilTVASuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $result = $service::calculNbJoursAvantSeuilTVA(358.56, 34400);
        self::assertEquals(95, $result);
    }

    public function testCalculNbJoursAvantSeuilTVASuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $result = $service::calculNbJoursAvantSeuilTVA(3583213.56, 34400);
        self::assertEquals(0, $result);
    }

    public function testCalculNbJoursAvantSeuilTVAFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $result = $service::calculNbJoursAvantSeuilTVA(322.56, 34400);
        self::assertNotEquals(123, $result);
    }

    public function testCalculNbJoursAvantSeuilTVAFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $result = $service::calculNbJoursAvantSeuilTVA(0.56, 34400);
        self::assertNotEquals(12, $result);
    }
}
