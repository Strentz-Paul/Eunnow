<?php

declare(strict_types=1);

namespace App\Tests\Unit\DTO\Loto;

use App\DTO\LotoDTO;
use App\DTO\SimulateurDTO;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class LotoDtoTest extends KernelTestCase
{
    public function testCreationDtoSuccess(): void
    {
        $baseDto = new LotoDTO();
        self::assertInstanceOf(LotoDTO::class, $baseDto);
    }

    public function testCreationDtoFail(): void
    {
        $baseDto = new LotoDTO();
        self::assertNotInstanceOf(SimulateurDTO::class, $baseDto);
    }

    public function testCreationDtoValueSuccess(): void
    {
        $baseDto = new LotoDTO();
        self::assertInstanceOf(LotoDTO::class, $baseDto);
        self::assertEquals(1, $baseDto->getNombreTirage());
        self::assertEquals('loto', $baseDto->getTypeDeTirage());
    }
}
