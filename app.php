<?php
require_once __DIR__ . '/vendor/autoload.php';

use Core\Resolver\ControllerResolver;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;


$app = new Silex\Application();

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\HttpFragmentServiceProvider());

/**
 * Twig
 */
$app->register(new Silex\Provider\TwigServiceProvider());
$app['twig.loader.filesystem']->addPath(__DIR__ . '/src/Core/Views', 'Core');
$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    // add custom filters, globals, tags...
    return $twig;
}));

/**
 * Routes
 */
$app['routes'] = $app->extend('routes', function (RouteCollection $routes) {
    $loader = new YamlFileLoader(new FileLocator(__DIR__ . '/config'));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);
    return $routes;
});

/**
 * Controller Resolver
 */
$app['resolver'] = $app->share(function () use ($app) {
    return new ControllerResolver($app, $app['logger']);
});


return $app;