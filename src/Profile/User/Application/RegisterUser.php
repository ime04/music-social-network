<?php

namespace MusicProject\Profile\User\Application;

use MusicProject\Profile\User\Domain\Services\RegisterUser as RegisterUserDomainService;

class RegisterUser
{
    private RegisterUserDomainService $registerUser;

    public function __construct(
        RegisterUserDomainService $registerUser
    ) {
        $this->registerUser = $registerUser;
    }

    //recibe los valores primitivos del controlador, crea los value objects y la entidad (ej: User)
    public function __invoke(array $request) : void
    {
        $this->registerUser->__invoke(
            $request['username'],
            $request['password'],
            $request['email']
        );
    }
}