<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\UserListController;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

/**
 * Class UserListControllerUnitTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserListControllerUnitTest extends TestCase
{
    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function testUsersListResponse()
    {
        $twig = $this->createMock(Environment::class);
        $repository = $this->createMock(UserRepository::class);

        $controller = new UserListController();

        $this->assertInstanceOf(Response::class,
            $controller->listUser($repository, $twig));
    }
}