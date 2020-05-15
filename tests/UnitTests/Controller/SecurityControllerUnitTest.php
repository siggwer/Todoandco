<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\SecurityController;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig_Error_Runtime;
use Twig_Error_Loader;
use Twig_Error_Syntax;

/**
 * Class SecurityControllerUnitTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class SecurityControllerUnitTest extends TestCase
{
    /**
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
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