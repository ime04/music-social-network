<?php

namespace MusicProject\Shared\Domain\Entity;

interface EntityFactoryInterface
{
    public function fromArray(array $data);
}