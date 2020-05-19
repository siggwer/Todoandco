<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testCreateTaskRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/create');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testCreateTaskPageIsFound()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/create');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(
            1,
            $crawler->filter('html:contains("Créer une tâche")')->count());
    }

    /**
     *
     */
    public function testCreateTaskRedirectionIfLogin()
    {
        $client = static::createAuthenticatedClient();

        $client->request('POST', '/tasks/create');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testCreateTaskForm()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Créer une nouvelle tâche')->link();

        $crawler = $client->click($link);

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'functional test title';
        $form['task[content]'] = 'functional test content';

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }


    /**
     *
     */
    public function testEditTaskForm()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/edit/1');

        $form = $crawler->selectButton('Modifier')->form();

        $form['task[title]'] = 'functional test title';
        $form['task[content]'] = 'functional test content';

        $client->submit($form);
        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }

    /**
     *
     */
    public function testDeleteTaskResponseIfLogin()
    {
        $client = static::createAuthenticatedClient();

        $client->request('GET', '/tasks/delete/1');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTaskEditRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/tasks/edit/26');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTaskEditPageIsFound()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/edit/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Modifier")')->count());
    }

    /**
     *
     */
    public function testEditTaskRedirection()
    {
        $client = static::createAuthenticatedClient();

        $client->request('POST', "/tasks/edit/77");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testEditTaskIfError()
    {
        $client = static::createAuthenticatedClient();

        if (!$client) {

            $client->request('POST', '/tasks/edit/25');

            $this->assertEquals(200, $client->getResponse()->getStatusCode());
        }
    }
}