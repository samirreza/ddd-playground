<?php

namespace App\Application\User\Command\SignUp;

use App\Application\Shared\Command\CommandHandlerInterface;

final class SignUpHandler implements CommandHandlerInterface
{
    public function __invoke(SignUpCommand $command)
    {
        dd($command);
    }
}
