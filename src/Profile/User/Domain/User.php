<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityBase;

class User extends EntityBase
{
    private string $userName;
    private string $password;
    private string $email;

    public function __construct(string $userName, string $password, string $email)
    {
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
    }

    public function userName() : string
    {
        return $this->userName;
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
