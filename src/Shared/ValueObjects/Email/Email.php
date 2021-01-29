<?php

use \MusicProject\Shared\ValueObjects\AbstractValueObject;

class Email extends AbstractValueObject
{

    protected string $email;

    public function __construct(string $email)
    {
        $this->validate($email);
        $this->value = $email;
    }

    protected function validate($email): void
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->invalidArgument("EmailTest is not valid.");
        }
    }
}