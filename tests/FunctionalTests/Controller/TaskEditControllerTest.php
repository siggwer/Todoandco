<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class TaskEditControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class TaskEditControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     * 
     */
    public function testEditTaskPageIsFound()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/edit/2');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Modifier")')->count());
    }

    /**
     *
     */
    public function testTaskEditForm()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/edit/3');

        $form = $crawler->selectButton('Modifier')->form();

        $form['task_edit[title]'] = 'functional test title';
        $form['task_edit[content]'] = 'functional test content';

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

        $client->request('GET', '/tasks/edit/4');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTaskEditPageIsFound()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/tasks/edit/5');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Modifier")')->count());
    }

    /**
     *
     */
    public function testTaskEditRedirection()
    {
        $client = static::createAuthenticatedClient();

        $client->request('POST', "/tasks/edit/6");

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testTaskEditIfError()
    {
        $client = static::createClient();

        if (!$client) {

            $client->request('POST', '/tasks/edit/25');

            $this->assertEquals(200, $client->getResponse()->getStatusCode());
        }
    }
}