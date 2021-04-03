<?php

namespace MusicProject\Shared\ValueObjects\Uuid;

use MusicProject\Shared\ValueObjects\AbstractValueObject;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid extends AbstractValueObject
{
    protected string $value;

    public function __construct(string $uuid)
    {
        $this->validate($uuid);
        $this->value = $uuid;
    }

    protected function validate($value): void
    {
        RamseyUuid::isValid($value);
    }

    public static function generateRandomUuid() : Uuid
    {
        return new self(RamseyUuid::uuid4()->toString());
    }
}