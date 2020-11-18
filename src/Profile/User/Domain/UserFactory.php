<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\EntityInterface;

class UserFactory implements EntityInterface
{
    public function fromArray(array $data) : User
    {
    }
}