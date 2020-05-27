<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\TaskListController;
use App\Repository\TaskRepository;
use PHPUnit\Framework\TestCase;
use Twig_Error_Runtime;
use Twig_Error_Loader;
use Twig_Error_Syntax;
use Twig\Environment;

/**
 * Class TaskListControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskListControllerTest extends TestCase
{
    /**
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function testTaskListResponse()
    {
        $twig = $this->createMock(Environment::class);
        $repository = $this->createMock(TaskRepository::class);

        $taskController = new TaskListController();

        $this->assertInstanceOf(Response::class,
            $taskController->tasksList($repository, $twig));
    }
}