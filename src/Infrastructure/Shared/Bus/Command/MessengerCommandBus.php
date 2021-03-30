<?php

namespace App\Infrastructure\Shared\Bus\Command;

use App\Application\Shared\Command\CommandInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Application\Shared\Command\CommandBusInterface;

final class MessengerCommandBus implements CommandBusInterface
{
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function handle(CommandInterface $command)
    {
        $this->messageBus->dispatch($command);
    }
}
