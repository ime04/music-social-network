<?php

namespace MusicProject\Shared\Infrastructure\Services;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use DI\Container;
use Symfony\Component\HttpFoundation\Request;

class InitContainer
{
    private ContainerInterface $container;

    public function __construct()
    {
        $containerBuilder = new ContainerBuilder(Container::class);
        $containerBuilder->addDefinitions($this->getDefinitions());
        $this->container = $containerBuilder->build();
    }

    public function get() : ContainerInterface
    {
        return $this->container;
    }

    private function getDefinitions() : array
    {
        //TODO mover a otro sitio
        return [
            Request::class => Request::createFromGlobals()
        ];
    }
}