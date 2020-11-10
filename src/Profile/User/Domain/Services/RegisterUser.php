<?php

namespace MusicProject\Profile\User\Domain\Services;

use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;

class RegisterUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
      $this->userRepository = $userRepository;  
    }

    public function __invoke(string $username, string $password, string $email) : void
    {
        $user = new User($username, $password, $email);
        $this->userRepository->insert($user);
    }
}