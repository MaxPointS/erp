<?php

namespace App\Listeners;

use App\Events\paymentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Throwable;

class paymentNotify
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(paymentEvent $event)//: void
    {
        //
        return $event;
    }
}
