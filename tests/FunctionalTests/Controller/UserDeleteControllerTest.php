<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class UserDeleteControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserDeleteControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testDeleteUserIfNoLogin()
    {
        $client = static::LoginUser();

        $client->request('GET', '/delete/user/9');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testDeleteUser()
    {
        $client = static::LoginUser();

        $client->request('GET', '/delete/user/10');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}