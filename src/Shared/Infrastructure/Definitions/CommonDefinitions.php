<?php

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Shared\Infrastructure\Events\InMemoryEventBus;

return [
    Request::class => Request::createFromGlobals(),
    InMemoryEventBus::class => new InMemoryEventBus(
        (new EventsListeners())->__invoke()
    )
];