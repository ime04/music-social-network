<?php

namespace MusicProject\Shared\Infrastructure\Events;

use MusicProject\Shared\Domain\Events\DomainEvent;
use MusicProject\Shared\Domain\Events\EventBus;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQEventBus implements EventBus
{
    private const HOST = 'localhost';
    private const PORT = 5672;
    private const USER = 'ismael';
    private const PASSWORD = '1234';

    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(self::HOST, self::PORT, self::USER, self::PASSWORD);
        $this->channel = $this->connection->channel();
    }

    public function publish(DomainEvent ...$events) : void
    {
        $this->channel->queue_declare('queue_test', false, false, false, false);
        array_map($this->publisher(), $events);
    }

    private function publisher() : callable
    {
        return function (DomainEvent $event) {
            $serializeEvent = $this->serializeEvent($event);
            $routingKey = $event::eventName();
            //$messageID = $event->eventID();
            $message = new AMQPMessage($serializeEvent);
            var_dump($serializeEvent);
            $this->channel->basic_publish($message, '', $routingKey);
        };
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
}