<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

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

        $this->assertSame(1, $crawler->filter('html:contains("Il n\'y a pas de tâches à afficher")')->count());
    }
}
