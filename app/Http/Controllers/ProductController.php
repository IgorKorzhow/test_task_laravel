<?php

namespace App\Http\Controllers;

use App\Commands\Product\CreateProductCommand;
use App\Commands\Product\UpdateProductCommand;
use App\Data\ProductData;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelData\DataCollection;
use Throwable;


class ProductController extends Controller
{
    public function __construct(public ProductService $productService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): DataCollection
    {
        return $this->productService->getAvailableProducts();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductCommand $createProductCommand): JsonResponse
    {
        $createdProduct = $this->productService->createProduct($createProductCommand);

        return response()->json($createdProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): ProductData
    {
        return $this->productService->getProductById($id);
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(UpdateProductCommand $updateProductCommand, string $id): ProductData
    {
        if (is_string($updateProductCommand->article) && !Gate::allows('update-article')) {
            abort(403);
        }

        return $this->productService->updateProduct($updateProductCommand, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $this->productService->deleteProduct($id);

        return response()->json(status: 204);
    }
}
