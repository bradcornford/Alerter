<?php namespace Cornford\Alerter;

use Illuminate\Support\ServiceProvider;
use Cornford\Alerter\Alert;

class AlerterServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('cornford/alerter');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('alert', function()
		{
			return Alert::create(Alert::TYPE_NONE, '');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('alert');
	}

}
