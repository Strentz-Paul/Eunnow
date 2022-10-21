<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Simulateur;

use App\Service\SimulateurService;
use App\Tests\BaseServiceTest;

final class SimulateurServiceCalculSalaireMensuelServiceTest extends BaseServiceTest
{
    protected const CLASS_NAME = SimulateurService::class;

    public function testCalculSalaireMensuelSuccessSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $salaireMensuel = $service::calculSalaire(300, 200, 10, 34400, 19.5, false);
        self::assertEquals(3825.27, $salaireMensuel);
    }

    public function testCalculSalaireMensuelSuccessComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $salaireMensuel = $service::calculSalaire(452.78, 200, 10.7, 34400, 19.5, false);
        self::assertEquals(5564.87, $salaireMensuel);
    }

    public function testCalculSalaireMensuelFailSimple(): void
    {
        $service = self::init(self::CLASS_NAME);

        $salaireMensuel = $service::calculSalaire(100, 10, 10.7, 34400, 19.5, false);
        self::assertNotEquals(1200, $salaireMensuel);
    }

    public function testCalculSalaireMensuelFailComplexe(): void
    {
        $service = self::init(self::CLASS_NAME);

        $salaireMensuel = $service::calculSalaire(56.7, 120, 3, 34400, 19.5, false);
        self::assertNotEquals(12000.27, $salaireMensuel);
    }
}
