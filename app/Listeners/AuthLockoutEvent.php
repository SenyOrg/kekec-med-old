<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AuthLockoutEvent
 * -----------------------------
 * 
 * -----------------------------
 * @package App\Listeners
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class AuthLockoutEvent
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
     * @param  Lockout  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        //
    }
}
