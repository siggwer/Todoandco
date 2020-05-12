<?php

namespace App\Tests\FunctionalTests\Controller;

use App\Tests\FunctionalTests\AuthenticatorLogin;

/**
 * Class DefaultController
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class DefaultController extends AuthenticatorLogin
{
    /**
     *
     */
    public function testRedirectionIfNoLogin()
    {
        $this->client->request('GET', '/');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testHomeIfLogin()
    {
        $this->logInUser();

        $crawler = $this->client->request('GET', '/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter(
            'html:contains(
                        "Bienvenue sur Todo List,
                         l\'application vous permettant de gérer 
                         l\'ensemble de vos tâches sans effort !")')->count());
    }
}