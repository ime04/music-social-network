<?php

use MusicProject\Profile\User\Domain\UserRepositoryInterface;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
use function DI\autowire;

return [
    UserRepositoryInterface::class => autowire(UserRepository::class)
];