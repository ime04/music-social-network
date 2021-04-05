<?php

namespace MusicProject\Shared\Infrastructure\Events;

use AMQPException;
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
    private const EXCHANGE_NAME = 'domain_events';

    private AMQPStreamConnection $connection;
    private AMQPChannel $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(self::HOST, self::PORT, self::USER, self::PASSWORD);
        $this->channel = $this->connection->channel();
        $this->channel->exchange_declare(
            self::EXCHANGE_NAME,
            'fanout', # type
            false,    # passive
            false,    # durable
            false     # auto_delete
        );
        //$this->channel->queue_declare('queue_test', false, false, false, false);
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
        $routingKey = $event::eventName();
        //$messageID = $event->eventID();
        $message = new AMQPMessage($serializeEvent);
        var_dump($serializeEvent);
        $this->channel->basic_publish($message, self::EXCHANGE_NAME, $routingKey);
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