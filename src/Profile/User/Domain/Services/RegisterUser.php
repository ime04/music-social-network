<?php

namespace MusicProject\Profile\User\Domain\Services;

use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;
use MusicProject\Shared\ValueObjects\ID\ID;

class RegisterUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
      $this->userRepository = $userRepository;  
    }

    public function __invoke(User $user) : User
    {
        $this->userRepository->insert($user);
        $user->setID(new ID($this->userRepository->getLastInsertID()));
        return $user;
    }
}