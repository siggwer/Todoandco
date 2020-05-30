<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use App\Controller\UserEditPasswordController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use App\Handler\UserEditPasswordHandler;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;
use App\Entity\User;
use Exception;

/**
 * Class UserEditPasswordTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class UserEditPasswordTest extends TestCase
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
    private $userEditPasswordHandler;

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
        $this->userEditPasswordHandler = $this->createMock(UserEditPasswordHandler::class);
        $this->form = $this->createMock(FormInterface::class);
        $this->user = $this->createMock(User::class);
    }


    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function testEditUserPasswordIfHandleIsFalse()
    {
        $this->userEditPasswordHandler->method('handle')->willReturn(false);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $request = Request::create('/user/password/{id}', 'GET', ['id'=>1]);

        $controller = new UserEditPasswordController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            Response::class,
            $controller->userEditPassword($this->user, $request, $this->userEditPasswordHandler)
        );
    }

    /**
     * @throws Exception
     */
    public function testEditUserPasswordIfHandleIsTrue()
    {
        $this->userEditPasswordHandler->method('handle')->willReturn(true);

        $this->form->method('handleRequest')->willReturn($this->form);

        $this->formFactory->method('create')->willReturn($this->form);

        $this->urlGenerator->method('generate')->willReturn('user_list');

        $request = Request::create('/user/password/{id}', 'GET', ['id'=>1]);

        $controller = new UserEditPasswordController(
            $this->twig,
            $this->formFactory,
            $this->urlGenerator,
            $this->repository
        );

        $this->assertInstanceOf(
            RedirectResponse::class,
            $controller->userEditPassword($this->user, $request, $this->userEditPasswordHandler)
        );
    }
}
