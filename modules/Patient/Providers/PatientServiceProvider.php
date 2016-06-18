<?php namespace KekecMed\Patient\Providers;

use Illuminate\Support\ServiceProvider;
use KekecMed\Theme\Component\ViewComponent;

class PatientServiceProvider extends ServiceProvider
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

        ViewComponent::getInstance()->modifySidebar(function ($menu) {
            $menu->route(
                'patient.index', // route name
                'Patients', // title
                [], // route parameters
                [
                    'icon'   => 'fa fa-wheelchair'
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
        $langPath = base_path('resources/lang/modules/patient');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'patient');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'patient');
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
            __DIR__ . '/../Config/config.php' => config_path('patient.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'patient'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/patient');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/patient';
        }, \Config::get('view.paths')), [$sourcePath]), 'patient');
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
