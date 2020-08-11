<?php

namespace MusicProject\User\User\Domain\Services;

use MusicProject\User\User\Domain\User;

class RegisterUser
{
    public function __construct()
    {
        
    }

    public function __invoke(string $username, string $password, string $email)
    {
        $user = new User($username, $password, $email);
        //TODO insertar el usuario
    }
}