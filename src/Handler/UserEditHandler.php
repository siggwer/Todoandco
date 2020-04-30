<?php

namespace App\Handler;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;

/**
 * Class UserEditHandler
 *
 * @package App\FormHandler
 */
class UserEditHandler
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * UserEditHandler constructor
     *
     * @param UserRepository $repository
     * @param SessionInterface $messageFlash
     */
    public function __construct(UserRepository $repository, SessionInterface $messageFlash)
    {
        $this->repository = $repository;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     *
     * @return bool
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $this->repository->userUpdate();

            $this->messageFlash->getFlashBag()->add('success', "L'utilisateur a bien été modifié.");

            return true;
        }
        return false;
    }

}