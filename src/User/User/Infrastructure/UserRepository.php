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
        $query = $this->genericBuilder->insert()
            ->setTable('users')
            ->setValues([
                'username' => $username,
                'email'    => $email,
                'password' => $password,
            ]);
        echo $sql = $this->genericBuilder->writeFormatted($query);
        echo "\n ############ \n ############## \n";
        echo $this->genericBuilder->getValues();
        $this->pdo->query(
            $this->genericBuilder->insert()
                ->setTable('users')
                ->setValues([
                    'username' => $username,
                    'email'    => $email,
                    'password' => $password,
                ])
        );
    }

}