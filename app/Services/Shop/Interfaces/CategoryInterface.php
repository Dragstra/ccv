<?php


namespace App\Services\Shop\Interfaces;


interface CategoryInterface
{

    public function getCategories(?string $query = null);

    public function getCategory(int $category);

    public function getProducts(int $category);

    public function getTree();

}
