<?php

namespace App\Tests\FunctionalTests\Controller;

use App\Tests\FunctionalTests\AuthenticatorLogin;

/**
 * Class SecurityControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class SecurityControllerTest extends AuthenticatorLogin
{
    /**
     *
     */
    public function testLogin()
    {
        $crawler = $this->client->request('GET', '/login');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Nom d\'utilisateur")')->count());
        $this->assertSame(1, $crawler->filter('html:contains("Mot de passe")')->count());
    }
}