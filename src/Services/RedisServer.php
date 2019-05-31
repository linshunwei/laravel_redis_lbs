<?php
namespace Linshunwei\LaravelRedisLbs\Services;


use Predis\Client;

class RedisServer
{
    public static $server = null;
    public function __construct($config_file = null)
    {
        //连接信息
        $config = [
            'scheme' => 'tcp',
            'host'   => isset($config_file['host'])? $config_file['host']  :'127.0.0.1',
            'port'   => isset($config_file['port'])? $config_file['port']  :6379,
        ];
        //可选信息
        $options = [
            'parameters' => [
                'password' => isset($config_file['password'])? $config_file['password'] :null,
                'database' => isset($config_file['database'])? $config_file['database'] :1,
            ],
            'profile' => '3.2'
//            'prefix' => 'geo_'
        ];
        self::$server = new Client($config,$options);
    }

}