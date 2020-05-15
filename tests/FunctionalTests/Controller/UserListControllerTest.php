<?php

namespace App\Tests\FunctionalTests\Controller;

use App\Tests\FunctionalTests\AuthenticatorLogin;

/**
 * Class UserListControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserListControllerTest extends AuthenticatorLogin
{
    /**
     *
     */
    public function testUserList()
    {
        $this->logInUser();

        $crawler = $this->client->request('GET', '/users');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Nom d\'utilisateur")')->count());
    }

    /**
     *
     */
    public function testUserListRedirectionIfNoLogin()
    {
        $this->client->request('GET', '/users');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
    }
}