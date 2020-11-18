<?php

namespace MusicProject\Shared\Domain;

interface EntityInterface
{
    public function fromArray(array $data);
}