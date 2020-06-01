<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTimeImmutable;
use App\Entity\Task;
use Faker;

/**
 * Class TaskFixtures
 *
 * @package App\DataFixtures
 */
class TaskFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($j = 1; $j <= 10; $j++) {
            for ($i = 1; $i <= 25; $i++) {
                $task = new Task();
                $task->setTitle($faker->word);
                $task->setContent($faker->text());
                $task->setDateIsDone(new DateTimeImmutable());
                $task->setUser($this->getReference(UserFixtures::USER_REFERENCE . '_' . $j));
                $manager->persist($task);
            }
            $manager->flush();
        }
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
