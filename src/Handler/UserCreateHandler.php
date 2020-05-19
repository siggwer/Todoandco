<?php

namespace App\Handler;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;
use App\Repository\UserRepository;
use App\Entity\User;

/**
 * Class UserCreateHandler
 *
 * @package App\FormHandler
 */
class UserCreateHandler
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
     * UserCreateHandler constructor.
     *
     * @param UserRepository               $repository
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param SessionInterface             $messageFlash
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
     * @param User          $user
     *
     * @return bool
     */
    public function handle(FormInterface $form, User $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());

            $user->setPassword($password);

            $this->repository->userSave($user);

            $this->messageFlash->getFlashBag()->add('success', "L'utilisateur a bien été ajouté.");

            return true;
        }
        return false;
    }
}
