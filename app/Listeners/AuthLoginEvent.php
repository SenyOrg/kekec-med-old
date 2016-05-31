<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AuthLoginEvent
 * -----------------------------
 * 
 * -----------------------------
 * @package App\Listeners
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class AuthLoginEvent
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->update(['online' => true]);
    }
}
