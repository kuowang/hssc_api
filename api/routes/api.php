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

// 使用中间件 无权限认证
$router->group(['prefix' => 'v1', 'middleware' => [ 'after']],function ()use($router) {

    $router->get('/user/profile', function () {

    });

    $router->get('testmysql',   'TestController@testMysql');
    $router->get('testredis',   'TestController@testRedis');
    $router->get('testlogin',   'TestController@testLogin');

});

// 使用中间件... 用户登录权限
$router->group(['prefix' => 'v1', 'middleware' => [ 'jwtAuth','after']],function ()use($router) {

    $router->get('testjwt',   'TestController@testjwt');
});








