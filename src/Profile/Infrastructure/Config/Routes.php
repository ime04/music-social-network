<?php

namespace MusicProject\Profile\User\Infrastructure\Config;

use MusicProject\Profile\User\Infrastructure\Controllers\RegisterUserAction;
use Symfony\Component\Routing\Route;

return [
    'userRegister' => [
        'name' => 'user-register',
        'route' => function() {
            $userRegisterRoute = new Route(
                '/user/register',
                array('controller' => RegisterUserAction::class)
            );
            $userRegisterRoute->setMethods(['POST']);
            return $userRegisterRoute;
        }
    ]
];