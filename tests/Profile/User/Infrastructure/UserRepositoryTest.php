<?php

namespace Tests\Profile\User\Infrastructure;

use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
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