<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Devis;

use App\Contracts\Service\DevisServiceInterface;
use App\DTO\DevisDTO;
use App\Service\DevisService;
use App\Tests\BaseServiceTest;
use App\ViewModel\DevisVM;

final class DevisServiceGenerateDevisTest extends BaseServiceTest
{
    protected const CLASS_NAME = DevisServiceInterface::class;

    public function testGenerateDevis(): void
    {
        $service = self::init(self::CLASS_NAME);

        $dto = new DevisDTO();
        $dto->setEntrepriseName('Paul')
            ->setMois('Janvier')
            ->setNbJours(20)
            ->setTjm(300)
            ->setTvaApplicable(false);
        $result = $service::generateDevis($dto);
        self::assertInstanceOf(DevisVM::class, $result);
        self::assertEquals(300, $result->getTjm());
        self::assertEquals(20, $result->getNbJours());
        self::assertEquals('Janvier', $result->getMois());
        self::assertEquals('Paul', $result->getNomEntreprise());
        self::assertEquals(6000, $result->getTotal());
//        TODO: A changer de place pour le mettre dans une méthode complexe, voir pour le calcul du simulateur
//        $dto2 = new DevisDTO();
//        $dto2->setEntrepriseName('Paul')
//            ->setMois('Janvier')
//            ->setNbJours(20)
//            ->setTjm(300)
//            ->setTvaApplicable(true);
//        $result2 = $service::generateDevis($dto2);
    }
}
