<?php

namespace MusicProject\Profile\User\Infrastructure\MySQLRepositories;

use MusicProject\Core\Infrastructure\MySQL\BaseMySQL;
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

}