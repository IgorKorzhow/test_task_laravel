<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Mail\ProductWasCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProductCreatedNotification implements ShouldQueue
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
    public function handle(ProductCreated $event): void
    {
        Mail::to(config('products.email'))
            ->send(new ProductWasCreated($event->product));
    }
}
