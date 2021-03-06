<?php

namespace App\Tests\FunctionalTests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\UserEditType;
use App\Entity\User;

/**
 * Class UserEditTypeTest
 *
 * @package App\Tests\FunctionalTests\Form
 */
class UserEditTypeTest extends TypeTestCase
{
    /**
     *
     */
    public function testForm()
    {
        $formData = [
            'username' => 'test',
            'email' => 'test@test.com',
            'roles' => 'test'
        ];

        $userToCompare = $this->createMock(User::class);

        $form = $this->factory->create(UserEditType::class, $userToCompare);

        $user = $this->createMock(User::class);
        $user->setUsername('test');
        $user->setEmail('test@test.com');
        $user->setRoles(['test']);

        $form->submit($formData);

        $this->assertEquals($user, $userToCompare);

        $this->assertInstanceOf(User::class, $form->getData());
    }
}
