<?php

include_once('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use MusicProject\Core\Infrastructure\Config\Core;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;

$request = Request::createFromGlobals();
$app = new Core();
$app->map('/user/register', function () {
    return RegisterUserAction::class;
});
$response = $app->handle($request);
$response->send();