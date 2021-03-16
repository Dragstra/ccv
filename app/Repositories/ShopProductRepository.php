<?php


namespace App\Repositories;


use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Shop\Ccvshop\Products;


class ShopProductRepository implements ProductRepositoryInterface
{

    protected Products $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    public function build(array $data)
    {
        $this->build($data);
    }

    public function getProduct($id)
    {
        // TODO: Implement getProduct() method.
        // $this->getProduct($id)
    }
}
