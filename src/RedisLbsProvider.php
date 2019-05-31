<?php

namespace Linshunwei\LaravelRedisLbs;

use Illuminate\Support\ServiceProvider;

class RedisLbsProvider extends ServiceProvider
{

	/**
	 * 服务提供者加是否延迟加载.
	 *
	 * @var bool
	 */
	protected $defer = true;

	public function boot()
	{
	}

	public function register()
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/config/config.php' => config_path('redis_lbs.php'),
			]);
		}

		$this->app->singleton('redis_lbs', function () {
			return new RedisLbs();
		});
	}
}