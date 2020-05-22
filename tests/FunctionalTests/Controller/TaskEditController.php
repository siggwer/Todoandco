<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskEditController
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskEditController extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testTaskEditForm()
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
    public function testTaskEditRedirection()
    {
        $client = static::createAuthenticatedClient();

        $client->request('POST', "/tasks/edit/77");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTaskEditIfError()
    {
        $client = static::createAuthenticatedClient();

        if (!$client) {

            $client->request('POST', '/tasks/edit/25');

            $this->assertEquals(200, $client->getResponse()->getStatusCode());
        }
    }
}