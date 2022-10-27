<?php

declare(strict_types=1);

namespace App\ViewModel;

final class DevisVM
{
    public function __construct(
        private float $tjm,
        private int $nbJours,
        private string $nomEntreprise,
        private string $mois,
        private ?float $tauxTVA,
        private ?float $total
    ) {
    }

    /**
     * @return float
     */
    public function getTjm(): float
    {
        return $this->tjm;
    }

    /**
     * @return int
     */
    public function getNbJours(): int
    {
        return $this->nbJours;
    }

    /**
     * @return string
     */
    public function getNomEntreprise(): string
    {
        return $this->nomEntreprise;
    }

    /**
     * @return string
     */
    public function getMois(): string
    {
        return $this->mois;
    }

    /**
     * @return float|null
     */
    public function getTauxTVA(): ?float
    {
        return $this->tauxTVA;
    }

    /**
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }
}
