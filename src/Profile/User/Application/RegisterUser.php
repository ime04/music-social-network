<?php

namespace MusicProject\Profile\User\Application;

use MusicProject\Profile\User\Domain\Services\RegisterUser as RegisterUserDomainService;
use MusicProject\Profile\User\Domain\UserFactory;
use MusicProject\Shared\Infrastructure\DTO\RequestDTO;

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

    public function __invoke(RequestDTO $request) : void
    {
        $user = $this->userFactory->fromArray($request->getData());
        $this->registerUser->__invoke($user);
    }
}