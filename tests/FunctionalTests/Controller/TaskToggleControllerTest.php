<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskToggleControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskToggleControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testTaskToggleRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/10/switch');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testToggleTask()
    {
        $client = static::createAuthenticatedClient();

        $client->request('GET', '/tasks/10/switch');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testToggleTaskIfError()
    {
        $client = static::createAuthenticatedClient();

        if (!$client) {

            $client->request('GET', '/tasks/56/toggle');

            $this->assertEquals(302, $client->getResponse()->getStatusCode());
        }
    }
}