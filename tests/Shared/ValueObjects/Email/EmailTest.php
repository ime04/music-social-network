<?php

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**@test**/
    public function success() : void
    {
        self::assertInstanceOf(EmailTest::class, new EmailTest("victor@gmail.com"));
    }

    /**@test**/
    public function emailFailed() : void
    {
        self::expectException(InvalidArgumentException::class);
        new Email("victor.com");    }
}