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

    abstract public static function eventName() : string;
}