<?php


namespace App\Repositories;


use App\Helpers\Number;
use App\Models\BaseProduct;
use App\Models\Configuration;
use App\Models\ExtendedProduct;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected BaseProduct $base;
    protected Configuration $configuration;
    protected ExtendedProduct $extend;

    public function __construct(Configuration $configuration, BaseProduct $base, ExtendedProduct $extend)
    {
        $this->configuration = $configuration;
        $this->base = $base;
        $this->extend = $extend;
    }

    public function build(array $data, $company = 0)
    {
        foreach ($data['products'] as $product) {
            $newProduct = $this->base->updateOrCreate(
                ['product_id' => $product, 'category_id' => $data['baseCategory']],
                [
                    'product_id' => $product,
                    'category_id' => $data['baseCategory'],
                    'company_id' => $company,
                    'order' => 0,
                    'length' => $data['length']
                ]
            );

            foreach ($data['productsToConnect'] as $productToConnect) {
                $productToConnect = str_replace('con-', '', $productToConnect);

                $newExtend = $this->extend->updateOrCreate(
                    ['product_id' => $productToConnect, 'links_id' => $data['link']],
                    [
                        'links_id' => $data['link'],
                        'product_id' => $productToConnect,
                        'order' => $data['order'],
                        'price' => Number::ToInteger($data['price']),
                        'length' => Number::ToInteger($data['productLength']),
                        'width' => Number::ToInteger($data['productWidth']),
                        'percent' => $data['percentage']
                    ]
                );

                $this->configuration->updateOrCreate(
                    [
                        'base_product_id' => $newProduct->id,
                        'extended_product_id' => $newExtend->id,
                        'links_id' => $data['link']
                    ],
                    [
                        'base_product_id' => $newProduct->id,
                        'extended_product_id' => $newExtend->id,
                        'links_id' => $data['link']
                    ]
                );
            }
        }
    }

    public function getProduct(
        $id
    ) {
        // TODO: Implement getProduct() method.
        // $this->getConfiguration($id);
    }
}
