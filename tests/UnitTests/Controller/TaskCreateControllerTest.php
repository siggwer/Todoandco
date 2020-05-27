<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use App\Controller\TaskCreateController;
use App\Handler\TaskCreateHandler;
use App\Repository\TaskRepository;
use PHPUnit\Framework\TestCase;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig_Error_Runtime;
use Twig_Error_Loader;
use Twig_Error_Syntax;
use Twig\Environment;

/**
 * Class TaskCreateControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskCreateControllerTest extends TestCase
{
    /**
     * @var
     */
    private $repository;

    /**
     * @var
     */
    private $tokenStorage;

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
    private $messageFlash;

    /**
     * @var
     */
    private $createTaskHandler;

    /**
     * @var
     */
    private $form;

    /**
     * @var
     */
    private $authorization;

    /**
     *
     */
    public function setUp()
    {
        $this->repository = $this->createMock(TaskRepository::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->twig = $this->createMock(Environment::class);
        $this->formFactory = $this->createMock(FormFactoryInterface::class);
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->messageFlash = $this->createMock(Session::class);
        $this->createTaskHandler = $this->createMock(TaskCreateHandler::class);
        $this->form = $this->createMock(FormInterface::class);
        $this->authorization = $this->createMock(AuthorizationCheckerInterface::class);
    }

    /**
     *
     */
    public function testConstructor()
    {
        $controller = new TaskCreateController(
            $this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        static::assertInstanceOf(TaskCreateController::class, $controller);
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function testCreateTaskIfHandleIsFalse()
    {
        $this->createTaskHandler->method('handle')->willReturn(false);

        $this->form->method("handleRequest")->willReturn($this->form);

        $this->formFactory->method("create")->willReturn($this->form);

        $request = Request::create('/tasks/create', 'GET');

        $controller = new TaskCreateController($this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        $this->assertInstanceOf(
            Response::class,
            $controller->createTask($request, $this->createTaskHandler));
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function testCreateTaskIfHandleIsTrue()
    {
        $this->createTaskHandler->method('handle')->willReturn(true);

        $this->form->method("handleRequest")->willReturn($this->form);

        $this->formFactory->method("create")->willReturn($this->form);

        $this->urlGenerator->method('generate')->willReturn('task_list');

        $request = Request::create('/tasks/create', 'GET');

        $controller = new TaskCreateController($this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        $this->assertInstanceOf(
            RedirectResponse::class,
            $controller->createTask($request, $this->createTaskHandler));
    }
}