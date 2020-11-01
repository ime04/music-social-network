<?php

namespace MusicProject\Core\Infrastructure\Services;

use MusicProject\Core\Infrastructure\Config\CommonContainer;
use Psr\Container\ContainerInterface;

class Setup
{
    private ContainerInterface $container;

    public function __construct(CommonContainer $containerBuilder)
    {
        $this->container = $containerBuilder->build();
    }

    public function getContainer() : ContainerInterface
    {
        return $this->container;
    }

}