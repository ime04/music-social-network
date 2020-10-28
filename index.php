<?php

include_once('./vendor/autoload.php');

use MusicProject\Core\Infrastructure\Config\CommonContainerBuilder;

try {
    global $container;
    $container = new CommonContainerBuilder();
} catch (Exception $exception) {
    echo 'exception : ' . $exception;
}