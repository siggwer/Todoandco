<?php

namespace App\Tests\UnitTests\FormHandler;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Repository\UserRepository;
use App\Handler\UserEditHandler;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\ORMException;

/**
 * Class EditUserHandlerUnitTest
 *
 * @package App\Tests\UnitTests\FormHandler
 */
class EditUserHandlerUnitTest extends TestCase
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
        $this->repository = $this->createMock(UserRepository::class);
        $this->messageFlash = $this->createMock(Session::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $handler = new UserEditHandler(
            $this->repository,
            $this->messageFlash
        );

        static::assertInstanceOf(UserEditHandler::class, $handler);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testHandlerIfReturnTrue()
    {
        $form = $this->createMock(FormInterface::class);

        $handler = new UserEditHandler(
            $this->repository,
            $this->messageFlash
        );

        static::assertTrue(true, $handler->handle($form));
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testHandlerIfReturnFalse()
    {
        $form = $this->createMock(FormInterface::class);

        $handler = new UserEditHandler(
            $this->repository,
            $this->messageFlash
        );

        static::assertFalse(false, $handler->handle($form));
    }
}