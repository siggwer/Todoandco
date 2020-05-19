<?php

namespace App\Tests\FunctionalTests\Controller;


use App\Tests\FunctionalTests\AuthenticationTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class TaskListControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskListControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testTaskListRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/list');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTasksListResponse()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/list');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Créer une tâche")')->count());
    }

    /**
     *
     */
    public function testGetTaskListPageFromHome()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Consulter les tâches à faire')->link();

        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        dd($crawler);
        exit;
        $this->assertSame(1, $crawler->filter('html:contains("Liste des tâches terminées")')->count());
    }
}