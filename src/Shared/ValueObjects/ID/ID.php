<?php

namespace MusicProject\Shared\ValueObjects\ID;

use MusicProject\Shared\ValueObjects\AbstractValueObject;

class ID extends AbstractValueObject
{
    protected int $value;

    public function __construct(int $id)
    {
        //TODO call to validate
        $this->value = $id;
    }

    protected function validate(): void
    {
        // TODO: Implement validate() method.
        // TODO if fail call to invalidArgument function
    }
}