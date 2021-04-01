<?php

namespace MusicProject\Profile\Config;

use MusicProject\Profile\User\Domain\Events\UserRegistered;
use MusicProject\Profile\User\Domain\Subscribers\SendEmailForUserRegistered;

class ProfileEventsSubscribers
{
    private SendEmailForUserRegistered $sendEmailForUserRegistered;

    public function __construct(
        SendEmailForUserRegistered $sendEmailForUserRegistered
    ) {
        $this->sendEmailForUserRegistered = $sendEmailForUserRegistered;
    }

    public function __invoke() : array
    {
        return [
            UserRegistered::class => [$this->sendEmailForUserRegistered]
        ];
    }
}