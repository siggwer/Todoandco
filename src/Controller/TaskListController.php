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
 * Class TaskListController
 *
 * @package App\Controller
 */
class TaskListController
{
    /**
     * @Route(path="/tasks/list", name="task_list", methods={"GET"})
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
    public function tasksList(TaskRepository $repository, Environment $twig)
    {
        $tasks = $repository->listTask();

        return new Response(
            $twig->render(
                'task/list.html.twig',
                [
                    'tasks' => $tasks
                ]
            ),
            Response::HTTP_OK
        );
    }
}
