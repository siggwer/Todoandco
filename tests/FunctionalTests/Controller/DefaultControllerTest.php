<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class DefaultControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class DefaultControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testHomeIfLogin()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter(
            'html:contains("Bienvenue sur Todo List, l\'application vous permettant de gérer l\'ensemble de vos tâches sans effort !")'
        )->count());
    }
}
