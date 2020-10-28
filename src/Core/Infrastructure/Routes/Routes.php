<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;

return function (RoutingConfigurator $routes) {
    $routes->add('register', '/user/register')
        // the controller value has the format [controller_class, method_name]
        ->controller([RegisterUserAction::class])
        ->methods(['POST'])

        // if the action is implemented as the __invoke() method of the
        // controller class, you can skip the 'method_name' part:
        // ->controller(BlogController::class)
    ;
};