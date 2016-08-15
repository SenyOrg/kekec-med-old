<?php namespace KekecMed\Core\Providers;

use Illuminate\Support\ServiceProvider;
use KekecMed\Core\Abstracts\Providers\AbstractModuleProvider;
use KekecMed\Core\Abstracts\Providers\Modules\Commandable;
use KekecMed\Core\Abstracts\Providers\Modules\Configable;
use KekecMed\Core\Abstracts\Providers\Modules\Eventable;
use KekecMed\Core\Console\WebsocketCommand;
use KekecMed\Core\Websocket\Client;
use KekecMed\Queue\Subscribers\WebsocketSubscriber;

/**
 * Class WebsocketServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Providers
 */
class WebsocketServiceProvider extends AbstractModuleProvider implements Configable, Commandable, Eventable
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
        /**
         * Register Websocket Client
         */
        $this->app->singleton('kekecmed.service.websocket.client', function ($app) {
            return new Client(config('websocket.realm'), config('websocket.ip'), config('websocket.port'));
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

    /**
     * Get module identifier
     *
     * @return string
     */
    protected function getModuleIdentifier()
    {
        return 'websocket';
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
        return [
            WebsocketCommand::class  
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
            WebsocketSubscriber::class
        ];
    }
}
