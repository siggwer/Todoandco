<?php

namespace App\Entity\Traits;

/**
 * Trait Idtrait
 *
 * @package App\Entity\Traits
 */
trait Idtrait
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}