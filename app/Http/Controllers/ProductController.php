<?php

namespace App\Http\Controllers;

use App\Commands\Product\CreateProductCommand;
use App\Commands\Product\UpdateProductCommand;
use App\Data\ProductData;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;
use Throwable;


class ProductController extends Controller
{
    public function __construct(public ProductService $productService)
    {
    }


    public function index(Request $request): PaginatedDataCollection
    {
        $perPage = $request->input('per_page', 15);

        return ProductData::collection($this->productService->getAvailableProducts($perPage));
    }

    /**
     * @param CreateProductCommand $createProductCommand
     * @return JsonResponse
     */
    public function store(CreateProductCommand $createProductCommand): JsonResponse
    {
        $createdProduct = $this->productService->createProduct($createProductCommand);

        return response()->json(ProductData::from($createdProduct), 201);
    }

    /**
     * @param int $id
     * @return ProductData
     */
    public function show(int $id): ProductData
    {
        return ProductData::from($this->productService->getProductById($id));
    }

    /**
     * @param UpdateProductCommand $updateProductCommand
     * @param string $id
     * @return ProductData
     * @throws Throwable
     */
    public function update(UpdateProductCommand $updateProductCommand, string $id): ProductData
    {
        if (is_string($updateProductCommand->article) && !Gate::allows('update-article')) {
            abort(403);
        }

        return ProductData::from($this->productService->updateProduct($updateProductCommand, $id));
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $this->productService->deleteProduct($id);

        return response()->json(status: 204);
    }
}
