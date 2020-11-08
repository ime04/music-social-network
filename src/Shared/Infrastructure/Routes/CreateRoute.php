<?php

namespace MusicProject\Shared\Infrastructure\Routes;

use Symfony\Component\Routing\Route;

class CreateRoute
{
    public function __invoke(string $path, string $className, array $method) : Route
    {
        $userRegisterRoute = new Route(
            $path,
            array('controller' => $className)
        );
        $userRegisterRoute->setMethods($method);
        return $userRegisterRoute;
    }
}