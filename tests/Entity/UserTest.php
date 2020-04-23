<?php

namespace App\Tests\Entity;

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
        try {
            $reflecion = new ReflectionClass($user);
        } catch (ReflectionException $e) {
        }
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

//    /**
//     *
//     */
//    public function testGetPasswordToken()
//    {
//        $this->user->setPasswordToken('qsùdqSDKùmsd%MSDKLQù');
//        $result = $this->user->getPasswordToken();
//        $this->assertEquals('qsùdqSDKùmsd%MSDKLQù', $result);
//    }

    /**
     * @throws Exception
     */
    public function testGetCreatedAt()
    {
        $this->user->setCreatedAt(new DateTimeImmutable());
        $result = $this->user->getCreatedAt();
        $this->assertInstanceOf(DateTimeImmutable::class, $result);
    }

//    /**
//     *
//     */
//    public function testGetAvatar()
//    {
//        $this->user->setAvatar(new Picture());
//        $result = $this->user->getAvatar();
//        $this->assertInstanceOf(Picture::class, $result);
//    }

//    /**
//     *
//     */
//    public function testGetUploadedFile()
//    {
//        $this->user->setUploadedFile(
//            new UploadedFile(
//                'public/images/image.png',
//                '%kernel.project_dir%/public/uploads'
//            )
//        );
//        $result = $this->user->getUploadedFile();
//        $this->assertInstanceOf(UploadedFile::class, $result);
//    }

//    /**
//     *
//     */
//    public function testGetToken()
//    {
//        $this->user->setToken('lmqsdkqqSDLMQdlùqSLQ');
//        $result = $this->user->getToken();
//        $this->assertEquals('lmqsdkqqSDLMQdlùqSLQ', $result);
//    }

    /**
     *
     */
    public function testGetTaskReturn()
    {
        $task = new Task();
        $this->user->setTask($task);
        static::assertSame($task, $this->user->getTask());
    }

    /**
     *
     */
    public function testGetRole()
    {
        $this->user->setRoles(['ROLE_USER']);
        $result = $this->user->getRoles();
        $this->assertEquals(['ROLE_USER'], $result);
    }

    /**
     *
     */
    public function testGetRoles()
    {
        $this->assertEquals(['ROLE_USER'], $this->user->getRoles());
    }
}