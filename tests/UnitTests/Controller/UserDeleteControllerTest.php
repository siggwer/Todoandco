<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\FormFactoryInterface;
use App\Controller\User\UserDeleteController;
use App\Controller\User\UserCreateController;
use Symfony\Component\Form\FormInterface;
use App\Repository\UserRepository;
use App\Handler\UserCreateHandler;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use App\Entity\User;

/**
 * Class UserDeleteControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserDeleteControllerTest extends TestCase
{
    /**
     * @var
     */
    private $twig;

    /**
     * @var
     */
    private $formFactory;

    /**
     * @var
     */
    private $urlGenerator;

    /**
     * @var
     */
    private $repository;

    /**
     * @var
     */
    private $form;

    /**
     *
     */
    public function setUp()
    {
        $this->twig = $this->createMock(Environment::class);
        $this->formFactory = $this->createMock(FormFactoryInterface::class);
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->repository = $this->createMock(UserRepository::class);
        $this->createUserHandler = $this->createMock(UserCreateHandler::class);
        $this->form = $this->createMock(FormInterface::class);
    }

    /**
     *
     */
    public function testConstructor()
    {
        $controller = new UserCreateController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        static::assertInstanceOf(UserCreateController::class, $controller);
    }

    /**
     *
     */
    public function testDeleteUserRedirection()
    {
        $user = $this->createMock(User::class);

        $userToken = $this->createMock(TokenInterface::class);
        $userToken->method('getUser')->willReturn($userToken);

        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $tokenStorage->method('getToken')->willReturn($userToken);

        $this->urlGenerator->method('generate')->willReturn('user_list');

        $addFlash = $this->createMock(FlashBag::class);
        $addFlash->method('add')->willReturn('test');

        $messageFlash = $this->createMock(Session::class);
        $messageFlash->method('getFlashBag')->willReturn($addFlash);

        $controller = new UserDeleteController(
            $this->twig,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            RedirectResponse::class,
            $controller->deleteUser($user, $tokenStorage, $messageFlash)
        );
    }
}
