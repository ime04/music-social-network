<?php

namespace MusicProject\Shared\Domain\Events;

interface EventBus
{
    public function publish() : void;
}