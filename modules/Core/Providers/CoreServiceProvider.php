<?php namespace KekecMed\Core\Providers;

use Illuminate\Auth\Events\Logout;
use KekecMed\Core\Abstracts\Providers\AbstractFullstackModuleProvider;
use KekecMed\Core\Console\FilewatcherCommand;
use KekecMed\Core\Console\ICDImporterCommand;
use KekecMed\Core\Console\SearchIndexingCommand;
use KekecMed\Core\Console\WebsocketCommand;

/**
 * Class CoreServiceProvider
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Providers
 */
class CoreServiceProvider extends AbstractFullstackModuleProvider
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
        return 'core';
    }

    /**
     * Get commands as array
     *
     * @return array
     */
    public function getCommands()
    {
        return [
            ICDImporterCommand::class,
            SearchIndexingCommand::class,
            FilewatcherCommand::class
        ];
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
        return [
            Logout::class => function ($user) {
                \Session::clear();
                \Session::forget('locked');
            }
        ];
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
}
