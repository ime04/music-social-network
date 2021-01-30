<?php

namespace Tests\Shared\ValueObjects\Password;

use PHPUnit\Framework\TestCase;
use MusicProject\Shared\ValueObjects\Password\Password;
use InvalidArgumentException;

class PasswordTest extends TestCase
{

    /** @test */
    public function success() : void
    {
        $validPasswords = ['zK9pWUZO', 'asd3DDDDAd2'];

        foreach ($validPasswords as $validPass) {
            self::assertInstanceOf(Password::class, new Password($validPass));
        }
    }

    /** @test */
    public function noLongerPass() : void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Password is too short');
        new Password('aSD34');
    }

    /** @test */
    public function noNumberPass() : void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Password must have at least 1 number');
        new Password('asdnfiadFDFSDF');
    }

    /** @test */
    public function noCapitalPass() : void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Password must have at least 1 capital letter');
        new Password('dkbfdkf22244bdsj');
    }

    /** @test */
    public function noLowerCasePass() : void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Password must have at least 1 lowercase letter');
        new Password('ASDNFGOGN5553234GF');
    }
}