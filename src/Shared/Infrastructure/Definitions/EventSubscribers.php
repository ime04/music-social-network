<?php

namespace MusicProject\Shared\Infrastructure\Definitions;

class EventSubscribers
{
    public function __invoke() : array
    {
        return array_merge(
            include_once(__DIR__ . '/../../../Profile/Config/ProfileEventsSubscribers.php')
        );
    }
}