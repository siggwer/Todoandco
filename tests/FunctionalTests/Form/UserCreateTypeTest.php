<?php

namespace App\Tests\FunctionalTests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\UserCreateType;
use App\Entity\User;

/**
 * Class UserCreateTypeTest
 *
 * @package App\Tests\FunctionalTests\Form
 */
class UserCreateTypeTest extends TypeTestCase
{
    /**
     *
     */
    public function testForm()
    {
        $formData = [
          'username' => 'test',
            'password' => [
                'first_option' => 'password',
                'second_option' => 'password'
            ],
            'email' => 'test@test.com',
            'roles' => ['test']
        ];

        $userToCompare = $this->createMock(User::class);

        $form = $this->factory->create(UserCreateType::class, $userToCompare);

        $user = $this->createMock(User::class);

        $user->setUsername('test');
        $user->setPassword('password');
        $user->setEmail('test@test.com');
        $user->setRoles(['test']);

        $form->submit($formData);

        $this->assertEquals($user, $userToCompare);

        $this->assertInstanceOf(User::class, $form->getData());

    }
}