<?php

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Shared\Infrastructure\Events\InMemoryEventBus;
use MusicProject\Shared\Infrastructure\Definitions\EventSubscribers;

return [
    Request::class => Request::createFromGlobals(),
    InMemoryEventBus::class => new InMemoryEventBus(
        (new EventSubscribers())->__invoke()
    )
];