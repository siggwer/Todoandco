<?php

namespace App\Tests\FunctionalTests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\TaskCreateType;
use App\Entity\Task;

/**
 * Class TaskTypeTest
 *
 * @package App\Tests\FunctionalTests\Form
 */
class TaskTypeTest extends TypeTestCase
{

    /**
     *
     */
    public function testForm()
    {
        $formData = [
            'title' => 'test',
            'content' => 'test'
        ];

        $taskToCompare = $this->createMock(Task::class);

        $form = $this->factory->create(TaskCreateType::class, $taskToCompare);

        $task = $this->createMock(Task::class);
        $task->setTitle('test');
        $task->setContent('test');

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($task, $taskToCompare);

        $this->assertInstanceOf(Task::class, $form->getData());
    }
}
