<?php

namespace App\Providers;

use App\Http\Cache\Cacheable;
use App\Http\Cache\Interfaces\CacheInterface;
use App\Services\Shop\Ccvshop\Categories;
use App\Services\Shop\Ccvshop\Products;
use App\Services\Shop\Interfaces\CategoryInterface;
use App\Services\Shop\Interfaces\ProductInterface;
use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ProductInterface::class, Products::class);
        $this->app->bind(CategoryInterface::class, Categories::class);
        $this->app->bind(CacheInterface::class, Cacheable::class);

    }


    public function boot()
    {
    }
}
