<?php

include_once('./vendor/autoload.php');

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;

try
{
    // Init basic route
    //TODO Load routes in other file
    $userRegisterRoute = new Route(
        '/user/register',
        array('controller' => RegisterUserAction::class)
    );

    // Init route with dynamic placeholders
    /*$foo_placeholder_route = new Route(
        '/foo/{id}',
        array('controller' => 'FooController', 'method'=>'load'),
        array('id' => '[0-9]+')
    );*/

    // Add Route object(s) to RouteCollection object
    $routes = new RouteCollection();
    $routes->add('user_register', $userRegisterRoute);
    //$routes->add('foo_placeholder_route', $foo_placeholder_route);

    // Init RequestContext object
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());

    // Init UrlMatcher object
    $matcher = new UrlMatcher($routes, $context);

    // Find the current route
    $parameters = $matcher->match($context->getPathInfo());

    // How to generate a SEO URL
    /*$generator = new UrlGenerator($routes, $context);
    $url = $generator->generate('foo_placeholder_route', array(
        'id' => 123,
    ));*/
    
    $response = (new $parameters['controller'])->__invoke();
    $response->send();
}
catch (ResourceNotFoundException $e)
{
    echo $e->getMessage();
}