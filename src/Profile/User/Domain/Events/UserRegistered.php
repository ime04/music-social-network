<?php

namespace MusicProject\Profile\User\Domain\Events;

use MusicProject\Shared\Domain\Events\DomainEvent;

class UserRegistered extends DomainEvent
{
    private string $userName;
    private string $email;

    public function __construct(
        int $userID,
        string $userName,
        string $email,
        string $eventID = null,
        string $occurredOn = null
    ) {
        parent::__construct($userID, $eventID, $occurredOn);
        $this->userName = $userName;
        $this->email = $email;
    }

    public function toPrimitives() : array
    {
        return [
            'userName' => $this->userName,
            'email' => $this->email
        ];
    }

    public static function fromPrimitives(
        int $userID,
        array $body,
        string $eventID,
        string $occurredOn
    ) : DomainEvent {
        return new self($userID, $body['userName'], $body['email'], $eventID, $occurredOn);
    }

    public static function eventName() : string
    {
        return 'profile.user.1.register';
    }
}