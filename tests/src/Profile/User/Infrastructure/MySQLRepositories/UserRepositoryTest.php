<?php

namespace Tests\src\Profile\User\Infrastructure\MySQLRepositories;

use DI\Container;
use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private UserRepository $userRepository;
    private int $lastInsertID;

    public function setUp()
    {
        $this->userRepository = (new Container())->get(UserRepository::class);
    }

    public function tearDown()
    {
        $this->userRepository->deleteByID($this->lastInsertID);
    }

    /** @test */
    public function register() : void
    {
        $this->userRepository->insert(new User('Victor', 'test', 'victor@gmial.com'));
        $this->lastInsertID = $this->userRepository->getLastInsertID();
    }

    /** @test */
    public function getByUsername() : void
    {
        $this->userRepository->insert(new User('Victor', 'test', 'victor@gmial.com'));
        $this->lastInsertID = $this->userRepository->getLastInsertID();
        $this->userRepository->getByUsername('Victor');
    }
}