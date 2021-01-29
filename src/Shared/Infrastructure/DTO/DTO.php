<?php

namespace MusicProject\Shared\Application;

class DTO
{
    private array $object;

    public function __construct(array $object)
    {
        $this->object = $object;
    }

    public function getProperty(string $property)
    {
        return $this->object->$property;
    }

    public function getData() : array
    {
        return $this->object;
    }

}