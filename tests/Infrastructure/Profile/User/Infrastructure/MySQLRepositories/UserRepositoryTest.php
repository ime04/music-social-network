<?php

namespace Tests\Infrastructure\Profile\User\Infrastructure\MySQLRepositories;

use DI\Container;
use MusicProject\Profile\User\Domain\UserFactory;
use MusicProject\Profile\User\Infrastructure\MySQLRepositories\UserRepository;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    private const USERNAME = 'Victor';
    private const PASSWORD = 'test1234FF__';
    private const EMAIL = 'victor@gmial.com';

    private UserRepository $userRepository;
    private UserFactory $userFactory;
    private int $lastInsertID;

    public function setUp()
    {
        $this->userRepository = (new Container())->get(UserRepository::class);
        $this->userFactory = (new Container())->get(UserFactory::class);
    }

    public function tearDown()
    {
        $this->userRepository->deleteByID($this->lastInsertID);
    }

    /** @test */
    public function register() : void
    {
        $this->insertUser();
        self::assertIsInt($this->lastInsertID);
    }

    /** @test */
    public function getByUsername() : void
    {
        $this->userRepository->insert(
            $this->userFactory->fromArray([
                'username' => self::USERNAME,
                'password' => self::PASSWORD,
                'email' => self::EMAIL
            ])
        );
        $this->lastInsertID = $this->userRepository->getLastInsertID();
        $user = $this->userRepository->getByUsername(self::USERNAME);
        self::assertEquals(self::USERNAME, $user->userName()->value());
        self::assertEquals(self::PASSWORD, $user->password()->value());
        self::assertEquals(self::EMAIL, $user->email()->value());
    }

    /** @test */
    public function getByUsernameAndPassword() : void
    {
        $this->insertUser();
        $user = $this->userRepository->getByUsernameAndPassword(
            new Username(self::USERNAME),
            new Password(self::PASSWORD)
        );
        self::assertNotEmpty($user);
    }

    public function insertUser(): void
    {
        $this->userRepository->insert(
            $this->userFactory->fromArray([
                'username' => self::USERNAME,
                'password' => self::PASSWORD,
                'email' => self::EMAIL
            ])
        );
        $this->lastInsertID = $this->userRepository->getLastInsertID();
    }
}