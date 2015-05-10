<?php namespace Closca\Sonus;

use Illuminate\Support\ServiceProvider;

class SonusServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('sonus.php')
        ], 'config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['sonus'] = $this->app->share(function($app)
        {
            return new Sonus;
        });
	}
}