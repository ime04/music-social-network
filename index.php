<?php

include_once('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

switch ($request->getPathInfo()) {
    case '/':
        $response->setContent('This is the website home');
        break;

    case '/user/register':
        $response->setContent('This is the user register page');
        break;

    default:
        $response->setContent('Not found !');
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
}

$response->send();