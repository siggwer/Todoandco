<?php

namespace App\Controller\User;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Handler\UserCreateHandler;
use App\Repository\UserRepository;
use App\Form\UserCreateType;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;
use App\Entity\User;

/**
 * Class UserCreateController
 *
 * @package App\Controller
 */
class UserCreateController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserCreateController constructor.
     *
     * @param Environment           $twig
     * @param FormFactoryInterface  $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param UserRepository        $repository
     */
    public function __construct(
        Environment $twig,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator,
        UserRepository $repository
    ) {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
        $this->urlGenerator = $urlGenerator;
        $this->repository = $repository;
    }

    /**
     * @Route(path="/users/create", name="user_create", methods={"GET","POST"})
     *
     * @param Request           $request
     * @param UserCreateHandler $userCreateHandler
     *
     * @return RedirectResponse|Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function userCreate(Request $request, UserCreateHandler $userCreateHandler)
    {
        $user = new User();

        $form = $this->formFactory->create(UserCreateType::class, $user)
            ->handleRequest($request);

        if ($userCreateHandler->handle($form, $user)) {
            return new RedirectResponse(
                $this->urlGenerator->generate('home'),
                RedirectResponse::HTTP_FOUND
            );
        }

        return new Response(
            $this->twig->render(
                'user/create.html.twig',
                [
                    'form' => $form->createView()
                ]
            ),
            Response::HTTP_OK
        );
    }
}
