<?php

namespace App\Tests\FunctionalTests;

use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Component\BrowserKit\Cookie;
use App\Entity\User;

/**
 * Class AuthenticationTrait
 *
 * @package App\Tests\FunctionalTests
 */
trait AuthenticationTrait
{
    /**
     * @param User|null $user
     *
     * @return KernelBrowser
     */
    public static function createAuthenticatedClient(?User $user = null): KernelBrowser
    {
        /**
         * @var KernelBrowser $client
         */
        $client = static::createClient();

        $client->getCookieJar()->clear();

        $firewallContext = 'main';

        /**
         * @var SessionInterface $session
         */
        $session = $client->getContainer()->get('session');

        $entityManager = $client->getContainer()->get("doctrine.orm.entity_manager");

        if ($user === null) {
            $user = $entityManager->getRepository(User::class)->findOneBy([]);
        }

        $token = new UsernamePasswordToken(
            $user,
            $user->getPassword(),
            $firewallContext,
            $user->getRoles()
        );

        $session->set('_security_' . $firewallContext, serialize($token));

        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());

        $client->getCookieJar()->set($cookie);

        return $client;
    }

    /**
     * @return KernelBrowser
     */
    public static function logInUser(): KernelBrowser
    {
        $client = static::createClient();

        $session = $client->getContainer()->get('session');

        $user = 'admin';

        $token = new UsernamePasswordToken($user, null, 'main', ['ROLE_ADMIN']);

        $session->set('_security_'.'main', serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());

        $client->getCookieJar()->set($cookie);

        return $client;
    }
}
