<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityBase;
use MusicProject\Shared\ValueObjects\Email\Email;
use MusicProject\Shared\ValueObjects\ID\ID;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;

class User extends EntityBase
{
    protected ID $id;
    protected Username $username;
    protected Password $password;
    protected Email $email;

    public function __construct(Username $username, UserData $userData)
    {
        $this->username = $username;
        $this->setOptionalFields($userData);
    }

    public function id() : ID
    {
        return $this->id;
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

    public function setID(ID $id) : void
    {
        $this->id = $id;
    }
}
