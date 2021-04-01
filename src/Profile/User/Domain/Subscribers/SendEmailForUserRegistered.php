<?php

namespace MusicProject\Profile\User\Domain\Subscribers;

use MusicProject\Profile\User\Domain\Events\UserRegistered;
use MusicProject\Shared\Domain\Events\DomainEventSubscriber;

class SendEmailForUserRegistered implements DomainEventSubscriber
{

    public function __invoke(UserRegistered $event) : void
    {
        echo "listener: \n";
        var_dump($event);
        // TODO: send email for a new user
    }

    public static function subscribedTo(): array
    {
        return [UserRegistered::class];
    }
}