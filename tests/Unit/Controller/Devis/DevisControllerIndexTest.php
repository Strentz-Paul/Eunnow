<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller\Devis;

use App\Tests\BaseControllerTest;

class DevisControllerIndexTest extends BaseControllerTest
{
    public function testIndexSuccess(): void
    {
        $client = self::init();

        $client->request(self::GET, '/devis');
        self::assertResponseIsSuccessful();
    }

    public function testIndexFailRequest(): void
    {
        $client = self::init();

        $client->request(self::GET, '/deviss');
        self::assertResponseStatusCodeSame(404);
    }
}
