<?php

declare(strict_types=1);

namespace App\Service;

use App\Contracts\Service\DevisServiceInterface;
use App\DTO\DevisDTO;
use App\ViewModel\DevisVM;

final class DevisService implements DevisServiceInterface
{
    public static function generateDevis(DevisDTO $dto): DevisVM
    {
        return new DevisVM();
    }
}
