<?php

namespace App\Tests\FunctionalTests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class UserEditControllerTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserEditControllerTest extends WebTestCase
{
    use AuthenticationTrait;

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
        $form['user_edit[email]'] = $string.'@email.com';
        $form['user_edit[roles]'] = 'ROLE_USER';

        $client->submit($form);

        $crawler = $client->followRedirect();

        $this->assertSame(1, $crawler->filter('div.alert.alert-dismissible.alert-success')->count());
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
}