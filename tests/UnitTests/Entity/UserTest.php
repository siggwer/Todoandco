<?php

namespace App\Tests\UnitTests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Traits\Idtrait;
use ReflectionException;
use DateTimeImmutable;
use App\Entity\Task;
use App\Entity\User;
use ReflectionClass;
use Exception;

/**
 * Class UserTest
 *
 * @package App\Tests\UnitTests
 */
class UserTest extends TestCase
{
    use Idtrait;

    /**
     * @var User
     */
    private $user;

    /**
     * @throws Exception
     */
    public function setUp()
    {
        $this->user = new User();
    }

    /**
     * @throws ReflectionException
     */
    public function testGetId()
    {
        $user = new UserTest();
        $this->assertNull($user->getId());
        $reflecion = new ReflectionClass($user);
        $property = $reflecion->getProperty('id');
        $property->setAccessible(true);
        $property->setValue($user, '1');
        $this->assertEquals(1, $user->getId());
    }

    /**
     *
     */
    public function testGetUsername()
    {
        $this->user->setUsername('test');
        $result = $this->user->getUsername();
        $this->assertEquals('test', $result);
    }

    /**
     *
     */
    public function testGetEmail()
    {
        $this->user->setEmail('test@yopmail.com');
        $result = $this->user->getEmail();
        $this->assertEquals('test@yopmail.com', $result);
    }

    /**
     *
     */
    public function testGetPassword()
    {
        $this->user->setPassword('sfJDLKSmdlfsmdlfjlmskDFLMsdjflmSDFLMlm');
        $result = $this->user->getPassword();
        $this->assertEquals('sfJDLKSmdlfsmdlfjlmskDFLMsdjflmSDFLMlm', $result);
    }

    /**
     * @throws Exception
     */
    public function testGetCreatedAt()
    {
        $this->user->setCreatedAt(new DateTimeImmutable());
        $result = $this->user->getCreatedAt();
        $this->assertInstanceOf(DateTimeImmutable::class, $result);
    }

    /**
     *
     */
    public function testGetTaskReturn()
    {
        $task = new Task();
        $this->user->setTask($task);
        $this->assertSame($task, $this->user->getTask());
    }

    /**
     *
     */
    public function testGetRoles()
    {
        $this->user->setRoles(['ROLE_USER']);
        $this->assertSame(['ROLE_USER'], $this->user->getRoles());
    }
}
