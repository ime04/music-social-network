<?php

namespace Tests\Shared\ValueObjects\Email;

use PHPUnit\Framework\TestCase;
use MusicProject\Shared\ValueObjects\Email\Email;
use InvalidArgumentException;

class EmailTest extends TestCase
{
    /** @test **/
    public function success() : void
    {
        self::assertInstanceOf(EmailTest::class, new EmailTest("victor@gmail.com"));
    }

    /** @test **/
    public function emailFailed() : void
    {
        self::expectException(InvalidArgumentException::class);
        new Email("victor.com");
    }
}