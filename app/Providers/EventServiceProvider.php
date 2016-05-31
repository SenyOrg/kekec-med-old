<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * -----------------------------
 *
 * -----------------------------
 * @package App\Providers
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Attempting' => [
            'App\Listeners\AuthAttemptEvent',
        ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\AuthLoginEvent',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\AuthLogoutEvent',
        ],

        'Illuminate\Auth\Events\Lockout' => [
            'App\Listeners\AuthLockoutEvent',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
