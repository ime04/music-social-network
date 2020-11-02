<?php

namespace Tests\Infrastructure\Profile\User\Infrastructure;

use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    /** @test */
    public function register() : void
    {
        $userRepository = new UserRepository();
        $userRepository->insert(new User('Victor', 'test', 'victor@gmial.com'));
    }
}