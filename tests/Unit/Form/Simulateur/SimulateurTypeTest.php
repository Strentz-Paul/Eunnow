<?php

declare(strict_types=1);

namespace App\Tests\Unit\Form\Simulateur;

use App\DTO\SimulateurDTO;
use App\Form\SimulateurType;
use App\Tests\BaseFormTest;

final class SimulateurTypeTest extends BaseFormTest
{
    protected const DATA_SUCCESS = array(
        'tjm' => 300,
        'nbJours' => 200,
        'tauxImpots' => 10.7,
        'palierTVA' => 34400,
        'tauxTVA' => 19.5
    );

    protected const DATA_FAIL = array(
        'tjm' => 0,
        'nbJours' => 0,
        'tauxImpots' => -2.5,
        'palierTVA' => -13,
        'tauxTVA' => -6
    );

    public function testSubmitFormSuccess(): void
    {
        $dto = new SimulateurDTO();
        $form = $this->init(SimulateurType::class, $dto);

        $expected = new SimulateurDTO(300, 200, 10.7);
        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertEquals($expected, $dto);
    }

    public function testSubmitFormValueFail(): void
    {
        $dto = new SimulateurDTO();
        $form = $this->init(SimulateurType::class, $dto);

        $expected = new SimulateurDTO(248, 175, 10.7);
        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertNotEquals($expected, $dto);
    }

    public function testSubmitFormValueDataSuccess(): void
    {
        $dto = new SimulateurDTO();
        $form = $this->init(SimulateurType::class, $dto);

        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertGreaterThanOrEqual(0, $dto->getTauxTVA());
        self::assertGreaterThanOrEqual(0, $dto->getPalierTVA());
        self::assertGreaterThanOrEqual(0, $dto->getTauxImpots());
        self::assertGreaterThan(0, $dto->getTjm());
        self::assertGreaterThan(0, $dto->getNbJours());
    }

    public function testSubmitFormValueDataFail(): void
    {
        $dto = new SimulateurDTO();
        $form = $this->init(SimulateurType::class, $dto);

        $form->submit(self::DATA_FAIL);
        self::assertFalse($form->isValid());
    }
}
