<?php

namespace Tests\Shared\ValueObjects\ID;

use PHPUnit\Framework\TestCase;
use MusicProject\Shared\ValueObjects\ID\ID;
use InvalidArgumentException;

class IDTest extends TestCase
{

    /** @test */
    public function success() : void
    {
        $validIDs = [1, 1000];

        foreach ($validIDs as $validID) {
            self::assertInstanceOf(ID::class, new ID($validID));
        }
    }

    /** @test */
    public function invalidIDZero() : void
    {
        self::expectException(InvalidArgumentException::class);
        new ID(0);
    }

    /** @test */
    public function invalidIDNegative() : void
    {
        self::expectException(InvalidArgumentException::class);
        new ID(-5);
    }
}