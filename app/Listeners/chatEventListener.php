<?php

namespace App\Listeners;

use App\Events\chatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class chatEventListener
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
     * @param  chatEvent  $event
     * @return void
     */
    public function handle(chatEvent $event)
    {
        //
    }
}
