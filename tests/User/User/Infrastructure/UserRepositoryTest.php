<?php

namespace User\User\Infrastructure;

use MusicProject\User\User\Infrastructure\MySQLRepositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /** @test */
    public function register()
    {
        $userRepository = new UserRepository();
        $userRepository->insert();
    }
}