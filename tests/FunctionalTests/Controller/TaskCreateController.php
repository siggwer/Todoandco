<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskCreateController
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskCreateController extends WebTestCase
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

        $this->assertSame(1, $crawler->filter('html:contains("Créer une tâche")')->count());
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
        $form['task_create[title]'] = 'functional test title';
        $form['task_create[content]'] = 'functional test content';

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }
}