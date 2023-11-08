<?php

namespace App\Services;

use App\Commands\Product\CreateProductCommand;
use App\Commands\Product\UpdateProductCommand;
use App\Data\ProductData;
use App\Repositories\ProductRepository;
use Spatie\LaravelData\DataCollection;
use Throwable;

class ProductService
{

    public function __construct(public ProductRepository $productRepository)
    {
    }

    public function getAvailableProducts(): DataCollection
    {
        return ProductData::collection($this->productRepository->getAvailableProducts());
    }

    public function getProductById(int $id): ProductData
    {
        return ProductData::from($this->productRepository->getAvailableProductById($id));
    }

    public function createProduct(CreateProductCommand $createProductCommand): ProductData
    {
        return ProductData::from($this->productRepository->createProduct($createProductCommand->all()));
    }

    /**
     * @throws Throwable
     */
    public function updateProduct(UpdateProductCommand $updateProductCommand, int $id): ProductData
    {
        return ProductData::from($this->productRepository->updateProduct($updateProductCommand->toArray(), $id));
    }

    public function deleteProduct(int $id): ?bool
    {
        return $this->productRepository->deleteProduct($id);
    }
}
