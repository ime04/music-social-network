<?php

namespace MusicProject\Shared\Infrastructure\Routes;

class LoadRoutes
{
    public function __invoke() : array
    {
        return array_merge(
            include(__DIR__ . '/../../../Profile/Config/Routes.php')
        );
    }
}