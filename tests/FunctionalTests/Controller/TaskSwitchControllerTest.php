<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskSwitchControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskSwitchControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testTaskToggleRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/switch/9');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testSwitchTask()
    {
        $client = static::createAuthenticatedClient();

        $client->request('GET', '/tasks/switch/10');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testSwitchTaskIfError()
    {
        $client = static::createAuthenticatedClient();

        if (!$client) {
            $client->request('GET', '/tasks/switch/11');

            $this->assertEquals(302, $client->getResponse()->getStatusCode());
        }
    }
}
