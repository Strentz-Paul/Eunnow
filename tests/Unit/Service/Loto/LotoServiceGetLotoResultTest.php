<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service\Loto;

use App\Contracts\Service\LotoServiceInterface;
use App\DTO\LotoDTO;
use App\Tests\BaseServiceTest;
use App\ViewModel\EuromillionVM;
use App\ViewModel\LotoVM;
use App\ViewModel\TiragesVM;

final class LotoServiceGetLotoResultTest extends BaseServiceTest
{
    protected const SERVIC_NAME = LotoServiceInterface::class;

    public function testGetResult(): void
    {
        $service = self::init(self::SERVIC_NAME);
        $dto = new LotoDTO(12, "euromillion");
        $result = $service::getResult($dto);
        self::assertInstanceOf(TiragesVM::class, $result);
        self::assertEquals(12, $result->getTirage()->count());
        self::assertInstanceOf(EuromillionVM::class, $result->getTirage()->first());
    }
}
