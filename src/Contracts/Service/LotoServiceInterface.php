<?php

declare(strict_types=1);

namespace App\Contracts\Service;

use App\DTO\LotoDTO;
use App\ViewModel\EuromillionVM;
use App\ViewModel\LotoVM;
use App\ViewModel\TiragesVM;
use Doctrine\Common\Collections\Collection;

interface LotoServiceInterface
{
    /**
     * @param int $min
     * @param int $max
     * @return int
     */
    public static function generateOneNumber(int $min, int $max): int;

    /**
     * @param int $numberOfNumber
     * @param int $min
     * @param int $max
     * @return Collection
     */
    public static function generateTirage(int $numberOfNumber, int $min, int $max): Collection;

    /**
     * @return LotoVM
     */
    public static function getTirageLoto(): LotoVM;

    /**
     * @return EuromillionVM
     */
    public static function getTirageEuromillion(): EuromillionVM;

    /**
     * @param int $nbTirage
     * @return Collection
     */
    public static function getMultipleTirageLoto(int $nbTirage): Collection;

    /**
     * @param int $nbTirage
     * @return Collection
     */
    public static function getMultipleTirageEuromillion(int $nbTirage): Collection;

    /**
     * @param LotoDTO $dto
     * @return TiragesVM
     */
    public static function getResult(LotoDTO $dto): TiragesVM;
}
