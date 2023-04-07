<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey zuo
 * Mail: zuoyaofei@icloud.com
 * Date: 17/11/15
 * Time: 15:23
 */
use Illuminate\Support\Str;

return [
    'fetch' => PDO::FETCH_CLASS,
    'default' => env('DB_CONNECTION', 'mysql'),
    'migrations' => 'migrations',
    'connections' => [
        'mysql' => [
            'driver'   =>  env('DB_CONNECTION','mysql'),
            'host'     =>  env('DB_HOST','127.0.0.1'),
            'port'     =>  env('DB_PORT','3306'),
            'database' =>  env('DB_DATABASE','heishi'),
            'username' =>  env('DB_USERNAME','heishi'),
            'password' =>  env('DB_PASSWORD','L4zw8vmZENnMACEQ'),
            'charset'   => env('DB_CHARSET','utf8'),
            'collation' => env('DB_COLLATION','utf8_unicode_ci'),
            'prefix'    => env('DB_PREFIX','hs_'),
        ],
        'mongodb' => array(
            'driver'   => env('MONGODB_DRIVER','mongodb'),
            'host'     => explode(',', env('MONGODB_HOST','127.0.0.1')),
            'port'     => env('MONGODB_POST','27017'),
            'database' => env('MONGODB_DATABASE','hs'),
            //'options'  => array('replicaSet' => env('MONGODB_OPTIONS_RS'))
        ),
    ],

    'redis' => [
        'client' => env('REDIS_CLIENT', 'phpredis'),  // redis phpredis Laravel 默认使用 phpredis 扩展与 Redis 通信
        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', 'db_'),
        ],
        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST','127.0.0.1'),
            'password' => env('REDIS_PASSWORD',null),
            'port' => '6379',
            'database' => env('REDIS_DB', '0'),
        ],
        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST','127.0.0.1'),
            'password' =>env('REDIS_PASSWORD',null),
            'port' => '6379',
            'database' => env('REDIS_CACHE_DB', '1'),
        ],
    ]

];
