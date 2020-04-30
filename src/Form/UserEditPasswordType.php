<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

/**
 * Class UserEditPasswordType
 *
 * @package App\Form
 */
class UserEditPasswordType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'password', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options'  => [
                        'label' => 'Nouveau mot de passe'
                    ],
                    'second_options' => [
                        'label' => 'Tapez le mot de passe à nouveau'
                    ],
                ]
            );
    }
}