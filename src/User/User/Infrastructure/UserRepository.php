<?php

namespace MusicProject\User\User\Infrastructure;

use MusicProject\Core\Infrastructure\MySQL\BaseMySQL;
use MusicProject\User\User\Domain\UserRepositoryInterface;
use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;

class UserRepository extends BaseMySQL implements UserRepositoryInterface
{
    private GenericBuilder $genericBuilder;

    public function __construct()
    {
        $this->genericBuilder = new GenericBuilder();
        parent::__construct();
    }

    public function insert($username = 'test', $email = 'test', $password = 'test'): void
    {
        $this->pdo->query(
            'insert into users (username, password, email) values ("test", "test", "test")'
        );
    }

}