<?php

namespace MusicProject\Core\Infrastructure\MySQL;

use PDO;

class BaseMySQL
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=MusicSocialNetWork', 'victor', '=PM~U.MfJvg%k2L}');
    }
}