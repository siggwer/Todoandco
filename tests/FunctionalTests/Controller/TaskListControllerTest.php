<?php

namespace App\Tests\FunctionalTests\Controller;

use App\Tests\FunctionalTests\AuthenticatorLogin;

/**
 * Class TaskListControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskListControllerTest extends AuthenticatorLogin
{
    /**
     *
     */
    public function testTaskListRedirectionIfNoLogin()
    {
        $this->client->request('GET', '/tasks/list');

        $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTasksListResponse()
    {
        $this->loginUser();

        $crawler = $this->client->request('GET', '/tasks/list');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Créer une tâche")')->count());
    }

    /**
     *
     */
    public function testGetTaskListPageFromHome()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/');

        $link = $crawler->selectLink('Consulter les tâches à faire')->link();

        $crawler = $this->client->click($link);

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $this->assertSame(
            1,
            $crawler->filter('html:contains("Liste des tâches terminées")')->count());
    }
}