<?php

namespace App\Listeners;

use App\Events\Products\ConfiguredEvent;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddConfiguration implements ShouldQueue
{
    public ProductRepository $product_repository;

    public function __construct(ProductRepository $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function handle(ConfiguredEvent $event)
    {
        $this->product_repository->build($event->data, $event->company);
    }

}
