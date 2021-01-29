<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\Domain\Entity\EntityFactoryInterface;
use MusicProject\Shared\ValueObjects\Email\Email;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;

class UserFactory implements EntityFactoryInterface
{
    public function fromArray(array $data) : User
    {
        return new User(
            new Username($data['username']),
            new Password($data['password']),
            new Email($data['email'])
        );
    }
}