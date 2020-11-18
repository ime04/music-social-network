<?php

namespace MusicProject\Profile\User\Domain;

interface UserRepositoryInterface
{
    public const ENTITY_FACTORY = UserFactory::class;

    public function insert(User $user) : void;

    public function deleteByID(int $id) : void;

    public function getByUsername(string $username) : void;
}