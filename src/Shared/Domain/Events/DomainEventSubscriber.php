<?php

namespace MusicProject\Shared\Domain\Events;

interface DomainEventSubscriber
{
    public static function subscribedTo() : array ;
}