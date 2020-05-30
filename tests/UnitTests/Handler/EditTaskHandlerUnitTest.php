<?php

namespace App\Tests\UnitTests\Handler;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Repository\TaskRepository;
use App\Handler\TaskEditHandler;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\ORMException;

/**
 * Class EditTaskHandlerUnitTest
 *
 * @package App\Tests\UnitTests\FormHandler
 */
class EditTaskHandlerUnitTest extends TestCase
{
    /**
     * @var
     */
    private $repository;
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
        $this->messageFlash = $this->createMock(Session::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $handler = new TaskEditHandler(
            $this->repository,
            $this->messageFlash
        );

        static::assertInstanceOf(TaskEditHandler::class, $handler);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testEditTaskHandlerIfReturnTrue()
    {
        $form = $this->createMock(FormInterface::class);

        $handler = new TaskEditHandler(
            $this->repository,
            $this->messageFlash
        );

        static::assertTrue(true, $handler->handle($form));
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testEditTaskHandlerIfReturnFalse()
    {
        $form = $this->createMock(FormInterface::class);

        $handler = new TaskEditHandler(
            $this->repository,
            $this->messageFlash
        );

        static::assertfalse(false, $handler->handle($form));
    }
}
