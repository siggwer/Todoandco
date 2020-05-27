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
use App\Controller\TaskEditController;
use App\Repository\TaskRepository;
use App\Handler\TaskEditHandler;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use App\Entity\Task;

/**
 * Class TaskEditControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskEditControllerTest extends TestCase
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
    private $taskEditHandler;

    /**
     * @var
     */
    private $form;

    /**
     * @var
     */
    private $authorization;

    /**
     * @var
     */
    private $task;

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
        $this->taskEditHandler = $this->createMock(taskEditHandler::class);
        $this->form = $this->createMock(FormInterface::class);
        $this->authorization = $this->createMock(AuthorizationCheckerInterface::class);
        $this->task = $this->createMock(Task::class);
    }

    /**
     *
     */
    public function testConstructor()
    {
        $controller = new TaskEditController(
            $this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        static::assertInstanceOf(TaskEditController::class, $controller);
    }

    /**
     *
     */
    public function testEditTaskIfHandleIsFalse()
    {
        $this->taskEditHandler->method('handle')->willReturn(false);

        $this->form->method("handleRequest")->willReturn($this->form);

        $this->formFactory->method("create")->willReturn($this->form);

        $request = Request::create('/tasks/edit/{id}','GET', ['id'=>1]);

        $controller = new TaskEditController(
            $this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        $this->assertInstanceOf(
            Response::class,
           $controller->taskEdit($this->task, $request, $this->taskEditHandler));
    }

    /**
     *
     */
    public function testEditTaskIfHandleIsTrue()
    {
        $this->taskEditHandler->method('handle')->willReturn(true);

        $this->authorization->method('isGranted')->willReturn(true);

        $this->form->method("handleRequest")->willReturn($this->form);

        $this->formFactory->method("create")->willReturn($this->form);

        $this->urlGenerator->method('generate')->willReturn('task_list');

        $request = Request::create('/tasks/edit/{id}', 'GET', ['id'=>1]);

        $controller = new TaskEditController(
            $this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

       $this->assertInstanceOf(RedirectResponse::class,
            $controller->taskEdit($this->task, $request, $this->taskEditHandler));
    }
}