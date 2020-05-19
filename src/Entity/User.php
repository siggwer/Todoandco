<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Idtrait;
use DateTimeImmutable;
use Exception;

/**
 * Class User
 *
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    use Idtrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, unique=true)
     *
     * @Assert\NotBlank(message="Vous devez saisir un nom d'utilisateur.")
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=false)
     *
     * @Assert\Length(
     *     min="6",
     *     max="64",
     *     minMessage="Votre mot de passe doit contenir 8 caracteres minimum",
     *     maxMessage="Votre mot de passe doit contenir 64 caracteres maximum"
     * )
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=60, unique=true)
     *
     * @Assert\NotBlank(message="Vous devez saisir une adresse email.")
     * @Assert\Email(message="Le format de l'adresse n'est pas correcte.")
     */
    private $email;

    /**
     * @var DateTimeImmutable
     *
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @var Task
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Task", mappedBy="user", orphanRemoval=false)
     */
    private $task;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * User constructor.
     *
     * @throws Exception
     */
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return Task
     */
    public function getTask(): Task
    {
        return $this->task;
    }

    /**
     * @param Task $task
     */
    public function setTask(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
        //return ['ROLE_USER'];
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     *
     * @codeCoverageIgnore
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
