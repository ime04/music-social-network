<?php

include_once('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Core\Infrastructure\Config\Core;
$request = Request::createFromGlobals();
$app = new Core();
$response = $app->handle($request);
$response->send();