<?php namespace KekecMed\Core\Providers;

use Illuminate\Support\ServiceProvider;
use KekecMed\Core\Console\WebsocketCommand;
use KekecMed\Core\Websocket\Client;
use KekecMed\Queue\Subscribers\WebsocketSubscriber;

/**
 * Class WebsocketServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Providers
 */
class WebsocketServiceProvider extends ServiceProvider
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
        $this->registerConfig();
        $this->registerCommands();
        $this->registerEventListeners();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/websocket.config.php' => config_path('websocket.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/websocket.config.php', 'websocket'
        );
    }

    /**
     * Register commands
     */
    public function registerCommands()
    {
        $this->commands(WebsocketCommand::class);
    }

    /**
     * Register event listeners
     */
    public function registerEventListeners()
    {
        /**
         * Register global Subscriber for websocket events
         */
        \Event::subscribe(WebsocketSubscriber::class);
    }

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
}
