<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;

$app = new Application();
$app->register( new UrlGeneratorServiceProvider() );
$app->register( new ValidatorServiceProvider() );
$app->register( new ServiceControllerServiceProvider() );
$app->register( new TwigServiceProvider(), array(
	'twig.path'    => array( __DIR__ . '/../src/MyApplication/templates' ),
	'twig.options' => array( 'cache' => __DIR__ . '/../var/cache/twig' ),
) );

return $app;
