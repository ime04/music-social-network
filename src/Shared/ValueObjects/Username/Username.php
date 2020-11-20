<?php

namespace MusicProject\Shared\ValueObjects\Username;

use MusicProject\Shared\ValueObjects\AbstractValueObject;

class Username extends AbstractValueObject
{
    public function __construct(string $userName)
    {
        $this->validate($userName);
    }

    protected function validate(string $userName) : void
    {
        if (strlen(trim($userName)) < 3) {
            $this->invalidArgument('Username is invalid');
        }
    }
}