<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\SecurityController;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

/**
 * Class SecurityControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class SecurityControllerTest extends TestCase
{
    /**
     *
     */
    public function testLoginResponse()
    {
        $authentication = $this->createMock(AuthenticationUtils::class);
        $twig = $this->createMock(Environment::class);

        $controller = new SecurityController();

        static::assertInstanceOf(
            Response::class,
            $controller->login($authentication, $twig)
        );
    }
}