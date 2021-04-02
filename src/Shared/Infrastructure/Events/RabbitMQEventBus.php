<?php

namespace MusicProject\Shared\Infrastructure\Events;

use MusicProject\Shared\Domain\Events\DomainEvent;
use MusicProject\Shared\Domain\Events\EventBus;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQEventBus implements EventBus
{
    private const HOST = 'localhost';
    private const PORT = 8080;
    private const USER = 'ismael';
    private const PASSWORD = 'test';

    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(self::HOST, self::PORT, self::USER, self::PASSWORD);
        $this->channel = $this->connection->channel();
    }

    public function publish(DomainEvent ...$events): void
    {
        array_map($this->publisher(), $events);
    }

    private function publisher(): callable
    {
        $this->channel->queue_declare('queue_test', false, false, false, false);
        return function (DomainEvent $event) {
            //$body       = DomainEventJsonSerializer::serialize($event);
            //$routingKey = $event::eventName();
            //$messageId  = $event->eventId();

            /*$this->connection->exchange($this->exchangeName)->publish(
                $body,
                $routingKey,
                AMQP_NOPARAM,
                [
                    'message_id'       => $messageId,
                    'content_type'     => 'application/json',
                    'content_encoding' => 'utf-8',
                ]
            );*/
        };
    }
}