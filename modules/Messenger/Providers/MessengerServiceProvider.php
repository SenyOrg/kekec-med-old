<?php namespace KekecMed\Messenger\Providers;

use App\User;
use KekecMed\Core\Abstracts\Providers\AbstractFullstackModuleProvider;
use KekecMed\Messenger\Messenger\Messenger;
use KekecMed\Messenger\Subscribers\WebsocketSubscriber;

/**
 * Class MessengerServiceProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Messenger\Providers
 */
class MessengerServiceProvider extends AbstractFullstackModuleProvider {

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
        $this->app->singleton('kekecmed.service.messenger', function ($app) {
            if (\Auth::user()) {
                return new Messenger(\Auth::user());
            } else {
                return new Messenger(User::all()->first());
            }
        });
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

    /**
     * Get module identifier
     *
     * @return string
     */
    protected function getModuleIdentifier()
    {
        return 'messenger';
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
        return [
            WebsocketSubscriber::class
        ];
    }
}
