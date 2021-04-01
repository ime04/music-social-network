<?php

namespace MusicProject\Profile\Config;

use MusicProject\Profile\User\Infrastructure\Controllers\LoginUserAction;
use MusicProject\Profile\User\Infrastructure\Controllers\RegisterUserAction;
use MusicProject\Shared\Infrastructure\Routes\CreateRoute;

return [
    'userRegister' => [
        'name' => 'user-register',
        'route' => (new CreateRoute())->__invoke('/user/register', RegisterUserAction::class, ['POST'])
    ],
    'userLogin' => [
        'name' => 'user-login',
        'route' => (new CreateRoute())->__invoke('/user/login', LoginUserAction::class, ['GET'])
    ]
];