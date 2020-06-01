<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use App\Controller\User\UserCreateController;
use App\Repository\UserRepository;
use App\Handler\UserCreateHandler;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Exception;

/**
 * Class UserCreateControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserCreateControllerTest extends TestCase
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
    private $userCreateHandler;
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
        $this->userCreateHandler = $this->createMock(UserCreateHandler::class);
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
     * @throws Exception
     */
    public function testUserCreateIfHandleFalse()
    {
        $this->userCreateHandler->method('handle')->willReturn(false);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $request = Request::create('/users/create', 'POST');

        $controller = new UserCreateController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            Response::class,
            $controller->userCreate($request, $this->userCreateHandler)
        );
    }

    /**
     * @throws Exception
     */
    public function testUserCreateIfHandleTrue()
    {
        $this->userCreateHandler->method('handle')->willReturn(true);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $this->urlGenerator->method('generate')->willReturn('user_list');

        $request = Request::create('/users/create', 'POST');

        $controller = new UserCreateController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            RedirectResponse::class,
            $controller->userCreate($request, $this->userCreateHandler)
        );
    }
}
