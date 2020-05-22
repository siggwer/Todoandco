<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\SecurityController;
use PHPUnit\Framework\TestCase;

/**
 * Class SecurityControllerUnitTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class SecurityControllerUnitTest extends TestCase
{
    /**
     *
     */
    public function testLoginResponse()
    {
        $authentication = $this->createMock(AuthenticationUtils::class);

        $controller = new SecurityController();

        static::assertInstanceOf(Response::class, $controller->login($authentication));
    }

}