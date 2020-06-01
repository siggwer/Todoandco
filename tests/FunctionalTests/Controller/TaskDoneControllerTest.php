<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskDoneControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskDoneControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testTaskListIsDoneRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/done');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testGetDoneTaskListPageFromHomePage()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Consulter les tâches terminées')->link();

        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Retour à la liste des tâches")')->count());
    }

    /**
     *
     */
    public function testTaskIsDoneResponse()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/done');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Retour à la liste des tâches")')->count());
    }
}
