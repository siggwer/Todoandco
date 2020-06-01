<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\DefaultContoller;
use PHPUnit\Framework\TestCase;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;
use Twig\Environment;

/**
 * Class DefaultController
 *
 * @package App\Tests\UnitTests\Controller
 */
class DefaultControllerTest extends TestCase
{
    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function testHomeResponse()
    {
        $controller = new DefaultContoller();

        $twig = $this->createMock(Environment::class);

        $this->assertInstanceOf(Response::class, $controller->index($twig));
    }
}
