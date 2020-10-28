<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('user-register', new Routing\Route('/user/register', ['name' => 'World']));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;