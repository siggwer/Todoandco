<?php

namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

/**
 * Class UserFixtures
 *
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     *
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

         for ($i = 1; $i <= 10; $i++) {
                $user = new User();
                $user->setUsername($faker->userName);
                $user->setEmail('email' . $i . '@email.fr');
                $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));
                $user->setRoles(['ROLE_USER']);
                $manager->persist($user);
                $this->setReference(self::USER_REFERENCE . '_' . $i, $user);
            }
            $manager->flush();
    }
}