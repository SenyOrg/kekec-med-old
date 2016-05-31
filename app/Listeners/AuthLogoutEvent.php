<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AuthLogoutEvent
 * -----------------------------
 * 
 * -----------------------------
 * @package App\Listeners
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class AuthLogoutEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $event->user->update(['online' => false]);
    }
}
