<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('./vendor/autoload.php');

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use MusicProject\Core\Infrastructure\Routes\Routes;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

try
{
    global $container;
    $container = new DI\Container();
    $routes = (new Routes())->__invoke();
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());
    $matcher = new UrlMatcher($routes, $context);
    $parameters = $matcher->match($context->getPathInfo());
    $controller = $container->get($parameters['controller']);
    if (method_exists($controller, '__invoke')) {
        $response = $controller->__invoke();
        $response->send();
    }
}
catch (ResourceNotFoundException $exception)
{
    echo $exception->getMessage();
}
catch (MethodNotAllowedException $exception)
{
    echo 'Método no permitido';
}