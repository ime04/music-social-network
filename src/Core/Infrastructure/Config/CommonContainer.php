<?php

namespace MusicProject\Core\Infrastructure\Config;

use DI\Container;
use DI\ContainerBuilder;

class CommonContainer extends ContainerBuilder
{
    public function __construct(string $containerClass = Container::class)
    {
        parent::__construct($containerClass);
    }
}