<?php

namespace App\Listeners;

use App\Mail\ReceipeStored;
use App\Events\ReceipeStoredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReceipeStoredListener
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
     * @param  ReceipeStoredEvent  $event
     * @return void
     */
    public function handle(ReceipeStoredEvent $event)
    {
        Mail::to('settwaiaung@gmail.com')->send(new ReceipeStored($event->receipe));
    }
}
