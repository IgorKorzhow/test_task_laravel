<?php

namespace App\Services;

use App\Commands\Product\CreateProductCommand;
use App\Commands\Product\UpdateProductCommand;
use App\Events\ProductCreated;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class ProductService
{

    public function __construct(public readonly ProductRepository $productRepository)
    {
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getProducts(int $perPage): LengthAwarePaginator
    {
        return $this->productRepository->getProducts($perPage);
    }

    /**
     * @param int $id
     * @return Product
     */
    public function getProductById(int $id): Product
    {
        return $this->productRepository->getProductById($id);
    }

    /**
     * @param CreateProductCommand $createProductCommand
     * @return Product
     */
    public function createProduct(CreateProductCommand $createProductCommand): Product
    {
        $product = $this->productRepository->createProduct($createProductCommand->all());

        ProductCreated::dispatch($product);

        return $product;
    }

    /**
     * @param UpdateProductCommand $updateProductCommand
     * @param string $id
     * @return Product
     * @throws Throwable
     */
    public function updateProduct(UpdateProductCommand $updateProductCommand, string $id): Product
    {
        return $this->productRepository->updateProduct($updateProductCommand->toArray(), $id);
    }

    /**
     * @param string $id
     * @return bool|null
     */
    public function deleteProduct(string $id): ?bool
    {
        return $this->productRepository->deleteProduct($id);
    }
}
