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

        $client->request('GET', '/tasks/switch/1');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testToggleTask()
    {
        $client = static::createAuthenticatedClient();

        $client->request('GET', '/tasks/switch/1');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testToggleTaskIfError()
    {
        $client = static::createAuthenticatedClient();

        if (!$client) {

            $client->request('GET', '/tasks/toggle/56');

            $this->assertEquals(302, $client->getResponse()->getStatusCode());
        }
    }
}