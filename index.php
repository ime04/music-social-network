<?php

include_once('./vendor/autoload.php');

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;

try {
    $registerUserRoute = new Route(
        '/user/register',
        array('controller' => 'RegisterUserAction')
    );
    $routes = new RouteCollection();
    $routes->add('register', '/user/register')
        // the controller value has the format [controller_class, method_name]
        ->controller([RegisterUserAction::class])
        ->methods(['POST']);
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());
    $matcher = new UrlMatcher($routes, $context);
    $parameters = $matcher->match($context->getPathInfo());
} catch (ResourceNotFoundException $e) {
    echo $e->getMessage();
}