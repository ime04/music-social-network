<?php

namespace MusicProject\Profile\User\Domain\Services;

use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;

class RegisterUser
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
      $this->userRepository = $userRepository;  
    }

    public function __invoke(string $username, string $password, string $email) : void
    {
        $user = new User($username, $password, $email);
        $this->userRepository->insert($user);
    }
}