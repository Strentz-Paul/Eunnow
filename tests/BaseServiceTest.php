<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class BaseServiceTest extends KernelTestCase
{
    public static function init(string $class): ?object
    {
        self::bootKernel();
        $container = static::getContainer();
        return $container->get($class);
    }
}
