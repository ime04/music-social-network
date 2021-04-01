<?php

namespace MusicProject\Shared\Infrastructure\Events;

use MusicProject\Shared\Domain\Events\DomainEvent;
use MusicProject\Shared\Domain\Events\EventBus;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class InMemoryEventBus implements EventBus
{
    private MessageBus $bus;

    public function __construct(iterable $subscribers)
    {
        var_dump($subscribers);
        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator($subscribers)
            ),
         ]);
    }
    public function notify(DomainEvent $event): void
    {
        $this->bus->dispatch($event);
    }

    public function publish(DomainEvent ...$events): void
    {
        try {
            foreach ($events as $event) {
                $this->notify($event);
            }
        } catch (NoHandlerForMessageException $exception) {

        }
    }
}