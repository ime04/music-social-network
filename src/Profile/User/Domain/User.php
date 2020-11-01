<?php

namespace MusicProject\Profile\User\Domain;

class User
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
}
