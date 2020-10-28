<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Core\Infrastructure\Config\Core;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;

$request = Request::createFromGlobals();
$app = new Core();
$app->map('/user/register', RegisterUserAction::class);
$response = $app->handle($request);
$response->send();