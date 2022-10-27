<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class DevisDTO
{
    #[Assert\GreaterThanOrEqual(100)]
    #[Assert\LessThanOrEqual(10000)]
    private ?float $tjm;
    #[Assert\GreaterThan(0)]
    #[Assert\LessThanOrEqual(20)]
    private ?int $nbJours;
    #[Assert\NotBlank]
    private ?string $entrepriseName;
    #[Assert\GreaterThan(0)]
    #[Assert\LessThanOrEqual(100)]
    private ?float $tauxTVA = 19.5;
    private ?bool $tvaApplicable = false;
    private ?string $mois;

    /**
     * @return float|null
     */
    public function getTjm(): ?float
    {
        return $this->tjm;
    }

    /**
     * @param float|null $tjm
     * @return DevisDTO
     */
    public function setTjm(?float $tjm): DevisDTO
    {
        $this->tjm = $tjm;
        return $this;
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
     * @return DevisDTO
     */
    public function setNbJours(?int $nbJours): DevisDTO
    {
        $this->nbJours = $nbJours;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntrepriseName(): ?string
    {
        return $this->entrepriseName;
    }

    /**
     * @param string|null $entrepriseName
     * @return DevisDTO
     */
    public function setEntrepriseName(?string $entrepriseName): DevisDTO
    {
        $this->entrepriseName = $entrepriseName;
        return $this;
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
     * @return DevisDTO
     */
    public function setTauxTVA(?float $tauxTVA): DevisDTO
    {
        $this->tauxTVA = $tauxTVA;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTvaApplicable(): ?bool
    {
        return $this->tvaApplicable;
    }

    /**
     * @param bool|null $tvaApplicable
     * @return DevisDTO
     */
    public function setTvaApplicable(?bool $tvaApplicable): DevisDTO
    {
        $this->tvaApplicable = $tvaApplicable;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMois(): ?string
    {
        return $this->mois;
    }

    /**
     * @param string|null $mois
     * @return DevisDTO
     */
    public function setMois(?string $mois): DevisDTO
    {
        $this->mois = $mois;
        return $this;
    }
}
