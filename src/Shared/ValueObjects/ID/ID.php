<?php

namespace MusicProject\Shared\ValueObjects\ID;

use MusicProject\Shared\ValueObjects\AbstractValueObject;
//Validar que sea un numero entero y mayor que 0
class ID extends AbstractValueObject
{
    protected int $value;

    public function __construct(int $id)
    {
        //TODO call to validate
        $this->value = $id;
    }

    protected function validate(int $id): void
    {
        // TODO: Implement validate() method.
        // TODO if fail call to invalidArgument function
    }
}