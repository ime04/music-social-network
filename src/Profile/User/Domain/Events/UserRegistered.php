<?php

namespace MusicProject\Profile\User\Domain\Events;

use MusicProject\Profile\User\Domain\User;
use MusicProject\Shared\Domain\Events\DomainEvent;

class UserRegistered extends DomainEvent
{
    private int $id;
    private string $userName;
    private string $email;

    public function __construct(
        User $user,
        string $eventID = null,
        string $occurredOn = null
    ) {
        $this->id = $user->id()->value();
        $this->userName = $user->userName()->value();
        $this->email = $user->email()->value();
    }
    public function id() : int
    {
        return $this->id;
    }

    public function userName() : string
    {
        return $this->userName;
    }

    public function email() : string
    {
        return $this->email;
    }

    public static function eventName() : string
    {
        return 'profile.user.1.register';
    }
}