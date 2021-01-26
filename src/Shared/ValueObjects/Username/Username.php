<?php

namespace MusicProject\Shared\ValueObjects\Username;

use MusicProject\Shared\ValueObjects\AbstractValueObject;

class Username extends AbstractValueObject
{
    protected string $value;

    public function __construct(string $userName)
    {
        $this->validate($userName);
        $this->value = $userName;
    }

    protected function validate($userName) : void
    {
        if (strlen(trim($userName)) < 3) {
            $this->invalidArgument('Username is too short');
        }
        if (preg_match('/[^a-z0-9 _]+/i', $userName)) {
            $this->invalidArgument('Username contains symbols');
        }
    }
}