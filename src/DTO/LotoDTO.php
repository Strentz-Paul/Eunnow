<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

final class LotoDTO
{
    #[Assert\GreaterThan(0)]
    #[Assert\LessThanOrEqual(1000)]
    private ?int $nombreTirage = 1;
    private string $typeDeTirage;

    public function __construct(
        ?int $nbTirage = 1,
        ?string $typeDeTirage = 'loto'
    ) {
        $this->nombreTirage = $nbTirage;
        $this->typeDeTirage = $typeDeTirage;
    }

    /**
     * @return int|null
     */
    public function getNombreTirage(): ?int
    {
        return $this->nombreTirage;
    }

    /**
     * @param int|null $nombreTirage
     * @return LotoDTO
     */
    public function setNombreTirage(?int $nombreTirage): LotoDTO
    {
        $this->nombreTirage = $nombreTirage;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeDeTirage(): string
    {
        return $this->typeDeTirage;
    }

    /**
     * @param string $typeDeTirage
     * @return LotoDTO
     */
    public function setTypeDeTirage(string $typeDeTirage): LotoDTO
    {
        $this->typeDeTirage = $typeDeTirage;
        return $this;
    }
}
