<?php

namespace App\Tests\FunctionalTests;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\BrowserKit\Cookie;
use App\Entity\User;

/**
 * Class AuthenticatorLogin
 *
 * @package App\Tests\FunctionalTests
 */
class AuthenticatorLogin extends WebTestCase
{
    /**
     * @var KernelBrowser
     */
    protected $client;

    /**
     *
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     *
     */
    protected function logIn()
    {
        $session = $this->client->getContainer()->get('session');
        $em = $this->client->getContainer()->get('doctrine.orm.entity_manager');
        $user = $em->getRepository(User::class)->findOneBy(['username'=>'admin']);

        $token = new UsernamePasswordToken($user, null, 'main', ['ROLE_ADMIN']);
        $session->set('_security_'.'main', serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    /**
     *
     */
    protected function logInUser()
    {
        $session = $this->client->getContainer()->get('session');
        $user = 'admin';

        $token = new UsernamePasswordToken($user, null, 'main', ['ROLE_ADMIN']);
        $session->set('_security_'.'main', serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }
}