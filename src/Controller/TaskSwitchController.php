<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\OptimisticLockException;
use App\Repository\TaskRepository;
use Doctrine\ORM\ORMException;
use App\Entity\Task;

/**
 * Class TaskSwitchController
 *
 * @package App\Controller
 */
class TaskSwitchController
{
    /**
     * @Route(path="/tasks/switch/{id}", name="task_switch", methods={"GET"})
     * @param                            Task                  $task
     * @param                            TaskRepository        $repository
     * @param                            UrlGeneratorInterface $urlGenerator
     * @param                            SessionInterface      $messageFlash
     *
     * @return RedirectResponse
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function switchTask(
        Task $task,
        TaskRepository $repository,
        UrlGeneratorInterface $urlGenerator,
        SessionInterface $messageFlash
    ) {
        $task->switch(!$task->isDone());

        $repository->updateTask();

        if ($task->isDone() == false) {
            $messageFlash->getFlashBag()->add(
                'success',
                sprintf(
                    'La tâche %s a bien été marquée : à faire.',
                    $task->getTitle()
                )
            );
        }

        return new RedirectResponse(
            $urlGenerator->generate('task_list'),
            RedirectResponse::HTTP_FOUND
        );
    }
}
