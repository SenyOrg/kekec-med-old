<?php namespace KekecMed\Core\Abstracts\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

/**
 * Class AbstractProvider
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Abstracts\Providers
 */
abstract class AbstractProvider extends ServiceProvider
{
    /**
     * Get Event Service
     *
     * @return Dispatcher
     */
    public function getEventService() {
        return $this->app['events'];
    }

    /**
     * Boot Service Provider
     */
    public function boot() {
        if ($this instanceof AbstractModuleProvider)
            $this->bootModule();
    }
}