<?php

include_once('./vendor/autoload.php');

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

switch($request->getPathInfo()) {
    case '/':
        echo 'This is the home page';
        break;
    case '/user/register':
        echo 'This is the user register page';
        break;
    default:
        echo 'Not found!';
}