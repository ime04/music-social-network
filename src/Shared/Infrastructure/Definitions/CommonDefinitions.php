<?php

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Shared\Infrastructure\Events\InMemoryEventBus;
use MusicProject\Shared\Infrastructure\Definitions\EventSubscribers;
use MusicProject\Shared\Domain\Events\EventBus;
use MusicProject\Shared\Infrastructure\Events\RabbitMQEventBus;
use function DI\autowire;

return [
    Request::class => Request::createFromGlobals(),
    /*EventBus::class => new InMemoryEventBus(
        (new \DI\Container())->call(EventSubscribers::class)
    )*/
    EventBus::class => autowire(RabbitMQEventBus::class)
];