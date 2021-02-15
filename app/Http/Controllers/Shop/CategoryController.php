<?php

namespace App\Http\Controllers\Shop;

use App\Services\Shop\Ccvshop\Categories;
use App\Services\Shop\Interfaces\CategoryInterface;
use Illuminate\Contracts\Auth\Guard;

class CategoryController
{

    private CategoryInterface $shop;

    public function __construct(CategoryInterface $shop)
    {
        $this->shop = $shop;
    }


    public function index()
    {
        return $this->shop->getCategories();
    }


    public function show(int $category)
    {
        return $this->shop->getCategory($category);
    }


    public function getProductsFromCategory(int $category)
    {
        return $this->shop->getProducts($category);
    }

    public function getCategoriesFromParent(int $category)
    {
        return $this->shop->getCategoriesFromParent($category);
    }

    public function getTree()
    {
        return $this->shop->getTree();
    }

}
