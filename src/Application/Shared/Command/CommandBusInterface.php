<?php

namespace App\Application\Shared\Command;

interface CommandBusInterface
{
    public function handle(CommandInterface $command);
}

