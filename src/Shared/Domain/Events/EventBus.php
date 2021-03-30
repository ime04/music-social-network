<?php

namespace MusicProject\Shared\Domain\Events;

interface EventBus
{
    public function publish(DomainEvent ...$events) : void;
}