<?php namespace KekecMed\Consultation\Providers;

use Illuminate\Support\ServiceProvider;

class ConsultationServiceProvider extends ServiceProvider
{

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

        \Menu::modify('navigation', function ($menu) {
            $menu->route(
                'consultation.index', // route name
                'Consultations', // title
                [], // route parameters
                [
                    'target' => 'blank',
                    'icon'   => 'fa fa-comments'
                ] // attributes
            );
        });
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/consultation');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'consultation');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'consultation');
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('consultation.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'consultation'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/consultation');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/consultation';
        }, \Config::get('view.paths')), [$sourcePath]), 'consultation');
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
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

}
