<?php

namespace MusicProject\Shared\Infrastructure\Routes;

use Symfony\Component\Routing\RouteCollection;

class Routes
{

    private LoadRoutes $loadRoutes;
    private RouteCollection $routes;

    public function __construct(
        LoadRoutes $loadRoutes
    ) {
        $this->loadRoutes = $loadRoutes;
        $this->routes = new RouteCollection();
    }

    public function __invoke() : RouteCollection
    {
        $loadRoutes = $this->loadRoutes->__invoke();
        return $this->addRoutes($loadRoutes);
    }

    private function addRoutes(array $routes) : RouteCollection
    {
        foreach ($routes as $route) {
            $this->routes->add($route['name'], $route['route']);
        }
        return $this->routes;
    }
}