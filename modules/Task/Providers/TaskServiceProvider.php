<?php namespace KekecMed\Task\Providers;

use Illuminate\Support\ServiceProvider;
use KekecMed\Core\Abstracts\Providers\AbstractFullstackModuleProvider;
use KekecMed\Theme\Component\ViewComponent;

/**
 * Class TaskServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Task\Providers
 */
class TaskServiceProvider extends AbstractFullstackModuleProvider
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
        parent::boot();

        ViewComponent::getInstance()->modifySidebar(function ($menu) {
            $menu->route(
                'task.index', // route name
                'Tasks', // title
                [], // route parameters
                [
                    'icon'   => 'fa fa-tasks'
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
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    /**
     * Get module identifier
     *
     * @return string
     */
    protected function getModuleIdentifier()
    {
        return 'task';
    }

    /**
     * Get path to service provider
     *
     * @return string
     */
    protected function getServiceProviderPath()
    {
        return __DIR__;
    }

    /**
     * Get commands as array
     *
     * @return array
     */
    public function getCommands()
    {
        return [];
    }

    /**
     * Get list of Arrays
     *
     * [
     *      EventClass1::class => function() {
     *
     *      },
     *      EventClass2::class => function() {
     *
     *      },
     *      ...
     * ]
     *
     * @return array
     */
    public function getEvents()
    {
        return [];
    }
}
