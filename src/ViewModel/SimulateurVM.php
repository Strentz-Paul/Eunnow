<?php

declare(strict_types=1);

namespace App\ViewModel;

final class SimulateurVM
{
    public function __construct(
        private float $chiffreAffaireAnnuel,
        private float $salaireAnnuel,
        private float $salaireMensuel,
        private int $nbJoursAvantSeuilTVA,
        private float $tjmAvantSeuilTVA,
    ) {
    }

    /**
     * @return float
     */
    public function getChiffreAffaireAnnuel(): float
    {
        return $this->chiffreAffaireAnnuel;
    }

    /**
     * @return float
     */
    public function getSalaireAnnuel(): float
    {
        return $this->salaireAnnuel;
    }

    /**
     * @return float
     */
    public function getSalaireMensuel(): float
    {
        return $this->salaireMensuel;
    }

    /**
     * @return int
     */
    public function getNbJoursAvantSeuilTVA(): int
    {
        return $this->nbJoursAvantSeuilTVA;
    }

    /**
     * @return float
     */
    public function getTjmAvantSeuilTVA(): float
    {
        return $this->tjmAvantSeuilTVA;
    }
}
