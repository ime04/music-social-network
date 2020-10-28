<?php

error_reporting(E_ALL);
include_once('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Core\Infrastructure\Config\Core;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;

$request = Request::createFromGlobals();
$app = new Core();
$response = $app->handle($request);
$app->map('/user/register', RegisterUserAction::class);
$response->send();