<?php

namespace Fantasy\Bundle\DemoBundle\Command;

use Oro\Bundle\UserBundle\Entity\User;
use Symfony\Component\Console\Command\Command;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\UserBundle\Entity\Role;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RelateUserRoleCommand extends Command
{
    protected static $defaultName = 'oro:custom:relate-user';

    public function __construct(readonly private ObjectManager $manager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Relate user with role')
            ->setHelp('This command ask for a username and a role to create a relation between them.')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user')
            ->addArgument('role', InputArgument::REQUIRED, 'The role to relate with the user');
    }

    /**
     * The command takes 2 values, the username and the role, and creates a relation between them, checking if the role and the user exist.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $username = $input->getArgument('username');
        $role     = strtoupper($input->getArgument('role'));

        $role = $this->manager->getRepository(Role::class)->findOneBy(['role' => $role]);
        $user = $this->manager->getRepository(User::class)->findOneBy(['username' => $username]);

        if (!$role) {
            $output->writeln('Role not found');
            return Command::FAILURE;
        }

        if (!$user) {
            $output->writeln('User not found');
            return Command::FAILURE;
        }

        $role->addUser($user);
        $user->addUserRole($role);
        $this->manager->flush();

        $output->writeln('User successfully generated!');
        return Command::SUCCESS;
    }
}
