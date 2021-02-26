<?php

namespace MusicProject\Shared\Infrastructure\DTO;

class DTO
{
    private array $object;

    public function __construct(array $object)
    {
        $this->object = $object;
       // $this->setProperties($object);
    }

    public function getProperty(string $property)
    {
        return $this->object->$property;
    }

    public function getData() : array
    {
        return $this->object;
    }

    private function setProperties(array $object) : void
    {
        foreach ($object as $propertyName => $propertyValue) {
            $this->object->$propertyName = $propertyValue;
        }
    }

}