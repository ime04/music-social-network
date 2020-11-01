<?php

namespace MusicProject\Core\Infrastructure\MySQL;

use PDO;
use PDOException;
use ClanCats\Hydrahon\Builder;
use ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class BaseMySQL
{
    protected Builder $builderMySQL;

    public function __construct()
    {
        try {
            $connection = new PDO('mysql:host=localhost;dbname=MusicSocialNetWork', 'victor', '=PM~U.MfJvg%k2L}');
            $this->builderMySQL = new Builder('mysql', function($query, $queryString, $queryParameters) use($connection)
            {
                $statement = $connection->prepare($queryString);
                $statement->execute($queryParameters);
                if ($query instanceof FetchableInterface)
                {
                    return $statement->fetchAll(PDO::FETCH_ASSOC);
                }
            });
        } catch(PDOException $ex){
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }
    }
}