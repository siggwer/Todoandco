<?php

namespace App\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use App\Entity\Task;

/**
 * Class TaskListener
 *
 * @package App\Listener
 */
class TaskListener
{
    /**
     * @var
     */
    private $cacheDriver;

    /**
     * TaskListener constructor.
     *
     * @param $cacheDriver
     */
    public function __construct($cacheDriver)
    {
        $this->cacheDriver = $cacheDriver;
    }

    /**
     * @param Task               $task
     * @param LifecycleEventArgs $args
     */
    public function postPersist(Task $task, LifecycleEventArgs $args)
    {
        $this->cacheDriver->expire('[tasks][1]', 0);
    }

    /**
     * @param Task               $task
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(Task $task, LifecycleEventArgs $args)
    {
        $this->cacheDriver->expire('[tasks][1]', 0);
    }

    /**
     * @param Task               $task
     * @param LifecycleEventArgs $args
     */
    public function postRemove(Task $task, LifecycleEventArgs $args)
    {
        $this->cacheDriver->expire('[tasks][1]', 0);
    }
}
