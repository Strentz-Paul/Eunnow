<?php

declare(strict_types=1);

namespace App\Service;

use App\Contracts\Service\SimulateurServiceInterface;
use App\DTO\SimulateurDTO;
use App\ViewModel\SimulateurVM;

final class SimulateurService implements SimulateurServiceInterface
{
    public const TAUX_URSSAF = 22.2;

    /**
     * @inheritDoc
     */
    public static function getResultSimulateur(SimulateurDTO $dto): SimulateurVM
    {
        $tjmAvecTva = self::calculTJMAvecTVA($dto->getTjm(), $dto->getTauxTVA());
        $salaireAnnuel = self::calculSalaire(
            $dto->getTjm(),
            $dto->getNbJours(),
            $dto->getTauxImpots(),
            $dto->getPalierTVA(),
            $dto->getTauxTVA(),
            true
        );
        $salaireMensuel = self::calculSalaire(
            $dto->getTjm(),
            $dto->getNbJours(),
            $dto->getTauxImpots(),
            $dto->getPalierTVA(),
            $dto->getTauxTVA(),
            false
        );
        $nbJoursAvantTva = self::calculNbJoursAvantSeuilTVA($tjmAvecTva, $dto->getPalierTVA());
        $nbJoursSansTva = $dto->getNbJours() - $nbJoursAvantTva;
        $caAnnuel =
            self::calculCAAnnuel(
                $nbJoursAvantTva,
                $tjmAvecTva
            ) +
            self::calculCAAnnuel(
                $nbJoursSansTva,
                $dto->getTjm()
            );
        return new SimulateurVM($caAnnuel, $salaireAnnuel, $salaireMensuel, $nbJoursAvantTva, $tjmAvecTva);
    }

    /**
     * @inheritDoc
     */
    public static function calculCAAnnuel(int $nbJours, float $tjm): float
    {
        return round($nbJours * $tjm, 2);
    }


    /**
     * @inheritDoc
     */
    public static function calculSalaire(
        float $tjm,
        int $nbJours,
        float $tauxImpots,
        float $palierTVA,
        float $tauxTVA,
        bool $yearly
    ): float {
        $tjmAvecTVA = self::calculTJMAvecTVA($tjm, $tauxTVA);
        $tjmTVAApresURSSAF = self::calculTJMApresURSSAF($tjmAvecTVA);
        $tjmTVAApresImpots = self::calculTJMApresImpots($tjmTVAApresURSSAF, $tauxImpots);
        $tjmApresURSSAF = self::calculTJMApresURSSAF($tjm);
        $tjmApresImpots = self::calculTJMApresImpots($tjmApresURSSAF, $tauxImpots);
        $nbJoursAvantSeuil = self::calculNbJoursAvantSeuilTVA($tjmAvecTVA, $palierTVA);
        $nbJoursSansTVA = $nbJours - $nbJoursAvantSeuil;
        $salaire =  ($tjmTVAApresImpots * $nbJoursAvantSeuil) + ($tjmApresImpots * $nbJoursSansTVA);
        if ($yearly === false) {
            return round($salaire / 12, 2);
        }
        return round($salaire, 2);
    }

    /**
     * @inheritDoc
     */
    public static function calculTJMAvecTVA(float $tjm, float $tva): float
    {
        return round($tjm + (($tjm * $tva) / 100), 2);
    }

    /**
     * @inheritDoc
     */
    public static function calculTJMApresImpots(float $tjm, float $tauxImpots): float
    {
        return round($tjm - (($tjm * $tauxImpots) / 100), 2);
    }

    /**
     * @inheritDoc
     */
    public static function calculTJMApresURSSAF(float $tjm): float
    {
        return round($tjm - (($tjm * self::TAUX_URSSAF) / 100), 2);
    }

    /**
     * @inheritDoc
     */
    public static function calculNbJoursAvantSeuilTVA(float $tjm, float $seuilTVA): int
    {
        return intval($seuilTVA / $tjm);
    }
}
