<?php

namespace App\Tests\FunctionalTests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\UserType;
use App\Entity\User;

/**
 * Class UserTypeTest
 *
 * @package App\Tests\FunctionalTests\Form
 */
class UserTypeTest extends TypeTestCase
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

        $form = $this->factory->create(UserType::class, $userToCompare);

        $user = $this->createMock(User::class);

        $user->setUsername('test');
        $user->setPassword('password');
        $user->setEmail('test@test.com');
        $user->setRoles(['test']);
        dd($user->setPassword('password'));
        exit;
        $form->submit($formData);

        $this->assertEquals($user, $userToCompare);

        $this->assertInstanceOf(User::class, $form->getData());

    }
}