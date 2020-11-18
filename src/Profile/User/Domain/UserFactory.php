<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityFactoryInterface;

class UserFactory implements EntityFactoryInterface
{
    public function fromArray(array $data) : User
    {
        print_r($data);
    }
}