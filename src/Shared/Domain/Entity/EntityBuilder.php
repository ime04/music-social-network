<?php

namespace MusicProject\Shared\Domain\Entity;

use Psr\Container\ContainerInterface;

class EntityBuilder
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(string $factory, array $data) : EntityBase
    {
        $factory = $this->container->get($factory);
        return $factory->fromArray($data);
    }
}