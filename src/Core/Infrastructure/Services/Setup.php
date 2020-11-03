<?php

namespace MusicProject\Core\Infrastructure\Services;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use DI\Container;
use Symfony\Component\HttpFoundation\Request;

class Setup
{
    private ContainerInterface $container;

    public function __construct()
    {
        $containerBuilder = new ContainerBuilder(Container::class);
        $containerBuilder->addDefinitions($this->getDefinition());
    }

    public function getContainer() : ContainerInterface
    {
        return $this->container;
    }

    private function getDefinition() : array
    {
        return [
            Request::class => Request::createFromGlobals()
        ];
    }
}