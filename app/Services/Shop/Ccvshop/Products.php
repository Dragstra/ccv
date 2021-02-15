<?php


namespace App\Services\Shop\Ccvshop;

use App\Services\Shop\Interfaces\ProductInterface;

class Products extends Connector implements ProductInterface
{

    public function getProducts(?string $query = null): array
    {
        return $this->get('products', $query)->json();
    }


    public function getProduct(int $product): array
    {
        $parameter = 'products/' . $product;

        return $this->get($parameter)->json();
    }



}
