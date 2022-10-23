<?php

declare(strict_types=1);

namespace App\Tests\Unit\DTO\Simulateur;

use App\DTO\SimulateurDTO;
use App\Form\SimulateurType;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class SimulateurDTOtest extends KernelTestCase
{
    public function testCreationDtoSuccess(): void
    {
        $baseDto = new SimulateurDTO();
        self::assertInstanceOf(SimulateurDTO::class, $baseDto);
    }

    public function testCreationDtoFail(): void
    {
        $baseDto = new SimulateurDTO();
        self::assertNotInstanceOf(SimulateurType::class, $baseDto);
    }

    public function testCreationDtoValueSuccess(): void
    {
        $baseDto = new SimulateurDTO();
        self::assertInstanceOf(SimulateurDTO::class, $baseDto);
        self::assertEquals(null, $baseDto->getTjm());
        self::assertEquals(null, $baseDto->getNbJours());
        self::assertEquals(null, $baseDto->getTauxImpots());
        self::assertEquals(34400, $baseDto->getPalierTVA());
        self::assertEquals(19.5, $baseDto->getTauxTVA());
    }

    public function testCreationDtoValueFail(): void
    {
        $baseDto = new SimulateurDTO();
        self::assertInstanceOf(SimulateurDTO::class, $baseDto);
        self::assertNotEquals(mt_rand(), $baseDto->getTjm());
        self::assertNotEquals(rand(), $baseDto->getNbJours());
        self::assertNotEquals(mt_rand(), $baseDto->getTauxImpots());
        self::assertNotEquals(mt_rand(), $baseDto->getPalierTVA());
        self::assertNotEquals(mt_rand(), $baseDto->getTauxTVA());
    }
}
