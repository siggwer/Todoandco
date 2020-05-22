<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class UserListControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserListControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testUserList()
    {
        $client = static::LoginUser();

        $crawler = $client->request('GET', '/users/list');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Nom d\'utilisateur")')->count());
    }

    /**
     *
     */
    public function testUserListRedirectionIfNoLogin()
    {
        $client = static::CreateClient();

        $client->request('GET', '/users/list');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}