<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityFactoryInterface;

class UserFactory implements EntityFactoryInterface
{
    public function fromArray(array $data) : User
    {
        return new User(
            //$data['id'],
            $data['username'],
            $data['password'],
            $data['email']
        );
    }
}