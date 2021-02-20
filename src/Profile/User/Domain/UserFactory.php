<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityFactoryBase;
use MusicProject\Shared\Domain\Entity\EntityFactoryInterface;
use MusicProject\Shared\ValueObjects\Username\Username;

class UserFactory extends EntityFactoryBase implements EntityFactoryInterface
{
    public function fromArray(array $data) : User
    {
        return new User(
            new Username($data['username']),
            new UserData($this->buildFieldsOptional($data))
        );
    }

    protected function getSchemaPath(): string
    {
        return __DIR__ . '/schema.json';
    }

    protected function getKeysPath(): string
    {
        return __DIR__ . '/keys.json';
    }
}