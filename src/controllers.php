<?php

use MyApplication\Controllers;

/**
 * Error handling.
 */
$app->error( function ( \Exception $e, $code ) use ( $app )
{
	$error_ctrl = new Controllers\Error( $app['twig'], $app['debug'] );
	return $error_ctrl->handleAction( $code );
} );

/**
 * Controllers definition.
 */
$app['myapplication.controllers.home'] = $app->share( function () use ( $app )
{
	return new Controllers\Home( $app['twig'], $app['myapplication.welcome.messages'] );
} );

/**
 * Routes definition.
 */
$app->get( '/{who}', 'myapplication.controllers.home:homeAction' )->value( 'who', 'world' )->assert( 'who', '[a-zA-Z0-9]+' )->bind( 'home' );