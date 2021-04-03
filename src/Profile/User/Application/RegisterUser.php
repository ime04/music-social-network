<?php

namespace MusicProject\Profile\User\Application;

use MusicProject\Profile\User\Domain\Events\UserRegistered;
use MusicProject\Profile\User\Domain\Services\RegisterUser as RegisterUserDomainService;
use MusicProject\Profile\User\Domain\UserFactory;
use MusicProject\Shared\Domain\Events\EventBus;
use MusicProject\Shared\Infrastructure\DTO\RequestDTO;

class RegisterUser
{
    private RegisterUserDomainService $registerUser;
    private UserFactory $userFactory;
    private EventBus $eventBus;

    public function __construct(
        RegisterUserDomainService $registerUser,
        UserFactory $userFactory,
        EventBus $eventBus
    ) {
        $this->registerUser = $registerUser;
        $this->userFactory = $userFactory;
        $this->eventBus = $eventBus;
    }

    public function __invoke(RequestDTO $request) : void
    {
        $user = $this->registerUser->__invoke(
            $this->userFactory->fromArray($request->getData())
        );
        $this->eventBus->publish(
            new UserRegistered(
                $user->id()->value(),
                $user->userName()->value(),
                $user->email()->value()
            )
        );
    }
}