<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Throwable;

class ProductRepository
{

    public function getAvailableProducts(): Collection
    {
        return Product::available()->get();
    }

    public function getAvailableProductById(int $id): Product
    {
        return Product::available()->findOrFail($id);
    }

    public function createProduct(array $data): Product
    {
        return Product::create($data);
    }

    /**
     * @throws Throwable
     */
    public function updateProduct(array $data, int $id): Product
    {
        $product = Product::available()->findOrFail($id);
        $product->updateOrFail($data);

        return $product->fresh();
    }

    public function deleteProduct(int $id): ?bool
    {
        return Product::available()->findOrFail($id)->delete();
    }
}
