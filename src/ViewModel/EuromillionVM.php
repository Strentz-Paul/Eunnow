<?php

declare(strict_types=1);

namespace App\ViewModel;

use Doctrine\Common\Collections\Collection;

final class EuromillionVM extends AbstractTirage
{
    public function __construct(
        private Collection $numbers,
        private Collection $specials
    ) {
        parent::__construct($this->numbers, $this->specials);
    }

    public function getTirageName(): string
    {
        return "Euromillion";
    }
}
