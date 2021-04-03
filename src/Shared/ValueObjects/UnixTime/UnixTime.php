<?php

namespace MusicProject\Shared\ValueObjects\UnixTime;

use MusicProject\Shared\ValueObjects\AbstractValueObject;

class UnixTime extends AbstractValueObject
{
    protected int $value;

    public function __construct($unixTime)
    {
        $this->validate($unixTime);
        $this->value = $unixTime;
    }

    protected function validate($value): void
    {
        if (! is_int($value)) {
            $this->invalidArgument('Unix time is not valid');
        }
    }

    public static function currentTime() : UnixTime
    {
        return new self(time());
    }
}