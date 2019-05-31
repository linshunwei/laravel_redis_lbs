<?php
namespace Linshunwei\LaravelRedisLbs\Provider;

use Illuminate\Support\ServiceProvider;
use Linshunwei\LaravelRedisLbs\Contracts\LbsInterface;
use Linshunwei\LaravelRedisLbs\Services\LbsServer;

class RedisLbsProvider extends ServiceProvider
{

    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot(){
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('redis_lbs.php'),
        ]);
    }

    public function register(){
        $this->app->bind(LbsInterface::class,LbsServer::class);
        $this->app->singleton('LBSServer',function(){
            return new LbsServer();
        });
    }

    /**
     * 获取由提供者提供的服务.
     *
     * @return array
     */
    public function provides()
    {
        return [LbsInterface::class,'LBSServer'];
    }

}