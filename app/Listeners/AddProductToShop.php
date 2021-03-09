<?php

namespace App\Listeners;

use App\Events\Products\ConfiguredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddProductToShop
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
     * @param  ConfiguredEvent  $event
     * @return void
     */
    public function handle(ConfiguredEvent $event)
    {
        //
    }
}
