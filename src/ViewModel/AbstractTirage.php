<?php

declare(strict_types=1);

namespace App\ViewModel;

use App\Helper\StringHelper;
use Doctrine\Common\Collections\Collection;

abstract class AbstractTirage
{
    public function __construct(
        private Collection $numbers,
        private Collection $specials
    ) {
    }

    /**
     * @return Collection
     */
    public function getNumbers(): Collection
    {
        return $this->numbers;
    }

    /**
     * @return Collection
     */
    public function getSpecials(): Collection
    {
        return $this->specials;
    }

    /**
     * @return string
     */
    public function displayTirage(): string
    {
        $numbers = StringHelper::displayNumbers($this->numbers);
        $specials = StringHelper::displayNumbers($this->specials);
        return "$numbers -- $specials";
    }
}
