<?php

namespace MusicProject\Core\Infrastructure\Routes;

class LoadRoutes
{
    public function __invoke() : array
    {
        return array_merge(
            include(__DIR__ . '/../../../Profile/Infrastructure/Config/Routes.php')
        );
    }
}