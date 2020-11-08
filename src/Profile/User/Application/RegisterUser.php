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

    public function __invoke(array $request) : void
    {
        return $this->registerUser->__invoke(
            $request['username'],
            $request['password'],
            $request['email']
        );
    }
}