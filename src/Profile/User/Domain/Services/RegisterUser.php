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

    //siempre funciona con value objects o entidades (ej User)
    public function __invoke(User $user) : void
    {
        $this->userRepository->insert($user);
    }
}