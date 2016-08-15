<?php namespace KekecMed\User\Providers;

use KekecMed\Core\Abstracts\Providers\AbstractFullstackModuleProvider;

/**
 * Class UserServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\User\Providers
 */
class UserServiceProvider extends AbstractFullstackModuleProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

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
        return 'user';
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
