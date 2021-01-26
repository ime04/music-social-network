<?php

namespace MusicProject\Shared\ValueObjects\Password;

use MusicProject\Shared\ValueObjects\AbstractValueObject;
// minimo 8 caracteres, string, no vacio, método para codificarlo (sha256)
class Password extends AbstractValueObject
{
    protected string $value;

    public function __construct(string $password)
    {
        $this->validate($password);
        $this->value = $password;
    }

    protected function validate($password) : void
    { //self::expectExceptionMessage
        if(strlen(trim($password)) < 8){
            $this->invalidArgument('Password is too short');
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