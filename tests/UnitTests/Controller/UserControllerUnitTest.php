<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use App\Controller\UserCreateController;
use App\Handler\UserCreateHandler;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Exception;

/**
 * Class UserControllerUnitTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserControllerUnitTest extends TestCase
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
    private $createUserHandler;
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
     * @covers \App\Handler\CreateUserHandler::handle
     *
     * @throws Exception
     */
    public function testCreateUserIfHandleFalse()
    {
        $this->createUserHandler->method('handle')->willReturn(false);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $request = Request::create('/tasks/create', 'GET');

        $controller = new UserCreateController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(Response::class,
            $controller->createUser($request, $this->createUserHandler));
    }


    /**
     * @throws Exception
     */
    public function testCreateUserIfHandleTrue()
    {

        $this->createUserHandler->method('handle')->willReturn(true);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $this->urlGenerator->method('generate')->willReturn('user_list');

        $request = Request::create('/tasks/create', 'POST');

        $controller = new UserCreateController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(RedirectResponse::class,
            $controller->userCreate($request, $this->createUserHandler));
    }

//    /**
//     *
//     */
//    public function testDeleteUserRedirection()
//    {
//        $user = $this->createMock(User::class);
//
//        $userToken = $this->createMock(TokenInterface::class);
//        $userToken->method('getUser')->willReturn($userToken);
//
//        $tokenStorage = $this->createMock(TokenStorageInterface::class);
//        $tokenStorage->method('getToken')->willReturn($userToken);
//
//        $this->urlGenerator->method('generate')->willReturn('user_list');
//
//        $addFlash = $this->createMock(FlashBag::class);
//        $addFlash->method('add')->willReturn('test');
//
//        $messageFlash = $this->createMock(Session::class);
//        $messageFlash->method('getFlashBag')->willReturn($addFlash);
//
//        $controller = new UserController(
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->repository
//        );
//
//        $this->assertInstanceOf(RedirectResponse::class,
//            $controller->deleteUser($user, $tokenStorage, $messageFlash));
//    }
//
//    /**
//     * @throws Exception
//     */
//    public function testEditUserIfHandleIsFalse()
//    {
//        $this->createUserHandler->method('handle')->willReturn(false);
//
//        $this->form->method('handleRequest')->willReturn($this->form);
//
//        $this->formFactory->method('create')->willReturn($this->form);
//
//        $request = Request::create('/users/{id}/edit', 'GET', ['id'=>50]);
//
//        $controller = new UserController(
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->repository
//        );
//
//        $this->assertInstanceOf(Response::class,
//            $controller->createUser($request, $this->createUserHandler));
//    }
//
//    /**
//     * @throws Exception
//     */
//    public function testEditUserIfHandleTrue()
//    {
//
//        $this->createUserHandler->method('handle')->willReturn(true);
//
//        $this->form->method('handleRequest')->willReturn($this->form);
//
//        $this->formFactory->method('create')->willReturn($this->form);
//
//        $this->urlGenerator->method('generate')->willReturn('user_list');
//
//        $request = Request::create('/users/{id}/edit', 'GET', ['id'=>50]);
//
//        $controller = new UserController(
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->repository
//        );
//
//        $this->assertInstanceOf(RedirectResponse::class,
//            $controller->createUser($request, $this->createUserHandler));
//    }
//
//    /**
//     * @throws Exception
//     */
//    public function testEditUserPasswordIfHandleIsFalse()
//    {
//        $this->createUserHandler->method('handle')->willReturn(false);
//
//        $this->form->method('handleRequest')->willReturn($this->form);
//
//        $this->formFactory->method('create')->willReturn($this->form);
//
//        $request = Request::create('/user/password/{id}', 'GET', ['id'=>50]);
//
//        $controller = new UserController(
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->repository
//        );
//
//        $this->assertInstanceOf(Response::class,
//            $controller->createUser($request, $this->createUserHandler));
//    }
//
//    /**
//     * @throws Exception
//     */
//    public function testEditUserPasswordIfHandleIsTrue()
//    {
//        $this->createUserHandler->method('handle')->willReturn(true);
//
//        $this->form->method('handleRequest')->willReturn($this->form);
//
//        $this->formFactory->method('create')->willReturn($this->form);
//
//        $this->urlGenerator->method('generate')->willReturn('user_list');
//
//        $request = Request::create('/user/password/{id}', 'GET', ['id'=>50]);
//
//        $controller = new UserController(
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->repository
//        );
//
//        $this->assertInstanceOf(RedirectResponse::class,
//            $controller->createUser($request, $this->createUserHandler));
//    }
}