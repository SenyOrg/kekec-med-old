<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class AuthAttemptEvent
 * -----------------------------
 * 
 * -----------------------------
 * @package App\Listeners
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class AuthAttemptEvent
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
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        //
    }
}
