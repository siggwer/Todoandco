<?php

namespace App\Command;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;
use Doctrine\ORM\OptimisticLockException;
use App\Repository\UserRepository;
use Doctrine\ORM\ORMException;
use App\Entity\User;

/**
 * Class AdminCreateCommand
 *
 * @package App\Command
 */
class AdminCreateCommand extends Command
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var User
     */
    private $user;

    /**
     * @var bool
     */
    private $username;

    /**
     * @var bool
     */
    private $password;

    /**
     * @var bool
     */
    private $email;

    /**
     * AdminCreateCommand constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserRepository          $repository
     * @param bool                    $username
     * @param bool                    $password
     * @param bool                    $email
     */
    public function __construct(
        EncoderFactoryInterface $encoderFactory,
        UserRepository $repository,
        $username = true,
        $password = true,
        $email = true
    ) {
        parent::__construct();
        $this->encoderFactory = $encoderFactory;
        $this->repository = $repository;
        $this->user = new User();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('app:create-admin')
            ->setDescription('Create admin account')
            ->setHelp("Cette commande vous assiste pour la création d'un compte administrateur")
            ->addArgument('username', InputArgument::REQUIRED, 'Username of the admin')
            ->addArgument('password', InputArgument::REQUIRED, 'password admin')
            ->addArgument('email', InputArgument::REQUIRED, 'Email admin');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|void
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
            [
            'Admin Creator',
            '============',
            '',
            ]
        );

        $output->writeln('You are about to create an admin-user.');
        $output->writeln('Username: ' .$input->getArgument('username'));
        $output->writeln('Password: ' .$input->getArgument('password'));
        $output->writeln('Email: ' .$input->getArgument('email'));
        $output->writeln('Role: ROLE_ADMIN');

        $passwordEncode = $this->encoderFactory->getEncoder(User::class)
            ->encodePassword($input->getArgument('password'), null);

        $this->user->setUsername($input->getArgument('username'));
        $this->user->setPassword($passwordEncode);
        $this->user->setEmail($input->getArgument('email'));
        $this->user->setRoles(['ROLE_ADMIN']);

        $this->repository->userSave($this->user);

        $output->writeln('Admin successfully created');
    }
}
