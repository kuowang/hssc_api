<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/index', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'v1', 'middleware' => [ 'jwtAuth','after']],function ()use($router) {

    $router->get('/user/profile', function () {
        // 使用第一个和第二个中间件...
    });

    $router->get('testmysql',   'TestController@testMysql');
    $router->get('testredis',   'TestController@testRedis');

});







