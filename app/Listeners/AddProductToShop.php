<?php

namespace App\Listeners;

use App\Events\Products\ConfiguredEvent;
use App\Repositories\ShopProductRepository;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddProductToShop implements ShouldQueue
{
    public ShopProductRepository $product_repository;

    public function __construct(ShopProductRepository $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function handle(ConfiguredEvent $event)
    {
        // $this->product_repository->create($event->data);
    }
}
