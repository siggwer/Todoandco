<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\User\UserListController;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

/**
 * Class UserListControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserListControllerTest extends TestCase
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

        $this->assertInstanceOf(
            Response::class,
            $controller->listUser($repository, $twig)
        );
    }
}
