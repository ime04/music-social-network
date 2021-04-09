<?php

namespace MusicProject\Shared\Infrastructure\Events;

use AMQPException;
use MusicProject\Shared\Domain\Events\DomainEvent;
use MusicProject\Shared\Domain\Events\EventBus;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Container\ContainerInterface;

class RabbitMQEventBus implements EventBus
{
    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct(ContainerInterface $container)
    {
        $this->connection = new AMQPStreamConnection(
            $container->get('RABBIT_MQ_CONSTANTS')['HOST'],
            $container->get('RABBIT_MQ_CONSTANTS')['PORT'],
            $container->get('RABBIT_MQ_CONSTANTS')['USER'],
            $container->get('RABBIT_MQ_CONSTANTS')['PASSWORD']
        );
        $this->channel = $this->connection->channel();
        $this->channel->queue_declare(
            $container->get('RABBIT_MQ_CONSTANTS')['QUEUE'],
            false,
            true,
            false,
            false
        );
    }

    public function publish(DomainEvent ...$events) : void
    {
        array_map($this->publisher(), $events);
        $this->closeRabbit();
    }

    private function publisher() : callable
    {
        return function (DomainEvent $event) {
            try {
                $this->publishEvent($event);
            } catch (AMQPException $exception) {
                echo $exception->getMessage();
            }
        };
    }

    private function publishEvent(DomainEvent $event) : void
    {
        $serializeEvent = $this->serializeEvent($event);
        $message = new AMQPMessage(
            $serializeEvent,
            [
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]
        );
        $this->channel->basic_publish($message, '', self::QUEUE_NAME);
    }

    private function serializeEvent(DomainEvent $event) : string
    {
        return json_encode([
            'data' => [
                'id' => $event->eventID(),
                'type' => $event::eventName(),
                'occurredOn' => $event->occurredOn(),
                'attributes' => array_merge(
                    $event->toPrimitives(),
                    [
                        'id' => $event->aggregateID()
                    ]
                )
            ],
            'meta' => []
        ]);
    }

    private function closeRabbit() : void
    {
        $this->channel->close();
        $this->connection->close();
    }
}