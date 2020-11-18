<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityBase;

class User extends EntityBase
{
    private string $username;
    private string $password;
    private string $email;

    public function __construct(string $username, string $password, string $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    public function userName() : string
    {
        return $this->username;
    }

    public function password() : string
    {
        return $this->password;
    }

    public function email() : string
    {
        return $this->email;
    }
}
