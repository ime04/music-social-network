<?php

namespace MusicProject\Profile\User\Infrastructure\Config;

use MusicProject\Profile\User\Infrastructure\Controllers\RegisterUserAction;
use MusicProject\Core\Infrastructure\Routes\CreateRoute;
use Psr\Container\ContainerInterface;

return [
    'userRegister' => [
        'name' => 'user-register',
        'route' => function (ContainerInterface $container) {
            return $container->call(CreateRoute::class, ['/user/register', RegisterUserAction::class, ['POST']]);
        }
    ]
];