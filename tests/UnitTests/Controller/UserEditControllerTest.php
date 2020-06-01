<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use App\Controller\User\UserEditController;
use App\Repository\UserRepository;
use App\Handler\UserEditHandler;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use App\Entity\User;
use Exception;

/**
 * Class UserEditControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserEditControllerTest extends TestCase
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
    private $userEditHandler;

    /**
     * @var
     */
    private $form;

    /**
     * @var
     */
    private $user;

    /**
     *
     */
    public function setUp()
    {
        $this->twig = $this->createMock(Environment::class);
        $this->formFactory = $this->createMock(FormFactoryInterface::class);
        $this->urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $this->repository = $this->createMock(UserRepository::class);
        $this->userEditHandler = $this->createMock(UserEditHandler::class);
        $this->form = $this->createMock(FormInterface::class);
        $this->user = $this->createMock(User::class);
    }

    /**
     *
     */
    public function testConstructor()
    {
        $controller = new UserEditController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        static::assertInstanceOf(UserEditController::class, $controller);
    }

    /**
     * @throws Exception
     */
    public function testEditUserIfHandleIsFalse()
    {
        $this->userEditHandler->method('handle')->willReturn(false);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $request = Request::create('/users/edit/{id}', 'GET', ['id'=>1]);

        $controller = new UserEditController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            Response::class,
            $controller->userEdit($this->user, $request, $this->userEditHandler)
        );
    }

    /**
     * @throws Exception
     */
    public function testEditUserIfHandleTrue()
    {
        $this->userEditHandler->method('handle')->willReturn(true);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $this->urlGenerator->method('generate')->willReturn('user_list');

        $request = Request::create('/users/edit/{id}', 'GET', ['id'=>1]);

        $controller = new UserEditController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            RedirectResponse::class,
            $controller->userEdit($this->user, $request, $this->userEditHandler)
        );
    }
}
