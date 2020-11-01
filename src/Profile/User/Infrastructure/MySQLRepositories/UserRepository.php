<?php

namespace MusicProject\Profile\User\Infrastructure\MySQLRepositories;

use MusicProject\Core\Infrastructure\MySQL\BaseMySQL;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;

class UserRepository extends BaseMySQL implements UserRepositoryInterface
{

    public function insert(string $userName, string $email, string $password) : void
    {
        $users = $this->builderMySQL->table('users');
        $users->insert(
            [
                ['username' => $userName, 'email' => $email, 'password' => $password]
            ]
        )->execute();
    }

}