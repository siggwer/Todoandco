<?php

namespace App\Tests\FunctionalTests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class CommandUserTest
 *
 * @package App\Tests\FunctionalTests\Command
 */
class CommandUserTest extends KernelTestCase
{
    /**
     *
     */
    public function testExecute()
    {
        $string = str_shuffle('azertyuiop123456');

        $kernel = static::createKernel();
        $application = new Application($kernel);
        $command = $application->find('app:create-admin');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command'  => $command->getName(),
            'username' => $string,
            'password' => 'password',
            'email' => $string.'@email.com',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('You are about to create an admin-user.', $output);
    }
}