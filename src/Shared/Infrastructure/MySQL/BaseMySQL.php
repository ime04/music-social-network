<?php

namespace MusicProject\Shared\Infrastructure\MySQL;

use PDO;
use PDOException;
use ClanCats\Hydrahon\Builder;
use ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class BaseMySQL
{
    private const HOST = 'localhost';
    private const DATABASE = 'MusicSocialNetWork';
    private const USERNAME = 'victor';
    private const PASSWORD = '=PM~U.MfJvg%k2L}';

    protected PDO $connection;
    protected Builder $builderMySQL;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                sprintf('mysql:host=%s;dbname=%s', self::HOST, self::DATABASE),
                self::USERNAME,
                self::PASSWORD
            );
            $this->builderMySQL = new Builder(
                'mysql',
                function($query, $queryString, $queryParameters) {
                    $statement = $this->connection->prepare($queryString);
                    $statement->execute($queryParameters);
                    if ($query instanceof FetchableInterface) {
                        return $statement->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
             );
        } catch(PDOException $ex){
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }
    }
}