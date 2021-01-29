<?php

namespace MusicProject\Profile\User\Application;

use MusicProject\Profile\User\Domain\Services\RegisterUser as RegisterUserDomainService;
use MusicProject\Profile\User\Domain\UserFactory;

class RegisterUser
{
    private RegisterUserDomainService $registerUser;
    private UserFactory $userFactory;

    public function __construct(
        RegisterUserDomainService $registerUser,
        UserFactory $userFactory
    ) {
        $this->registerUser = $registerUser;
        $this->userFactory = $userFactory;
    }

    //recibe los valores primitivos del controlador, crea los value objects y la entidad (ej: User)
    public function __invoke(array $request): void
    {
        $user = $this->userFactory->fromArray($request);
        $this->registerUser->__invoke($user);
    }
}