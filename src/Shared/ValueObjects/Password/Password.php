<?php

namespace MusicProject\Shared\ValueObjects\Password;

// minimo 8 caracteres, string, no vacio, método para codificarlo (sha256)
class Password
{
    protected string $value;

    public function __construct(string $password)
    {
        $this->validate($password);
        $this->value = $password;
    }

    protected function validate(string $password)
    { //self::expectExceptionMessage
        if(strlen(trim($password)) < 8){
            $this->invalidArgument('Password is invalid');
        }
        if(!preg_match("#[0-9]+#", $password)){
            $this->invalidArgument('Password must have at least 1 number');
        }
        if(!preg_match("#[A-Z]+#", $password)){
            $this->invalidArgument('Password must have at least 1 capital letter');
        }
        if(!preg_match("#[a-z]+#", $password)){
            $this->invalidArgument('Password must have at least 1 lowercase letter');
        }
    }
}