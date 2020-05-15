<?php

namespace App\Tests\FunctionalTests\Controller;

use App\Tests\FunctionalTests\AuthenticatorLogin;

/**
 * Class TaskToggleControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskToggleControllerTest extends AuthenticatorLogin
{
    /**
     *
     */
    public function testTaskToggleRedirectionIfNoLogin()
    {
        $this->client->request('GET', '/tasks/10/switch');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testToggleTask()
    {
        $this->logInUser();

        $this->client->request('GET', '/tasks/10/switch');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testToggleTaskIfError()
    {
        if (!$this->logIn()) {

            $this->client->request('GET', '/tasks/56/toggle');

            $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
        }

    }
}