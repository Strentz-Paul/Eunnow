<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class BaseControllerTest extends WebTestCase
{
    protected const GET = "GET";
    protected const POST = "POST";

    public static function init(): KernelBrowser
    {
        $client = static::createClient(array(), array(
            "HTTP_HOST" => "127.0.0.1:8000"
        ));
        $client->followRedirects();
        return $client;
    }
}
