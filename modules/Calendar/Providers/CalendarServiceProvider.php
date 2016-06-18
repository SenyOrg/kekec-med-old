<?php namespace KekecMed\Calendar\Providers;

use Illuminate\Support\ServiceProvider;
use KekecMed\Theme\Component\ViewComponent;

class CalendarServiceProvider extends ServiceProvider
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
                'calendar.index', // route name
                'Calendar', // title
                [], // route parameters
                [
                    'icon'   => 'fa fa-calendar'
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
        $langPath = base_path('resources/lang/modules/calendar');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'calendar');
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'calendar');
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
            __DIR__ . '/../Config/config.php' => config_path('calendar.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'calendar'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/calendar');

        $sourcePath = __DIR__ . '/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/calendar';
        }, \Config::get('view.paths')), [$sourcePath]), 'calendar');
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
