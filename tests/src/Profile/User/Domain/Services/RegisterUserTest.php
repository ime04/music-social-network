<?php

namespace Tests\src\Profile\User\Domain\Services;

use MusicProject\Profile\User\Domain\Services\RegisterUser;
use MusicProject\Profile\User\Domain\User;
use MusicProject\Shared\Infrastructure\Services\InitContainer;
use MusicProject\Shared\ValueObjects\Email\Email;
use MusicProject\Shared\ValueObjects\Password\Password;
use MusicProject\Shared\ValueObjects\Username\Username;
use PHPUnit\Framework\TestCase;

class RegisterUserTest extends TestCase
{
    /** @test */
    public function success()
    {
        $container = (new InitContainer())->get();
        $registerUser = $container->get(RegisterUser::class);
        $registerUser->__invoke(new User(
            new Username('victor'),
            new Password('asd34FFF__'),
            new Email('test@test.com')
        ));
    }
}