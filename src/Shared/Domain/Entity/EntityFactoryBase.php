<?php

namespace MusicProject\Shared\Domain\Entity;

abstract class EntityFactoryBase
{
    public function buildFieldsOptional(array $data) : array
    {
        $schema = $this->getSchema();
        $keys = $this->getKeys();
        $entityData = array();
        foreach ($data as $propertyName => $value) {
            if (isset($schema[$propertyName])) {
                if (! in_array($propertyName, $keys, true)) {
                    $entityData[$propertyName] = new $schema[$propertyName]($value);
                }
            }
        }
        return $entityData;
    }

    protected function getSchema() : array
    {
        return json_decode(
            file_get_contents($this->getSchemaPath()),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    protected function getKeys() : array
    {
        return json_decode(
            file_get_contents($this->getKeysPath()),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    abstract protected function getSchemaPath() : string;

    abstract protected function getKeysPath() : string;
}