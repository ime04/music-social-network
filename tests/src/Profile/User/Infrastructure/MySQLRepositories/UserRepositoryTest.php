<?php

namespace Tests\src\Profile\User\Infrastructure\MySQLRepositories;

use DI\Container;
use MusicProject\Profile\User\Domain\User;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
use MusicProject\Shared\ValueObjects\Email\Email;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private const USERNAME = 'Victor';
    private const PASSWORD = 'test';
    private const EMAIL = 'victor@gmial.com';

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
        $this->userRepository->insert(new User(
            new Username('Victor'),
            new Password('zK3pWUZO'),
            new Email('victor@gmial.com')));
        $this->lastInsertID = $this->userRepository->getLastInsertID();
        self::assertIsInt($this->lastInsertID);
    }

    /** @test */
    public function getByUsername() : void
    {
        $this->userRepository->insert(new User(self::USERNAME, self::PASSWORD, self::EMAIL));
        $this->lastInsertID = $this->userRepository->getLastInsertID();
        $user = $this->userRepository->getByUsername('Victor');
        self::assertEquals(self::USERNAME, $user->username());
        self::assertEquals(self::PASSWORD, $user->password());
        self::assertEquals(self::EMAIL, $user->email());
    }
}