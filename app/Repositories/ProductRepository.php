<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class ProductRepository
{

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getProducts(int $perPage = 15): LengthAwarePaginator
    {
        return Product::paginate($perPage);
    }

    /**
     * @param int $id
     * @return Product
     */
    public function getProductById(int $id): Product
    {
        return Product::findOrFail($id);
    }

    /**
     * @param array $data
     * @return Product
     */
    public function createProduct(array $data): Product
    {
        return Product::create($data);
    }

    /**
     * @throws Throwable
     */
    public function updateProduct(array $data, int $id): Product
    {
        $product = Product::findOrFail($id);
        $product->updateOrFail($data);

        return $product->fresh();
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function deleteProduct(int $id): ?bool
    {
        return Product::findOrFail($id)->delete();
    }
}
