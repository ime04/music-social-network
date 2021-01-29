<?php

namespace MusicProject\Shared\Infrastructure\Services;

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use DI\Container;

class InitContainer
{
    private ContainerInterface $container;

    public function __construct()
    {
        $containerBuilder = new ContainerBuilder(Container::class);
        $containerBuilder->addDefinitions($this->getDefinitions());
        $containerBuilder->useAutowiring(true);
        $this->container = $containerBuilder->build();
    }

    public function get() : ContainerInterface
    {
        return $this->container;
    }

    private function getDefinitions() : array
    {
        return include(__DIR__ . '/../Definitions/Definitions.php');
    }
}