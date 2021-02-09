<?php

namespace MusicProject\Profile\User\Application;

use MusicProject\Profile\User\Domain\Services\RegisterUser as RegisterUserDomainService;
use MusicProject\Profile\User\Domain\UserFactory;
use MusicProject\Shared\Application\RequestDTO;

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
    //TODO como parametro de entrada de __invoke va a recibir un object RequestDTO
    public function __invoke(RequestDTO $request) : void
    {
        $user = $this->userFactory->fromArray($request);
        $this->registerUser->__invoke($user);
    }
}