<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\UserRepository;
use App\Handler\UserEditHandler;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use App\Form\UserEditType;
use Twig\Environment;
use App\Entity\User;

/**
 * Class UserEditController
 *
 * @package App\Controller
 */
class UserEditController
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
     * UserEditController constructor.
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
     * @Route(path="/users/edit/{id}", name="user_edit", methods={"GET", "POST"})
     *
     * @param User            $user
     * @param Request         $request
     * @param UserEditHandler $UserEditHandler
     *
     * @return RedirectResponse|Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function userEdit(
        User $user,
        Request $request,
        UserEditHandler $UserEditHandler
    ) {
        $form = $this->formFactory->create(UserEditType::class, $user)
            ->handleRequest($request);

        if ($UserEditHandler->handle($form)) {
            return new RedirectResponse(
                $this->urlGenerator->generate('user_list'),
                RedirectResponse::HTTP_FOUND
            );
        }

        return new Response(
            $this->twig->render(
                'user/edit.html.twig',
                [
                    'form' => $form->createView(),
                    'user' => $user
                ]
            ),
            Response::HTTP_OK
        );
    }
}
