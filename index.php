<?php

include_once('./vendor/autoload.php');

use \DI\ContainerBuilder;

try {
    global $container;
    $container = new ContainerBuilder();
} catch (Exception $exception) {
    echo 'exception : ' . $exception;
}