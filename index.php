<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('./vendor/autoload.php');



use MusicProject\User\User\Infrastructure\Controllers\RegisterUserAction;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$route = new Route('/user/register', ['_controller' => RegisterUserAction::class]);
$routes = new RouteCollection();
$routes->add('user-register', $route);

$context = new RequestContext();

// Routing can match routes with incoming requests
$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match('/user/register');
// $parameters = [
//     '_controller' => 'App\Controller\BlogController',
//     'slug' => 'lorem-ipsum',
//     '_route' => 'blog_show'
// ]

// Routing can also generate URLs for a given route
$generator = new UrlGenerator($routes, $context);
$url = $generator->generate('user-register', [
    'slug' => 'user-registe',
]);;