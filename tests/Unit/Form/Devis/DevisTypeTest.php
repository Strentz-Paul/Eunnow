<?php

declare(strict_types=1);

namespace App\Tests\Unit\Form\Devis;

use App\DTO\DevisDTO;
use App\Form\DevisType;
use App\Tests\BaseFormTest;

final class DevisTypeTest extends BaseFormTest
{
    protected const DATA_SUCCESS = array(
        'tjm' => 350,
        'nbJours' => 20,
        'entrepriseName' => 'Paul Strentz',
        'tauxTVA' => 19.5,
        'tvaApplicable' => false,
        'mois' => 'Juillet'
    );

    protected const DATA_FAIL = array(
        'tjm' => 19,
        'nbJours' => "euromillion",
        'entrepriseName' => 'Paul Strentz',
        'tauxTVA' => 19.5,
        'mois' => 'Juillet'
    );

    public function testSubmitFormSuccess(): void
    {
        $dto = new DevisDTO();
        $form = $this->init(DevisType::class, $dto);

        $expected = new DevisDTO();
        $expected->setTjm(350)
            ->setTvaApplicable(false)
            ->setNbJours(20)
            ->setMois('Juillet')
            ->setEntrepriseName('Paul Strentz');

        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertEquals($expected, $dto);
    }

    public function testSubmitFormValueFail(): void
    {
        $dto = new DevisDTO();
        $form = $this->init(DevisType::class, $dto);

        $expected = new DevisDTO();
        $expected->setTjm(100)
            ->setTvaApplicable(true)
            ->setNbJours(2)
            ->setMois('Juillet')
            ->setEntrepriseName('Paul Strentz');
        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertNotEquals($expected, $dto);
    }

    public function testSubmitFormValueDataSuccess(): void
    {
        $dto = new DevisDTO();
        $form = $this->init(DevisType::class, $dto);

        $expected = new DevisDTO();
        $expected->setTjm(350)
            ->setTvaApplicable(false)
            ->setNbJours(20)
            ->setMois('Juillet')
            ->setEntrepriseName('Paul Strentz');

        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertEquals($expected, $dto);
        self::assertGreaterThanOrEqual(100, $dto->getTjm());
        self::assertLessThanOrEqual(10000, $dto->getTjm());
        self::assertGreaterThan(0, $dto->getNbJours());
        self::assertLessThanOrEqual(20, $dto->getNbJours());
        self::assertGreaterThan(0, $dto->getTauxTVA());
        self::assertLessThanOrEqual(100, $dto->getTauxTVA());
        self::assertIsString($dto->getEntrepriseName());
        self::assertNotNull($dto->getEntrepriseName());
        self::assertIsBool($dto->getTvaApplicable());
        self::assertIsString($dto->getMois());
        self::assertEquals('Juillet', $dto->getMois());
    }

    public function testSubmitFormValueDataFail(): void
    {
        $dto = new DevisDTO();
        $form = $this->init(DevisType::class, $dto);

        $form->submit(self::DATA_FAIL);
        self::assertFalse($form->isValid());
    }
}
