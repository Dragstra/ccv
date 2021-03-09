<?php


namespace App\Repositories;


use App\Models\Configuration;
use App\Models\ConfiguredLink;
use App\Models\FinalProduct;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected ConfiguredLink $link;

    public function __construct(ConfiguredLink $link)
    {
        $this->link = $link;
    }

    public function createProduct(array $data)
    {

    }

    public function getProduct($id)
    {
        // TODO: Implement getProduct() method.
    }
}
