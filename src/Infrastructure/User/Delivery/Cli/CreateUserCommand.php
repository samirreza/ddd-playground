<?php

namespace App\Infrastructure\User\Delivery\Cli;

use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Application\User\Command\SignUp\SignUpCommand;
use App\Application\Shared\Command\CommandBusInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'user:create';
    protected static $defaultDescription = 'Create new user by email and password';

    private $commandBus;

    public function __construct(CommandBusInterface $commandBus)
    {
        parent::__construct();

        $this->commandBus = $commandBus;
    }

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('email', InputArgument::REQUIRED, 'User email')
            ->addArgument('password', InputArgument::REQUIRED, 'User password');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');

        $command = new SignUpCommand(
            Uuid::uuid4()->toString(),
            $email,
            $password
        );

        $this->commandBus->handle($command);

        return Command::SUCCESS;
    }
}
