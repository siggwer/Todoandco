<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\OptimisticLockException;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;
use App\Entity\User;
use Twig\Environment;

/**
 * Class UserDeleteController
 *
 * @package App\Controller
 */
class UserDeleteController
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserDeleteController constructor.
     *
     * @param Environment           $twig
     * @param UrlGeneratorInterface $urlGenerator
     * @param UserRepository        $repository
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator, UserRepository $repository)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
        $this->repository = $repository;
    }

    /**
     * @Route(path="/delete/user/{id}", name="user_delete", methods={"GET"})
     *
     * @param User                  $user
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface      $messageFlash
     *
     * @return RedirectResponse
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deleteUser(
        User $user,
        TokenStorageInterface $tokenStorage,
        SessionInterface $messageFlash
    ) {
        if ($user != $tokenStorage->getToken()->getUser()) {
            $this->repository->userDelete($user);

            $messageFlash->getFlashBag()->add('success', "L'utilisateur a bien été supprimée.");
        }

        return new RedirectResponse(
            $this->urlGenerator->generate('user_list'),
            RedirectResponse::HTTP_FOUND
        );
    }
}
