<?php

namespace MusicProject\Profile\User\Domain;

use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;

interface UserRepositoryInterface
{
    public const ENTITY_FACTORY = UserFactory::class;

    public function insert(User $user) : void;

    public function deleteByID(int $id) : void;

    public function getByUsername(string $username) : User;

    public function getByUsernameAndPassword(Username $username, Password $password) : User;

    public function getLastInsertID() : int;
}