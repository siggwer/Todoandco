<?php

namespace App\Handler;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Component\Form\FormInterface;
use App\Repository\TaskRepository;
use Doctrine\ORM\ORMException;

/**
 * Class TaskEditHandler
 *
 * @package App\Handler
 */
class TaskEditHandler
{
    /**
     * @var TaskRepository
     */
    private $repository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * TaskEditHandler constructor.
     *
     * @param TaskRepository   $repository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        TaskRepository $repository,
        SessionInterface $messageFlash
    ) {
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
            $this->repository->update();

            $this->messageFlash->getFlashBag()->add('success', 'La tâche a bien été modifiée.');

            return true;
        }
        return false;
    }
}
