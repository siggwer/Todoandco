<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Controller\TaskDoneController;
use App\Repository\TaskRepository;
use PHPUnit\Framework\TestCase;
use Twig_Error_Runtime;
use Twig_Error_Loader;
use Twig_Error_Syntax;
use Twig\Environment;

/**
 * Class TaskDoneControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskDoneControllerTest extends TestCase
{
    /**
     * @throws Twig_Error_Loader
     * @throws Twig_Error_Runtime
     * @throws Twig_Error_Syntax
     */
    public function testTaskDoneResponse()
    {
        $twig = $this->createMock(Environment::class);
        $repository = $this->createMock(TaskRepository::class);

        $taskDoneController = new TaskDoneController();

        $this->assertInstanceOf(Response::class,
            $taskDoneController->taskDone($repository, $twig));
    }
}