<?php

declare(strict_types=1);

namespace App\Tests\Unit\Form\Loto;

use App\DTO\LotoDTO;
use App\Form\LotoType;
use App\Tests\BaseFormTest;

final class LotoTypeTest extends BaseFormTest
{
    protected const DATA_SUCCESS = array(
        'nombreTirage' => 19,
        'typeDeTirage' => "euromillion"
    );

    protected const DATA_FAIL = array(
        'nombreTirage' => 0,
        'typeDeTirage' => 'loto'
    );

    public function testSubmitFormSuccess(): void
    {
        $dto = new LotoDTO();
        $form = $this->init(LotoType::class, $dto);

        $expected = new LotoDTO(19, 'euromillion');
        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertEquals($expected, $dto);
    }

    public function testSubmitFormValueFail(): void
    {
        $dto = new LotoDTO();
        $form = $this->init(LotoType::class, $dto);

        $expected = new LotoDTO(12, 'loto');
        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertNotEquals($expected, $dto);
    }

    public function testSubmitFormValueDataSuccess(): void
    {
        $dto = new LotoDTO();
        $form = $this->init(LotoType::class, $dto);

        $form->submit(self::DATA_SUCCESS);
        self::assertTrue($form->isSynchronized());
        self::assertGreaterThanOrEqual(0, $dto->getNombreTirage());
        self::assertIsString($dto->getTypeDeTirage());
        self::assertNotNull($dto->getTypeDeTirage());
        self::assertEquals('euromillion', $dto->getTypeDeTirage());
    }

    public function testSubmitFormValueDataFail(): void
    {
        $dto = new LotoDTO();
        $form = $this->init(LotoType::class, $dto);

        $form->submit(self::DATA_FAIL);
        self::assertFalse($form->isValid());
    }
}
