<?php

namespace MusicProject\Core\Infrastructure\MySQL;

use PDO;

class BaseMySQL
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=MusicSocialNetWork', 'victor', '=PM~U.MfJvg%k2L}');
    }
}