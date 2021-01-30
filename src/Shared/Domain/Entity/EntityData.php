<?php

namespace MusicProject\Shared\Domain\Entity;

class EntityData
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData() : array
    {
        return $this->data;
    }
}