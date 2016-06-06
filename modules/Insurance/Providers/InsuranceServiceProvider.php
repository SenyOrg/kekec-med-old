<?php namespace KekecMed\Insurance\Providers;

use Illuminate\Support\ServiceProvider;

class InsuranceServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerTranslations();
		$this->registerConfig();
		$this->registerViews();

		\Menu::modify('navigation', function($menu)
		{
			$menu->route(
				'insurance.index', // route name
				'Insurance', // title
				[], // route parameters
				[
					'target' => 'blank',
					'icon' => 'fa fa-life-ring'
				] // attributes
			);
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		//
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../Config/config.php' => config_path('insurance.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../Config/config.php', 'insurance'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/insurance');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom(array_merge(array_map(function ($path) {
			return $path . '/modules/insurance';
		}, \Config::get('view.paths')), [$sourcePath]), 'insurance');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/insurance');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'insurance');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'insurance');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
