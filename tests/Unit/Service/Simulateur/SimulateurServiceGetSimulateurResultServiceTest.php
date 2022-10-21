<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Simulateur;

use App\DTO\SimulateurDTO;
use App\Service\SimulateurService;
use App\Tests\BaseServiceTest;
use App\ViewModel\SimulateurVM;

final class SimulateurServiceGetSimulateurResultServiceTest extends BaseServiceTest
{
    protected const CLASS_NAME = SimulateurService::class;

    public function testGetResultSimulateurSuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $dto = new SimulateurDTO(300, 200, 10);
        $result = $service::getResultSimulateur($dto);
        self::assertInstanceOf(SimulateurVM::class, $result);
        self::assertEquals(65557.5, $result->getChiffreAffaireAnnuel());
        self::assertEquals(95, $result->getNbJoursAvantSeuilTVA());
        self::assertEquals(45903.2, $result->getSalaireAnnuel());
        self::assertEquals(3825.27, $result->getSalaireMensuel());
        self::assertEquals(358.5, $result->getTjmAvantSeuilTVA());
    }

    public function testGetResultSimulateurSuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $dto = new SimulateurDTO(452.78, 200, 10.7);
        $result = $service::getResultSimulateur($dto);
        self::assertInstanceOf(SimulateurVM::class, $result);
        self::assertEquals(96118.27, $result->getChiffreAffaireAnnuel());
        self::assertEquals(63, $result->getNbJoursAvantSeuilTVA());
        self::assertEquals(66778.42, $result->getSalaireAnnuel());
        self::assertEquals(5564.87, $result->getSalaireMensuel());
        self::assertEquals(541.07, $result->getTjmAvantSeuilTVA());
    }

    public function testGetResultSimulateurFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $dto = new SimulateurDTO(300, 200, 10);
        $result = $service::getResultSimulateur($dto);
        self::assertNotInstanceOf(SimulateurDTO::class, $result);
    }

    public function testGetResultSimulateurFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $dto = new SimulateurDTO(452.78, 200, 10.7);
        $result = $service::getResultSimulateur($dto);
        self::assertInstanceOf(SimulateurVM::class, $result);
        self::assertNotEquals(120000, $result->getChiffreAffaireAnnuel());
        self::assertNotEquals(12, $result->getNbJoursAvantSeuilTVA());
        self::assertNotEquals(22547.8968, $result->getSalaireAnnuel());
        self::assertNotEquals(478.87, $result->getSalaireMensuel());
        self::assertNotEquals(452.78, $result->getTjmAvantSeuilTVA());
    }
}
