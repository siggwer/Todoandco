<?php

namespace App\Tests\UnitTests\Handler;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Handler\UserEditPasswordHandler;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\ORMException;
use App\Entity\User;

/**
 * Class EditPasswordHandlerUnitTest
 *
 * @package App\Tests\UnitTests\FormHandler
 */
class EditPasswordHandlerUnitTest extends TestCase
{
    /**
     * @var
     */
    private $repository;
    /**
     * @var
     */
    private $passwordEncoder;
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
        $this->passwordEncoder = $this->createMock(UserPasswordEncoderInterface::class);
        $this->messageFlash = $this->createMock(Session::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $handler = new UserEditPasswordHandler(
            $this->repository,
            $this->passwordEncoder,
            $this->messageFlash
        );

        static::assertInstanceOf(UserEditPasswordHandler::class, $handler);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testHandleIfReturnTrue()
    {
        $form = $this->createMock(FormInterface::class);

        $user = $this->createMock(User::class);

        $this->passwordEncoder->method('encodePassword')
            ->willReturn('$2y$10$EIt8vwi9JcNZFp4tCJQWEuGHRXKTh96sp4nr69gp1qRsxXN364zVu');

        if ($form->method('isSubmitted')
                ->willReturn(true) && $form->method('isValid')
                ->willReturn(true)) {

            $handler = new UserEditPasswordHandler(
                $this->repository,
                $this->passwordEncoder,
                $this->messageFlash
            );

            $addFlash = $this->createMock(FlashBagInterface::class);
            $addFlash->method('add')->willReturn('test');

            $this->messageFlash->method('getFlashBag')->willReturn($addFlash);

            static::assertSame(true, $handler->handle($form, $user));
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testHandleIfReturnFalse()
    {
        $form = $this->createMock(FormInterface::class);
        $user = $this->createMock(User::class);

        $handler = new UserEditPasswordHandler(
            $this->repository,
            $this->passwordEncoder,
            $this->messageFlash
        );

        static::assertSame(false, $handler->handle($form, $user));
    }
}