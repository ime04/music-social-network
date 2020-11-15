<?php

namespace MusicProject\Profile\User\Domain;

interface UserRepositoryInterface
{
    public function insert(User $user) : void;

    public function deleteByID(int $id) : void;
}