<?php

namespace Tests\src\Profile\User\Infrastructure\MySQLRepositories;

use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private int $lastInsertID; 

    public function tearDown()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteByID($this->lastInsertID);
    }

    /** @test */
    public function register() : void
    {
        $userRepository = new UserRepository();
        $userRepository->insert(new User('Victor', 'test', 'victor@gmial.com'));
        $this->lastInsertID = $userRepository->getLastInsertID();
    }
}