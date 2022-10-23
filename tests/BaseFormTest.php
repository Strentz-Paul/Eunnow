<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\Validation;

abstract class BaseFormTest extends TypeTestCase
{
    public function init(string $formClass, object $model): ?FormInterface
    {
        return $this->factory->create($formClass, $model);
    }

    protected function getExtensions()
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping(true)
            ->addDefaultDoctrineAnnotationReader()
            ->getValidator();

        return array(
            new ValidatorExtension($validator),
        );
    }
}
