<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\OptimisticLockException;
use App\Controller\TaskCreateController;
use App\Controller\TaskDeleteController;
use App\Controller\TaskDoneController;
use App\Controller\TaskSwitchController;
use App\Controller\TaskListController;
use App\Controller\TaskEditController;
use App\Handler\TaskCreateHandler;
use App\Repository\TaskRepository;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\ORMException;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig_Error_Runtime;
use Twig_Error_Loader;
use Twig_Error_Syntax;
use Twig\Environment;
use App\Entity\Task;
use App\Entity\User;
use Exception;

/**
 * Class TaskControllerUnitTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskControllerUnitTest extends TestCase
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

        $taskController = new TaskCreateController($this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        $this->assertInstanceOf(Response::class,
            $taskController->createTask($request, $this->createTaskHandler));
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

        $taskController = new TaskCreateController($this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        $this->assertInstanceOf(RedirectResponse::class,
            $taskController->createTask($request, $this->createTaskHandler));
    }

//    /**
//     *
//     */
//    public function testEditTaskIfHandleIsFalse()
//    {
//        $this->createTaskHandler->method('handle')->willReturn(false);
//
//        $this->form->method("handleRequest")->willReturn($this->form);
//
//        $this->formFactory->method("create")->willReturn($this->form);
//
//        $request = Request::create('/tasks/edit/{id}', 'GET', ['id'=>50]);
//
//        $taskController = new TaskCreateController($this->repository,
//            $this->tokenStorage,
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->messageFlash,
//            $this->authorization
//        );
//
//        $this->assertInstanceOf(Response::class,
//            $taskController->createTask($request, $this->createTaskHandler));
//    }
//
//
//    /**
//     *
//     */
//    public function testEditTaskIfHandleIsTrue()
//    {
//        $this->createTaskHandler->method('handle')->willReturn(true);
//
//        $this->form->method("handleRequest")->willReturn($this->form);
//
//        $this->formFactory->method("create")->willReturn($this->form);
//
//        $this->urlGenerator->method('generate')->willReturn('task_list');
//
//        $request = Request::create('/tasks/edit/{id}', 'GET', ['id'=>50]);
//
//        $taskController = new TaskController($this->repository,
//            $this->tokenStorage,
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->messageFlash,
//            $this->authorization
//        );
//
//        $this->assertInstanceOf(RedirectResponse::class,
//            $taskController->createTask($request, $this->createTaskHandler));
//    }
//
//
//    /**
//     * @throws ORMException
//     * @throws OptimisticLockException
//     * @throws Twig_Error_Loader
//     * @throws Twig_Error_Runtime
//     * @throws Twig_Error_Syntax
//     */
//    public function testDeleteTaskRedirection()
//    {
//        $user = $this->createMock(TokenInterface::class);
//        $user->method('getUser')->willReturn($user);
//
//        $this->tokenStorage->method('getToken')->willReturn($user);
//
//        $task = $this->createMock(Task::class);
//
//        $this->urlGenerator->method('generate')->willReturn('task_list');
//
//        $addFlash = $this->createMock(FlashBagInterface::class);
//        $addFlash->method('add')->willReturn('test');
//
//        $this->messageFlash->method('getFlashBag')->willReturn($addFlash);
//
//        $taskController = new TaskController($this->repository,
//            $this->tokenStorage,
//            $this->twig,
//            $this->formFactory,
//            $this->urlGenerator,
//            $this->messageFlash,
//            $this->authorization
//        );
//
//        $this->assertInstanceOf(Response::class,
//            $taskController->deleteTask($task));
//    }

}