<?php


namespace MusicProject\Shared\Infrastructure\Events;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class WorkerRabbitMQ
{
    public function __invoke()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'ismael', '1234');
        $channel = $connection->channel();

        /*$channel->queue_declare('domain_events', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
          echo ' [x] Received ', $msg->body, "\n";
        };

        $channel->basic_consume('domain_events', '', false, true, false, false, $callback);

        while ($channel->is_consuming()) {
            $channel->wait();
        } */

        $channel->queue_declare('domain_events', false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg)
        {
            echo ' [x] Received ', $msg->body, "\n";
            sleep(substr_count($msg->body, '.'));
            echo " [x] Done\n";
            $msg->ack();
        };

        $channel->basic_qos(null, 1, null);
        $channel->basic_consume('domain_events', '', false, false, false, false, $callback);

        while ($channel->is_consuming())
        {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }

}