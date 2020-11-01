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
use MusicProject\Core\Infrastructure\Config\CommonContainer;
use MusicProject\Core\Infrastructure\Services\Setup;

try
{
    global $container;
    //$container = (new Setup(new CommonContainer()))->getContainer();
    $container = new DI\Container();
    $routes = (new Routes())->__invoke();
    $context = new RequestContext();
    $context->fromRequest(Request::createFromGlobals());
    $matcher = new UrlMatcher($routes, $context);
    $parameters = $matcher->match($context->getPathInfo());
    $response = (new $parameters['controller'])->__invoke();
    $controller = $container->get($parameters['controller']);
    var_dump($controller);
    if (method_exists($controller, '__invoke')) {
        return $controller->__invoke();
    }
}
catch (ResourceNotFoundException $e)
{
    echo $e->getMessage();
}