<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\OptimisticLockException;
use App\Controller\TaskDeleteController;
use App\Repository\TaskRepository;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\ORMException;
use Twig\Environment;
use App\Entity\Task;

/**
 * Class TaskDeleteControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskDeleteControllerTest extends TestCase
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
        $this->form = $this->createMock(FormInterface::class);
        $this->authorization = $this->createMock(AuthorizationCheckerInterface::class);
    }

    /**
     *
     */
    public function testConstructor()
    {
        $controller = new TaskDeleteController(
            $this->repository,
            $this->tokenStorage,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->messageFlash,
            $this->authorization
        );

        static::assertInstanceOf(TaskDeleteController::class, $controller);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function testDeleteTaskRedirection()
    {
        $user = $this->createMock(TokenInterface::class);
        $user->method('getUser')->willReturn($user);

        $this->tokenStorage->method('getToken')->willReturn($user);

        $task = $this->createMock(Task::class);

        $this->urlGenerator->method('generate')->willReturn('task_list');

        $addFlash = $this->createMock(FlashBagInterface::class);
        $addFlash->method('add')->willReturn('test');

        $this->messageFlash->method('getFlashBag')->willReturn($addFlash);

        $controller = new TaskDeleteController(
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
            $controller->taskDelete($task)
        );
    }
}
