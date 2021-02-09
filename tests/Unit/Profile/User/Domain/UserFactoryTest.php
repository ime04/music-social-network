<?php

namespace Tests\Unit\Profile\User\Domain;

use MusicProject\Profile\User\Domain\UserFactory;
use MusicProject\Shared\Infrastructure\Services\InitContainer;
use PHPUnit\Framework\TestCase;

class UserFactoryTest extends TestCase
{
    private const USERNAME = 'test';
    private const PASSWORD = 'test1234DD@@';
    private const EMAIL = 'emailtest@test.com';
    private const ID = 1;

    /** @test */
    public function success() : void
    {
        $container = (new InitContainer())->get();
        $userFactory = $container->get(UserFactory::class);
        $user = $userFactory->fromArray([
            'username' => self::USERNAME,
            'password' => self::PASSWORD,
            'email' => self::EMAIL,
            'id' => self::ID
        ]);
        self::assertEquals(self::USERNAME, $user->userName()->value());
        self::assertEquals(self::PASSWORD, $user->password()->value());
        self::assertEquals(self::EMAIL, $user->email()->value());
        self::assertEquals(self::ID, $user->id()->value());
    }

    /** @test */
    public function invalidFieldForThisEntity() : void
    {
        self::expectException(\InvalidArgumentException::class);
        $container = (new InitContainer())->get();
        $userFactory = $container->get(UserFactory::class);
        $userFactory->fromArray([
            'username' => self::USERNAME,
            'contrasena' => self::PASSWORD,
            'email' => self::EMAIL,
            'id' => self::ID
        ]);
    }
}