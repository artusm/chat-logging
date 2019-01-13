<?php

require_once __DIR__.'/../vendor/autoload.php';

Dotenv::load(__DIR__.'/../');

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
*/

$app = new App\Application(
	realpath(__DIR__.'/../')
);

$app->withFacades();

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
*/

$app->singleton(
    'Illuminate\Contracts\Debug\ExceptionHandler',
    'App\Exceptions\Handler'
);

$app->singleton(
    'Illuminate\Contracts\Console\Kernel',
    'App\Console\Kernel'
);

/*
|--------------------------------------------------------------------------
| Load The Configuration from __DIR__/../config/main.php
|--------------------------------------------------------------------------
*/
$app->configure('main');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
*/

// $app->middleware([
//     // 'Illuminate\Cookie\Middleware\EncryptCookies',
//     // 'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
//     // 'Illuminate\Session\Middleware\StartSession',
//     // 'Illuminate\View\Middleware\ShareErrorsFromSession',
//     // 'Laravel\Lumen\Http\Middleware\VerifyCsrfToken',
// ]);

$app->routeMiddleware([
    'CanCreateMessage' => 'App\Http\Middleware\CanCreateMessageMiddleware',
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
*/

// $app->register('App\Providers\AppServiceProvider');

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
*/
$app->group(['namespace' => 'App\Http\Controllers'], function () use ($app) {
    require __DIR__.'/../app/Http/routes.php';
});


return $app;
