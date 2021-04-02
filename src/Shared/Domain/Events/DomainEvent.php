<?php

namespace MusicProject\Shared\Domain\Events;

abstract class DomainEvent
{
    abstract public static function eventName() : string;
}