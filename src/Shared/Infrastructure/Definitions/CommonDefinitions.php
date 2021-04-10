<?php

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Shared\Domain\Events\EventBus;
use MusicProject\Shared\Infrastructure\Events\RabbitMQEventBus;
use function DI\autowire;

return [
    Request::class => Request::createFromGlobals(),
    EventBus::class => autowire(RabbitMQEventBus::class)
];