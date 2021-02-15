<?php


namespace App\Services\Shop\Ccvshop;


use App\Http\Cache\Interfaces\CacheInterface;
use App\Services\Shop\Interfaces\CategoryInterface;

class Categories extends Connector implements CategoryInterface
{
    private CacheInterface $cache;

    public function __construct(CacheInterface $cache)
    {
        parent::__construct();
        $this->cache = $cache;
    }

    public function getCategories(?string $query = null): array
    {
        return $this->get('categories')->json();
    }

    public function getCategory(int $category): array
    {
        return $this->cache->getOrSet('Category', $this->get('categories/' . $category)->json());
    }

    public function getCategoriesFromParent(int $category): array
    {
        return $this->cache->getOrSet(
            $category . 'CategoriesFromParent',
            $this->get('categories/' . $category . '/categories')->json()
        );
    }

    public function getProducts(int $category): array
    {

        return $this->get('categories/' . $category . '/products' )->json();
        dd($this->cache->getOrSet('getProducts'.$category, $this->get('categories/' . $category . '/products' )->json()));
    }

    public function getTree(): array
    {
        return $this->cache->getOrSet('TreeCategories', $this->get('categorytree')->json());
    }


}
