<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', 'IndexController@show');

$app->group(['prefix' => 'message', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->get('/', 'MessageController@index');

    $app->post('/', [
        'uses' => 'MessageController@store',
        'middleware' => 'CanCreateMessage'
    ]);
});