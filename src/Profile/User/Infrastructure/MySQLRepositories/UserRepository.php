<?php

namespace MusicProject\Profile\User\Infrastructure\MySQLRepositories;

use MusicProject\Core\Infrastructure\MySQL\BaseMySQL;
use MusicProject\Profile\User\Domain\UserRepositoryInterface;

class UserRepository extends BaseMySQL implements UserRepositoryInterface
{

    public function insert($username = 'test', $email = 'test', $password = 'test'): void
    {
        $users = $this->h->table('users');
        $users->insert(
            [
                ['username' => $username, 'email' => $email, 'password' => $password]
            ]
        )->execute();
    }

}