<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskDeleteControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskDeleteControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testDTaskDeleteResponseIfLogin()
    {
        $client = static::createAuthenticatedClient();

        $client->request('GET', '/tasks/delete/7');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testDTaskDeleteResponseIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/delete/8');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}