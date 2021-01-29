<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityBase;
use MusicProject\Shared\ValueObjects\Email\Email;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;

class User extends EntityBase
{
    private Username $username;
    private Password $password;
    private Email $email;

    public function __construct(Username $username, Password $password, Email $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function userName() : Username
    {
        return $this->username;
    }

    public function password() : Password
    {
        return $this->password;
    }

    public function email() : Email
    {
        return $this->email;
    }
}
