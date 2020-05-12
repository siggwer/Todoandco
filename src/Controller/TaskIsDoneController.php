<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TaskRepository;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;

/**
 * Class TaskIsDoneController
 *
 * @package App\Controller
 */
class TaskIsDoneController
{
    /**
     * @Route(path="/tasks/done/{id}", name="task_done", methods={"GET"})
     *
     * @param TaskRepository $repository
     * @param Environment $twig
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function taskIsDone(TaskRepository $repository, Environment $twig)
    {
        $tasks = $repository->findBy(
            [
                'isDone' => true
            ]
        );

        return new Response(
            $twig->render(
                'task/is_done.html.twig', [
                    'tasks' => $tasks
                ]
            ), Response::HTTP_OK
        );
    }
}