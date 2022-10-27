<?php

declare(strict_types=1);

namespace App\Service;

use App\Contracts\Service\LotoServiceInterface;
use App\DTO\LotoDTO;
use App\ViewModel\EuromillionVM;
use App\ViewModel\LotoVM;
use App\ViewModel\TiragesVM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

final class LotoService implements LotoServiceInterface
{
    public const LOTO_COUNT_OF_NUMBER = 5;
    public const LOTO_COUNT_OF_SPECIAL = 1;
    public const LOTO_NUMBER_MAX = 49;
    public const LOTO_SPECIAL_MAX = 10;
    public const EUROMILLION_COUNT_OF_NUMBER = 5;
    public const EUROMILLION_COUNT_OF_SPECIAL = 2;
    public const EUROMILLION_NUMBER_MAX = 50;
    public const EUROMILLION_SPECIAL_MAX = 12;



    /**
     * @inheritDoc
     */
    public static function generateOneNumber(int $min, int $max): int
    {
        return rand($min, $max);
    }

    /**
     * @inheritDoc
     */
    public static function generateTirage(int $numberOfNumber, int $min, int $max): Collection
    {
        $numbers = new ArrayCollection();
        for ($i = 0; $i < $numberOfNumber;) {
            $number = self::generateOneNumber($min, $max);
            if ($numbers->contains($number) === false) {
                $numbers->add($number);
                $i++;
            }
        }
        return $numbers;
    }

    /**
     * @inheritDoc
     */
    public static function getTirageLoto(): LotoVM
    {
        $numbers = self::generateTirage(self::LOTO_COUNT_OF_NUMBER, 1, self::LOTO_NUMBER_MAX);
        $specials = self::generateTirage(self::LOTO_COUNT_OF_SPECIAL, 1, self::LOTO_SPECIAL_MAX);
        return new LotoVM($numbers, $specials);
    }

    /**
     * @inheritDoc
     */
    public static function getTirageEuromillion(): EuromillionVM
    {
        $numbers = self::generateTirage(
            self::EUROMILLION_COUNT_OF_NUMBER,
            1,
            self::EUROMILLION_NUMBER_MAX
        );
        $specials = self::generateTirage(
            self::EUROMILLION_COUNT_OF_SPECIAL,
            1,
            self::EUROMILLION_SPECIAL_MAX
        );
        return new EuromillionVM($numbers, $specials);
    }

    /**
     * @inheritDoc
     */
    public static function getMultipleTirageLoto(int $nbTirage): Collection
    {
        $tirages = new ArrayCollection();
        for ($i = 0; $i < $nbTirage; $i++) {
            $tirage = self::getTirageLoto();
            $tirages->add($tirage);
        }
        return $tirages;
    }

    /**
     * @inheritDoc
     */
    public static function getMultipleTirageEuromillion(int $nbTirage): Collection
    {
        $tirages = new ArrayCollection();
        for ($i = 0; $i < $nbTirage; $i++) {
            $tirage = self::getTirageEuromillion();
            $tirages->add($tirage);
        }
        return $tirages;
    }

    /**
     * @inheritDoc
     */
    public static function getResult(LotoDTO $dto): TiragesVM
    {
        $typeTirage = $dto->getTypeDeTirage();
        $tirages = new ArrayCollection();
        if ($typeTirage === 'euromillion') {
            $tirages = self::getMultipleTirageEuromillion($dto->getNombreTirage());
        }
        if ($typeTirage === 'loto') {
            $tirages = self::getMultipleTirageLoto($dto->getNombreTirage());
        }
        return new TiragesVM($tirages);
    }
}
