<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Idtrait;
use DateTimeImmutable;
use Exception;

/**
 * Class Task
 *
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\TaskRepository")
 * @ORM\EntityListeners({"App\Listener\TaskListener"})
 */
class Task
{
    use Idtrait;

    /**
     * @var DateTimeImmutable|null
     *
     * @ORM\Column(type="datetime_immutable")
     *
     * @Assert\DateTime()
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Vous devez saisir un titre.")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(message="Vous devez saisir du contenu.")
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isDone;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(type="datetime_immutable", nullable=true)
     *
     * @Assert\DateTime()
     */
    private $dateIsDone;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="task")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    private $user;

    /**
     * Task constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->isDone = false;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable|null $createdAt
     */
    public function setCreatedAt(?DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string| null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     * @param bool $isDone
     */
    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    /**
     * @param bool $flag
     */
    public function switch(bool $flag)
    {
        $this->isDone = $flag;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getDateIsDone(): DateTimeImmutable
    {
        return $this->dateIsDone;
    }

    /**
     * @param DateTimeImmutable $dateIsDone
     */
    public function setDateIsDone(DateTimeImmutable $dateIsDone): void
    {
        $this->dateIsDone = $dateIsDone;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
