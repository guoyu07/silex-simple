<?php

use Silex\Provider\ServiceControllerServiceProvider;
use Symfony\Component\Debug\Debug;

/** @var Silex\Application $app */
$app = require __DIR__ . "/../app.php";

Debug::enable();
$app['debug'] = true;

$app->register(new ServiceControllerServiceProvider());
$app->register(new Silex\Provider\WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/../cache/profiler',
));

$app->run();