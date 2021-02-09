<?php

namespace MusicProject\Profile\User\Infrastructure\MySQLRepositories;

use MusicProject\Shared\Infrastructure\MySQL\BaseMySQL;
use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;

class UserRepository extends BaseMySQL implements UserRepositoryInterface
{
    private const TABLE = 'users';

    public function insert(User $user) : void
    {
        $users = $this->builderMySQL->table(self::TABLE);
        $users->insert(
            [
                [
                    'username' => $user->userName()->value(),
                    'email' => $user->email()->value(),
                    'password' => $user->password()->value()
                ]
            ]
        )->execute();
    }

    public function deleteByID(int $id) : void
    {
        $users = $this->builderMySQL->table(self::TABLE);
        $users->delete()->where('id', $id)->execute();
    }

    public function getByUsername(string $username) : User
    {
        $users = $this->builderMySQL->table(self::TABLE);
        return $this->buildEntity(
            $this->getFactory(),
            $users->select()->where('username', $username)->get()
        );
    }

    public function getLastInsertID() : int
    {
        return $this->connection->lastInsertId();
    }

    public function getFactory()
    {
        return self::ENTITY_FACTORY;
    }
}