<?php

namespace App\Application\User\Command\SignUp;

use Ramsey\Uuid\Uuid;
use App\Application\Shared\Command\CommandInterface;

final class SignUpCommand implements CommandInterface
{
    public $uuid;
    public $email;
    public $plainPassword;

    public function __construct(string $uuid, string $email, string $plainPassword)
    {
        $this->uuid = Uuid::fromString($uuid);
        $this->email = $email;
        $this->plainPassword = $plainPassword;
    }
}
