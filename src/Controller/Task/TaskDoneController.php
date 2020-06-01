<?php

namespace App\Controller\Task;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TaskRepository;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;

/**
 * Class TaskDoneController
 *
 * @package App\Controller
 */
class TaskDoneController
{
    /**
     * @Route(path="/tasks/done", name="task_done", methods={"GET"})
     *
     * @param TaskRepository $repository
     * @param Environment    $twig
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function taskDone(TaskRepository $repository, Environment $twig)
    {
        $tasks = $repository->findBy(
            [
                'isDone' => true
            ]
        );

        return new Response(
            $twig->render(
                'task/is_done.html.twig',
                [
                    'tasks' => $tasks
                ]
            ),
            Response::HTTP_OK
        );
    }
}
