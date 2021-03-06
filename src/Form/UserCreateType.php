<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

/**
 * Class UserCreateType
 *
 * @package App\Form
 */
class UserCreateType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     *
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                TextType::class,
                [
                    'label' => "Nom d'utilisateur"
                ]
            )

            ->add(
                'password',
                RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options'  => [
                        'label' => 'Mot de passe'
                    ],
                    'second_options' => [
                        'label' => 'Tapez le mot de passe à nouveau'
                    ],
                ]
            )

            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Adresse email'
                ]
            )

            ->add(
                'roles',
                ChoiceType::class,
                [
                    'required' => true,
                    'choices' => [
                        'Utilisateur' => 'ROLE_USER',
                        'Administrateur' => 'ROLE_ADMIN'
                    ],
                    'multiple' => true,
                    'expanded' => false
                ]
            );
    }
}
