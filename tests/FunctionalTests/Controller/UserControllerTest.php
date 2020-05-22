<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class UserControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserControllerTest extends WebTestCase
{
    use AuthenticationTrait;

    /**
     *
     */
    public function testGetListUserPageFromHomePage()
    {
        $client = static::logInUser();

        $crawler = $client->request('GET', '/');

        $link = $crawler->selectLink('Gérer les utilisateurs')->link();

        $crawler = $client->click($link);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Nom d\'utilisateur")')->count());
    }

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

        $form['user[username]'] = $string;
        $form['user[password][first]'] = 'azertyui';
        $form['user[password][second]'] = 'azertyui';
        $form['user[email]'] = $string.'@email.com';
        $form['user[roles]'] = ['ROLE_USER'];

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }

    /**
     *
     */
    public function testEditPasswordForm()
    {
        $client = static::LoginUser();

        $crawler = $client->request('POST', '/user/password/1');

        $form = $crawler->selectButton('Modifier')->form();

        $form['user_edit_password[password][first]'] = 'azertyui';
        $form['user_edit_password[password][second]'] = 'azertyui';

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }

    /**
     *
     */
    public function testEditUserForm()
    {
        $client = static::LoginUser();

        $crawler = $client->request('POST', '/users/edit/1');

        $form = $crawler->selectButton('Modifier')->form();

        $string = str_shuffle('azertyuiopqsdfghjklm12345');

        $form['user_edit[username]'] = 'test';
        $form['user_edit[password][first]'] = 'password';
        $form['user_edit[password][second]'] = 'password';
        $form['user_edit[email]'] = $string.'@email.com';
        $form['user_edit[roles]'] = 'ROLE_USER';

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
    }

    /**
     *
     */
    public function testDeleteUserIfNoLogin()
    {
        $client = static::LoginUser();

        $client->request('GET', '/delete/user/1');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testDeleteUser()
    {
        $client = static::LoginUser();

        $client->request('GET', '/delete/user/1');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testUserEditRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/users/edit/1');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testUserEditPageIsFound()
    {
        $client = static::LoginUser();

        $crawler = $client->request('GET', '/users/edit/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Modifier")')->count());
    }

    /**
     *
     */
    public function testUserEditRedirection()
    {
        $client = static::LoginUser();

        $client->request('POST', '/users/edit/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testUserPasswordRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/user/password/3');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testUserPasswordPageIsFound()
    {
        $client = static::LoginUser();

        $crawler = $client->request('GET', '/user/password/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Modifier le mot de passe de")')->count());
    }

    /**
     *
     */
    public function testUserPasswordRedirection()
    {
        $client = static::LoginUser();

        $client->request('POST', '/user/password/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}