<?php

namespace MusicProject\Shared\ValueObjects;

use InvalidArgumentException;

abstract class AbstractValueObject
{
    public function value()
    {
        return $this->value;
    }

    abstract protected function validate($value) : void;

    public function invalidArgument(string $message) : void
    {
        throw new InvalidArgumentException($message);
    }
}