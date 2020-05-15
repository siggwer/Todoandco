<?php

namespace App\Tests\UnitTests\FormHandler;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Repository\TaskRepository;
use App\Handler\TaskCreateHandler;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\ORMException;
use App\Entity\Task;

/**
 * Class CreateTaskHandlerUnitTest
 *
 * @package App\Tests\UnitTests\FormHandler
 */
class CreateTaskHandlerUnitTest extends TestCase
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
    private $messageFlash;

    /**
     *
     */
    public function setUp()
    {
        $this->repository = $this->createMock(TaskRepository::class);
        $this->tokenStorage = $this->createMock(TokenStorageInterface::class);
        $this->messageFlash = $this->createMock(Session::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $handler = new TaskCreateHandler(
            $this->repository,
            $this->tokenStorage,
            $this->messageFlash
        );

        static::assertInstanceOf(TaskCreateHandler::class, $handler);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testHandleIfReturnTrue()
    {
        $form = $this->createMock(FormInterface::class);
        $task = $this->createMock(Task::class);

        $handler = new TaskCreateHandler(
            $this->repository,
            $this->tokenStorage,
            $this->messageFlash
        );

        static::assertTrue(true, $handler->handle($form, $task));
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testHandleIfReturnFalse()
    {
        $form = $this->createMock(FormInterface::class);
        $task = $this->createMock(Task::class);

        $handler = new TaskCreateHandler(
            $this->repository,
            $this->tokenStorage,
            $this->messageFlash
        );

        static::assertFalse(false, $handler->handle($form, $task));
    }
}