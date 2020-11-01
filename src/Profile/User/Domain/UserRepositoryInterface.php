<?php

namespace MusicProject\Profile\User\Domain;

interface UserRepositoryInterface
{
    public function insert(string $userName, string $email, string $password) : void;
}