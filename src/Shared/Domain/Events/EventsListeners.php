<?php

class EventsListeners
{

    public function __invoke() : array
    {
        return array_merge(
            include_once(__DIR__ . '../../../Profile/Config/EventsListeners.php')
        );
    }
}