<?php

namespace App\Tests\FunctionalTests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\UserEditPasswordType;
use App\Entity\User;

/**
 * Class UserPasswordTypeTest
 *
 * @package App\Tests\FunctionalTests\Form
 */
class UserPasswordTypeTest extends TypeTestCase
{
    /**
     *
     */
    public function testForm()
    {
        $formData = [
            'password' => 'pass'
        ];

        $userToCompare = $this->createMock(User::class);

        $form = $this->factory->create(UserEditPasswordType::class, $userToCompare);

        $user = $this->createMock(User::class);
        $user->setPassword('pass');

        $form->submit($formData);

        $this->assertEquals($user, $userToCompare);

        $this->assertInstanceOf(User::class, $form->getData());
    }
}
