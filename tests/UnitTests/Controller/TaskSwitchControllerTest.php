<?php

namespace App\Tests\UnitTests\Controller;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Controller\TaskSwitchController;
use App\Repository\TaskRepository;
use PHPUnit\Framework\TestCase;
use App\Entity\Task;
use Exception;

/**
 * Class TaskSwitchControllerTest
 *
 * @package App\Tests\UnitTests\Controller
 */
class TaskSwitchControllerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testSwitchTaskResponse()
    {
        $task = $this->createMock(Task::class);

        $repository = $this->createMock(TaskRepository::class);

        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')->willReturn('task_list');

        $addFlash = $this->createMock(FlashBagInterface::class);
        $addFlash->method('add')->willReturn('test');

        $messageFlash = $this->createMock(Session::class);
        $messageFlash->method('getFlashBag')->willReturn($addFlash);

        $taskSwitchController = new TaskSwitchController();

        $this->assertInstanceOf(RedirectResponse::class,
            $taskSwitchController->switchTask($task, $repository, $urlGenerator, $messageFlash));
    }

    /**
     * @throws Exception
     */
    public function testSwitchaskRedirect()
    {
        $task = $this->createMock(Task::class);

        $repository = $this->createMock(TaskRepository::class);

        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')->willReturn('task_list');

        $addFlash = $this->createMock(FlashBagInterface::class);
        $addFlash->method('add')->willReturn('test');

        $messageFlash = $this->createMock(Session::class);
        $messageFlash->method('getFlashBag')->willReturn($addFlash);

        $taskSwitchController = new TaskSwitchController();

        $this->assertInstanceOf(RedirectResponse::class,
            $taskSwitchController->switchTask($task, $repository, $urlGenerator, $messageFlash));
    }
}