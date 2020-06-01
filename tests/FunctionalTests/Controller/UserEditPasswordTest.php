<?php

namespace App\Tests\FunctionalTests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Tests\FunctionalTests\AuthenticationTrait;

/**
 * Class UserEditPasswordTest
 *
 * @package App\Tests\FunctionalTests\Controller
 */
class UserEditPasswordTest extends WebTestCase
{
    use AuthenticationTrait;
    /**
     *
     */
    public function testEditPasswordForm()
    {
        $client = static::LoginUser();

        $crawler = $client->request('POST', '/user/password/5');

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
    public function testUserPasswordRedirectionIfNoLogin()
    {
        $client = static::createClient();

        $client->request('GET', '/user/password/6');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     *
     */
    public function testUserPasswordPageIsFound()
    {
        $client = static::LoginUser();

        $crawler = $client->request('GET', '/user/password/7');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertSame(1, $crawler->filter('html:contains("Modifier le mot de passe de")')->count());
    }

    /**
     *
     */
    public function testUserPasswordRedirection()
    {
        $client = static::LoginUser();

        $client->request('POST', '/user/password/8');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
