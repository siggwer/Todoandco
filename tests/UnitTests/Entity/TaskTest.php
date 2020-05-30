<?php

namespace App\Tests\UnitTests\Entity;

use PHPUnit\Framework\TestCase;
use ReflectionException;
use DateTimeImmutable;
use App\Entity\User;
use App\Entity\Task;
use ReflectionClass;
use Exception;

class TaskTest extends TestCase
{
    /**
     * @var Task
     */
    private $task;

    /**
     *
     */
    public function setUp()
    {
        $this->task = new Task();
    }

    /**
     * @throws ReflectionException
     */
    public function testGetId()
    {
        $task = new Task();
        $this->assertNull($task->getId());
        try {
            $reflecion = new ReflectionClass($task);
        } catch (ReflectionException $e) {
        }
        $property = $reflecion->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($task, '1');
        $this->assertEquals(1, $task->getId());
    }

    /**
     *
     */
    public function testGetTitle()
    {
        $this->task->setTitle('test');
        $this->assertSame('test', $this->task->getTitle());
    }

    /**
     *
     */
    public function testGetContent()
    {
        $this->task->setContent('test');
        $this->assertSame('test', $this->task->getContent());
    }

    /**
     *
     */
    public function testIsDone()
    {
        $this->task->setIsDone(false);
        $this->assertSame(false, $this->task->isDone());
    }

    /**
     * @throws Exception
     */
    public function testGetUser()
    {
        $user = new User();
        $this->task->setUser($user);
        $this->assertSame($user, $this->task->getUser());
    }

    /**
     * @throws Exception
     */
    public function testGetDateIsDone()
    {
        $date = new DateTimeImmutable();
        $this->task->setDateIsDone($date);
        $this->assertSame($date, $this->task->getDateIsDone());
    }

    /**
     * @throws Exception
     */
    public function testGetCreatedAtReturn()
    {
        $date = new DateTimeImmutable();
        $this->task->setCreatedAt($date);
        $this->assertSame($date, $this->task->getCreatedAt());
    }
}
