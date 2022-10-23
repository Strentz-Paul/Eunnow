<?php

declare(strict_types=1);

namespace App\Contracts\Service;

use App\DTO\SimulateurDTO;
use App\ViewModel\SimulateurVM;

interface SimulateurServiceInterface
{
    /**
     * @param SimulateurDTO $dto
     * @return SimulateurVM
     */
    public static function getResultSimulateur(SimulateurDTO $dto): SimulateurVM;

    /**
     * @param int $nbJours
     * @param float $tjm
     * @return float
     */
    public static function calculCAAnnuel(int $nbJours, float $tjm): float;

    /**
     * @param float $tjm
     * @param int $nbJours
     * @param float $tauxImpots
     * @param float $palierTVA
     * @param float $tauxTVA
     * @param bool $yearly
     * @return float
     */
    public static function calculSalaire(
        float $tjm,
        int $nbJours,
        float $tauxImpots,
        float $palierTVA,
        float $tauxTVA,
        bool $yearly
    ): float;

    /**
     * @param float $tjm
     * @param float $tva
     * @return float
     */
    public static function calculTJMAvecTVA(float $tjm, float $tva): float;

    /**
     * @param float $tjm
     * @param float $tauxImpots
     * @return float
     */
    public static function calculTJMApresImpots(float $tjm, float $tauxImpots): float;

    /**
     * @param float $tjm
     * @return float
     */
    public static function calculTJMApresURSSAF(float $tjm): float;

    /**
     * @param float $tjm
     * @param float $seuilTVA
     * @return int
     */
    public static function calculNbJoursAvantSeuilTVA(float $tjm, float $seuilTVA): int;
}
