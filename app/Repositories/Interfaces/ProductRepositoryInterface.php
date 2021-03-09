<?php


namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface
{
    public function createProduct(Array $data);

    public function getProduct($id);

}
