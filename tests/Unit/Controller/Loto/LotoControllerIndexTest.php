<?php

declare(strict_types=1);

namespace App\Tests\Unit\Controller\Loto;

use App\Tests\BaseControllerTest;

class LotoControllerIndexTest extends BaseControllerTest
{
    public function testIndexSuccess(): void
    {
        $client = self::init();

        $client->request(self::GET, '/loto');
        self::assertResponseIsSuccessful();
    }

    public function testIndexFailRequest(): void
    {
        $client = self::init();

        $client->request(self::GET, '/lotos');
        self::assertResponseStatusCodeSame(404);
    }
}
