<?php

declare(strict_types=1);

namespace App\Form\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class NumberWithConstraintType extends AbstractType
{
    public function getParent()
    {
        return NumberType::class;
    }

//    public getExtension
}
