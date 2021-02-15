<?php

namespace App\Http\Controllers\Shop;

use App\Services\Shop\Interfaces\ProductInterface;

class ProductController
{

    private ProductInterface $shop;

    public function __construct(ProductInterface $shop)
    {
        $this->shop = $shop;
    }

    public function index()
    {
        return $this->shop->getProducts();
    }

    public function show(int $product)
    {
        return $this->shop->getProduct($product);
    }

}
