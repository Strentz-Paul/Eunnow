<?php

declare(strict_types=1);

namespace App\DTO;

final class SimulateurDTO
{
    public function __construct(
        private ?float $tjm = null,
        private ?int $nbJours = null,
        private ?float $tauxImpots = null,
        private ?int $palierTVA = 34400,
        private ?float $tauxTVA = 19.5
    ) {
    }

    /**
     * @return float|null
     */
    public function getTjm(): ?float
    {
        return $this->tjm;
    }

    /**
     * @param float|null $tjm
     */
    public function setTjm(?float $tjm): void
    {
        $this->tjm = $tjm;
    }

    /**
     * @return int|null
     */
    public function getNbJours(): ?int
    {
        return $this->nbJours;
    }

    /**
     * @param int|null $nbJours
     */
    public function setNbJours(?int $nbJours): void
    {
        $this->nbJours = $nbJours;
    }

    /**
     * @return float|null
     */
    public function getTauxImpots(): ?float
    {
        return $this->tauxImpots;
    }

    /**
     * @param float|null $tauxImpots
     */
    public function setTauxImpots(?float $tauxImpots): void
    {
        $this->tauxImpots = $tauxImpots;
    }

    /**
     * @return int|null
     */
    public function getPalierTVA(): ?int
    {
        return $this->palierTVA;
    }

    /**
     * @param int|null $palierTVA
     */
    public function setPalierTVA(?int $palierTVA): void
    {
        $this->palierTVA = $palierTVA;
    }

    /**
     * @return float|null
     */
    public function getTauxTVA(): ?float
    {
        return $this->tauxTVA;
    }

    /**
     * @param float|null $tauxTVA
     */
    public function setTauxTVA(?float $tauxTVA): void
    {
        $this->tauxTVA = $tauxTVA;
    }
}
