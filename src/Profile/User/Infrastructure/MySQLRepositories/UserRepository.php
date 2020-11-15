<?php

namespace MusicProject\Profile\User\Infrastructure\MySQLRepositories;

use MusicProject\Shared\Infrastructure\MySQL\BaseMySQL;
use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;

class UserRepository extends BaseMySQL implements UserRepositoryInterface
{

    public function insert(User $user) : void
    {
        $users = $this->builderMySQL->table('users');
        $users->insert(
            [
                ['username' => $user->userName(), 'email' => $user->email(), 'password' => $user->password()]
            ]
        )->execute();
    }

    public function deleteByID(int $id) : void
    {
        $users = $this->builderMySQL->table('users');
        $users->delete()->where('id', $id)->execute();
    }

    public function getLastInsertID() : int
    {
        return $this->connection->lastInsertId();
    }

}