<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class UserCreateControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserCreateControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testGetCreateUserPageFromHomePage()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Créer un utilisateur')->link();

        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Créer un utilisateur")')->count());
    }

    /**
     *
     */
    public function testUserCreatePageIsFound()
    {
        $client = static::createAuthenticatedClient();

        $crawler = $client->request('GET', '/users/create');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Créer un utilisateur")')->count());
    }

    /**
     *
     */
    public function testUserCreateRedirection()
    {
        $client = static::createAuthenticatedClient();

        $client->request('POST', '/users/create');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testCreateUserForm()
    {
        $client = static::LoginUser();

        $crawler = $client->request('GET', '/users/create');

        $form = $crawler->selectButton('Ajouter')->form();

        $string = str_shuffle('azertyuiopqsdfghjklm12345');

        $form['user_create[username]'] = $string;
        $form['user_create[password][first]'] = 'azertyui';
        $form['user_create[password][second]'] = 'azertyui';
        $form['user_create[email]'] = $string.'@email.com';
        $form['user_create[roles]'] = ['ROLE_USER'];

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }
}
