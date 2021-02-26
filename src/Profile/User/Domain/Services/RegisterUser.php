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

    public function __invoke(User $user) : void
    {
        //TODO chequear que el usuario no existe con username unico
        $this->userRepository->insert($user);
    }
}