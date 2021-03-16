<?php


namespace App\Services\Shop\Interfaces;


interface ProductInterface
{

    public function getProducts(?string $query = null);

    public function getProduct(int $product);

    public function createProduct(Array $data);

}
