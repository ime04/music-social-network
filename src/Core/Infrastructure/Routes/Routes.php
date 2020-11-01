<?php

namespace MusicProject\Core\Infrastructure\Routes;

use Symfony\Component\Routing\Route;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;
use Symfony\Component\Routing\RouteCollection;

class Routes {

    public function __invoke() : RouteCollection
    {
        $userRegisterRoute = new Route(
            '/user/register',
            array('controller' => RegisterUserAction::class)
        );
        $routes = new RouteCollection();
        $routes->add('user_register', $userRegisterRoute);
        return $routes;
    }
}