<?php

use MusicProject\Profile\User\Domain\Events\UserRegistered;
use MusicProject\Profile\User\Domain\Subscribers\SendEmailForUserRegistered;

return [
    UserRegistered::class => [SendEmailForUserRegistered::class]
];