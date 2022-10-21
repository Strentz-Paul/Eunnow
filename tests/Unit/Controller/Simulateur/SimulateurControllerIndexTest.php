<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller\Simulateur;

use App\Tests\BaseControllerTest;

class SimulateurControllerIndexTest extends BaseControllerTest
{
    public function testIndexSuccess(): void
    {
        $client = self::init();

        $client->request(self::GET, '/simulateur');
        self::assertResponseIsSuccessful();
    }

    public function testIndexFailRequest(): void
    {
        $client = self::init();

        $client->request(self::GET, '/similateur');
        self::assertResponseStatusCodeSame(404);
    }
}
