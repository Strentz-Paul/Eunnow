<?php

declare(strict_types=1);

namespace App\ViewModel;

use Doctrine\Common\Collections\Collection;

final class TiragesVM
{
    public function __construct(
        private Collection $tirage
    ) {
    }

    /**
     * @return Collection
     */
    public function getTirage(): Collection
    {
        return $this->tirage;
    }
}
