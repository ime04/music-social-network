<?php

namespace MusicProject\Shared\Infrastructure\Definitions;

use MusicProject\Profile\Config\ProfileEventsSubscribers;
use Psr\Container\ContainerInterface;

class EventSubscribers
{
    private ContainerInterface $container;

    public function __construct(
        ContainerInterface $container
    ) {
        $this->container = $container;
    }

    public function __invoke() : array
    {
        return array_merge(
            $this->container->call(ProfileEventsSubscribers::class)
        );
    }
}