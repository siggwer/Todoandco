<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class SecurityControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class SecurityControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Nom d\'utilisateur")')->count());

        $this->assertSame(1, $crawler->filter('html:contains("Mot de passe")')->count());
    }
}