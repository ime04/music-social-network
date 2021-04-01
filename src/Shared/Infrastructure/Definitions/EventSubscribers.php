<?php

namespace MusicProject\Shared\Infrastructure\Definitions;

use MusicProject\Profile\User\Domain\Events\UserRegistered;
use MusicProject\Profile\User\Domain\Subscribers\SendEmailForUserRegistered;

class EventSubscribers
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
            UserRegistered::class => $this->sendEmailForUserRegistered
        ];
        /*return array_merge(
            include_once(__DIR__ . '/../../../Profile/Config/EventsSubscribers.php')
        );*/
    }
}