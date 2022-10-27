<?php

declare(strict_types=1);

namespace App\Contracts\Service;


use App\DTO\DevisDTO;
use App\ViewModel\DevisVM;

interface DevisServiceInterface
{
    /**
     * @param DevisDTO $dto
     * @return DevisVM
     */
    public static function generateDevis(DevisDTO $dto): DevisVM;
}
