<?php

namespace App\Handler;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;
use App\Entity\User;

/**
 * Class UserEditPasswordHandler
 *
 * @package App\Handler
 */
class UserEditPasswordHandler
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * UserEditPasswordHandler constructor.
     *
     * @param UserRepository $repository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $repository,
        UserPasswordEncoderInterface $passwordEncoder,
        SessionInterface $messageFlash
    ) {
        $this->repository = $repository;
        $this->passwordEncoder = $passwordEncoder;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @param User $user
     *
     * @return bool
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function handle(FormInterface $form, User $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());

            $user->setPassword($password);

            $this->repository->userUpdate();

            $this->messageFlash->getFlashBag()->add('success', "Le mot de passe à bien été modifié.");

            return true;
        }
        return false;
    }
}