<?php

namespace MusicProject\Core\Infrastructure\MySQL;

use PDO;
use PDOException;

class BaseMySQL
{
    protected PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=MusicSocialNetWork', 'victor', '=PM~U.MfJvg%k2L}');
        } catch(PDOException $ex){
            die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
        }
    }
}