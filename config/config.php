<?php
return [
    //是否应用在laravel当中
    'is_laravel' => false,
    //使用laravel的redis版本
    'laravel_redis' => 'default',


    'geoset_name' => env('GEOSET_NAME', 'LBS'),         //集合名
    'radium_option' => [                //搜寻附近的人的时候定义的一些参数
        'WITHDIST' => true,
        'SORT' => 'asc',
        'WITHHASH' => false,
    ],
    'redis_connection' => [
	    'host' => env('REDIS_LBS_HOST', '127.0.0.1'), //连接地址
	    'password' => env('REDIS_LBS_PASSWORD', null),  //密码
	    'port' => env('REDIS_LBS_PORT', 6379), //端口
	    'database' => env('REDIS_LBS_DB', 1), //库索引
    ],
];