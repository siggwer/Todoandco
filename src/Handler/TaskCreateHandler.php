<?php

namespace App\Handler;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;
use App\Repository\TaskRepository;
use App\Entity\Task;

/**
 * Class TaskCreateHandler
 *
 * @package App\Handler
 */
class TaskCreateHandler
{
    /**
     * @var TaskRepository
     */
    private $repository;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * TaskCreateHandler constructor.
     *
     * @param TaskRepository        $repository
     * @param TokenStorageInterface $tokenStorage
     * @param SessionInterface      $messageFlash
     */
    public function __construct(
        TaskRepository $repository,
        TokenStorageInterface $tokenStorage,
        SessionInterface $messageFlash
    ) {
        $this->repository = $repository;
        $this->tokenStorage = $tokenStorage;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @param Task          $task
     *
     * @return bool
     */
    public function handle(FormInterface $form, Task $task)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $task->setUser($this->tokenStorage->getToken()->getUser());

            $this->repository->createTask($task);

            $this->messageFlash->getFlashBag()->add('success', 'La tâche a bien été ajoutée.');

            return true;
        }
        return false;
    }
}
