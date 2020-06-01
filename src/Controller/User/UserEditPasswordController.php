<?php

namespace App\Controller\User;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\OptimisticLockException;
use App\Handler\UserEditPasswordHandler;
use App\Form\UserEditPasswordType;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;
use Twig\Environment;
use App\Entity\User;

/**
 * Class UserEditPasswordController
 *
 * @package App\Controller
 */
class UserEditPasswordController
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
     * UserEditPasswordController constructor.
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
     * @Route(path="/user/password/{id}", name="user_password", methods={"GET", "POST"})
     *
     * @param User                    $user
     * @param Request                 $request
     * @param UserEditPasswordHandler $userEditPasswordHandler
     *
     * @return RedirectResponse|Response
     *
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function userEditPassword(
        User $user,
        Request $request,
        UserEditPasswordHandler $userEditPasswordHandler
    ) {
        $form = $this->formFactory->create(UserEditPasswordType::class, $user)
            ->handleRequest($request);

        if ($userEditPasswordHandler->handle($form, $user)) {
            return new RedirectResponse(
                $this->urlGenerator->generate('user_list'),
                RedirectResponse::HTTP_FOUND
            );
        }

        return new Response(
            $this->twig->render(
                'user/update_password.html.twig',
                [
                    'form' => $form->createView(),
                    'user' => $user
                ]
            ),
            Response::HTTP_OK
        );
    }
}
