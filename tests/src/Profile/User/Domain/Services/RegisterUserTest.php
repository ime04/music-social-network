<?php

namespace Tests\src\Profile\User\Domain\Services;

use MusicProject\Profile\User\Domain\Services\RegisterUser;
use MusicProject\Shared\Infrastructure\Services\InitContainer;
use PHPUnit\Framework\TestCase;

class RegisterUserTest extends TestCase
{
    /** @test */
    public function success()
    {
        $container = (new InitContainer())->get();
        $registerUser = $container->get(RegisterUser::class);
        $registerUser->__invoke('test', 'test', 'test');
    }
}