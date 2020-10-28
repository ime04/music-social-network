<?php

include_once('./vendor/autoload.php');

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;

try {
    $registerUserRoute = new Route(
        '/user/register',
        array('controller' => 'RegisterUserAction')
    );
    $routes = new RouteCollection();
    $routes->add('register-user', $registerUserRoute);
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());
    $matcher = new UrlMatcher($routes, $context);
    $parameters = $matcher->match($context->getPathInfo());
} catch (ResourceNotFoundException $e) {
    echo $e->getMessage();
}