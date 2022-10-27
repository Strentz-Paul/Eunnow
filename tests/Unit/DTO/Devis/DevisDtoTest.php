<?php

declare(strict_types=1);

namespace App\Tests\Unit\DTO\Devis;

use App\DTO\DevisDTO;
use App\DTO\SimulateurDTO;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DevisDtoTest extends KernelTestCase
{
    public function testCreationDtoSuccess(): void
    {
        $baseDto = new DevisDTO();
        self::assertInstanceOf(DevisDTO::class, $baseDto);
    }

    public function testCreationDtoFail(): void
    {
        $baseDto = new DevisDTO();
        self::assertNotInstanceOf(SimulateurDTO::class, $baseDto);
    }

    public function testCreationDtoValueSuccess(): void
    {
        $baseDto = new DevisDTO();
        $baseDto->setEntrepriseName('Paul Strentz')
            ->setMois('juillet')
            ->setNbJours(20)
            ->setTjm(200)
            ->setTvaApplicable(false);
        self::assertInstanceOf(DevisDTO::class, $baseDto);
        self::assertEquals('Paul Strentz', $baseDto->getEntrepriseName());
        self::assertEquals('juillet', $baseDto->getMois());
        self::assertEquals(20, $baseDto->getNbJours());
        self::assertEquals(200, $baseDto->getTjm());
        self::assertEquals(19.5, $baseDto->getTauxTVA());
        self::assertEquals(false, $baseDto->getTvaApplicable());
    }
}
