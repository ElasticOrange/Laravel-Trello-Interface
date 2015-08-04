<?php namespace Hydrarulz\LaravelTrelloInterface;

use Illuminate\Support\ServiceProvider;
use Config;

class LaravelTrelloInterfaceServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../../../config/config.php' => base_path('config/laravel-trello-interface.php')
		]);
	}


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('mandrill-trello', function()
		{
			$token = Config::get('laravel-trello-interface.token');

            return new LaravelTrelloInterface($token);
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
