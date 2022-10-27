<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class SimulateurDTO
{
    #[Assert\GreaterThan(0)]
    private ?float $tjm;
    #[Assert\GreaterThan(0)]
    private ?int $nbJours;
    #[Assert\GreaterThanOrEqual(0)]
    private ?float $tauxImpots;
    #[Assert\GreaterThanOrEqual(0)]
    private float $palierTVA = 34400;
    #[Assert\GreaterThanOrEqual(0)]
    private float $tauxTVA = 19.5;

    public function __construct(
        ?float $tjm = null,
        ?int $nbJours = null,
        ?float $tauxImpots = null,
        ?float $palierTVA = 34400,
        ?float $tauxTVA = 19.5
    ) {
        $this->tjm = $tjm;
        $this->nbJours = $nbJours;
        $this->tauxImpots = $tauxImpots;
        $this->palierTVA = $palierTVA;
        $this->tauxTVA = $tauxTVA;
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
     * @return float
     */
    public function getPalierTVA(): float
    {
        return $this->palierTVA;
    }

    /**
     * @param float $palierTVA
     */
    public function setPalierTVA(float $palierTVA): void
    {
        $this->palierTVA = $palierTVA;
    }

    /**
     * @return float
     */
    public function getTauxTVA(): float
    {
        return $this->tauxTVA;
    }

    /**
     * @param float $tauxTVA
     */
    public function setTauxTVA(float $tauxTVA): void
    {
        $this->tauxTVA = $tauxTVA;
    }
}
