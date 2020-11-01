<?php

namespace MusicProject\Profile\User\Infrastructure\Config;

use MusicProject\Profile\User\Infrastructure\Controllers\RegisterUserAction;
use MusicProject\Core\Infrastructure\Routes\CreateRoute;

return [
    'userRegister' => [
        'name' => 'user-register',
        'route' => (new CreateRoute())->__invoke('/user/register', RegisterUserAction::class, ['POST'])
    ]
];