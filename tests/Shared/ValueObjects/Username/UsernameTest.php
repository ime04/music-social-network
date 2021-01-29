<?php

use PHPUnit\Framework\TestCase;
use \MusicProject\Shared\ValueObjects\Username\Username;

class UsernameTest extends TestCase
{
    /** @test */
    public function success() : void
    {
        $validUsernames = ['Victoraso3', '01999284'];

        foreach ($validUsernames as $validUsername) {
            self::assertInstanceOf(Username::class, new Username($validUsername));
        }
    }

    /** @test */
    public function noLongerUsername() : void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Username is too short');
        new Username('Vc');
    }

    /** @test */
    public function symbolsUsername() : void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Username contains symbols');
        new Username('Victor$/');
    }
}