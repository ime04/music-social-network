<?php

namespace MusicProject\Core\Infrastructure\Config;

use DI\Container;
use DI\ContainerBuilder;

class CommonContainerBuilder extends ContainerBuilder
{
    public function __construct(string $containerClass = Container::class)
    {
        parent::__construct($containerClass);
        $this->useAnnotations(false);
        $this->addDefinitions(__DIR__ . '../Routes/Routes.php');
    }
}
