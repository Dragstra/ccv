<?php

namespace App\Listeners;

use App\Events\Products\ConfiguredEvent;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

class AddConfiguration
{

    public ProductRepositoryInterface $product_repository;
    public Authenticatable $user;

    public function __construct(ProductRepositoryInterface $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    public function handle(ConfiguredEvent $event)
    {
        $this->product_repository->createProduct($event->data);
    }
}
