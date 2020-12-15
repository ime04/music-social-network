<?php

namespace MusicProject\Shared\ValueObjects\Password;

// minimo 8 caracteres, string, no vacio, método para codificarlo (sha256)
class Password
{
    public function __construct(string $password)
    {
        $this->validate($password);
    }

    protected function validate(string $password)
    {
        if(strlen(trim($password)) < 8 | empty($password)){
            $this->invalidArgument('Password is invalid');
        }
        elseif(!preg_match("#[0-9]+#", $password)){
            $this->invalidArgument('Password must have at least 1 number');
        }
        elseif(!preg_match("#[A-Z]+#", $password)){
            $this->invalidArgument('Password must have at least 1 capital letter');
        }
        elseif(!preg_match("#[a-z]+#", $password)){
            $this->invalidArgument('Password must have at least 1 lowercase letter');
        }
    }
}