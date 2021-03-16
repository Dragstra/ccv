<?php


namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface
{
    public function build(Array $data);

    public function getProduct($id);

}
