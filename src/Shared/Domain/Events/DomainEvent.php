<?php

namespace MusicProject\Shared\Domain\Events;

use MusicProject\Shared\ValueObjects\UnixTime\UnixTime;
use MusicProject\Shared\ValueObjects\Uuid\Uuid;

abstract class DomainEvent
{
    private string $aggregateID;
    private string $eventID;
    private string $occurredOn;

    public function __construct(string $aggregateID, string $eventID = null, string $occurredOn = null)
    {
        $this->aggregateID = $aggregateID;
        $this->eventID = $eventID ?? Uuid::generateRandomUuid()->value();
        $this->occurredOn = $occurredOn ?? UnixTime::currentTime()->value();
    }

    public function aggregateID() : string
    {
        return $this->aggregateID;
    }

    public function eventID() : string
    {
        return $this->eventID;
    }

    public function occurredOn() : string
    {
        return $this->occurredOn;
    }

    abstract public static function eventName() : string;

    abstract public function toPrimitives() : array;
}