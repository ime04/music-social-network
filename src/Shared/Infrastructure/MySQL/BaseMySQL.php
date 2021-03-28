<?php

namespace MusicProject\Shared\Infrastructure\MySQL;

use MusicProject\Shared\Domain\Entity\EntityBase;
use PDO;
use PDOException;
use ClanCats\Hydrahon\Builder;
use ClanCats\Hydrahon\Query\Sql\FetchableInterface;
use Psr\Container\ContainerInterface;

abstract class BaseMySQL
{
    private const HOST = 'localhost';
    private const DATABASE = 'MusicSocialNetwork';
    private const USERNAME = 'victor';
    private const PASSWORD = '=PM~U.MfJvg%k2L}';

    private ContainerInterface $container;
    protected PDO $connection;
    protected Builder $builderMySQL;

    public function __construct(
        ContainerInterface $container
    ) {
        $this->container = $container;
        $this->getConnection();
    }

    private function getConnection()
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
    protected function buildEntity(string $factoryClass, array $result) : EntityBase
    {
        $factory = $this->container->get($factoryClass);
        if (empty($result[0])) {
            throw new EmptyResult('Register not found');
        }
        return $factory->fromArray($result[0]);
    }
}