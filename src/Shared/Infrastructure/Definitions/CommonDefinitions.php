<?php

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Shared\Infrastructure\Events\InMemoryEventBus;
use MusicProject\Shared\Infrastructure\Definitions\EventSubscribers;
use MusicProject\Shared\Domain\Events\EventBus;

return [
    Request::class => Request::createFromGlobals(),
    EventBus::class => new InMemoryEventBus(
        $container->call(EventSubscribers::class)
    )
];