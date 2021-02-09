<?php

namespace MusicProject\Shared\Domain\Entity;

abstract class EntityBase
{
    protected function setOptionalFields(EntityData $entityData)
    {
        foreach ($entityData->getData() as $property => $value) {
            $this->$property = $value;
        }
    }
}