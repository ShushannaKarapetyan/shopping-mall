<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductsService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    /**
     * @param ProductsService $productsService
     */
    public function __construct(protected ProductsService $productsService)
    {
    }

    /**
     * Create a product
     *
     * @param CreateProductRequest $request
     * @return JsonResponse
     */
    public function create(CreateProductRequest $request): JsonResponse
    {
        $product = $this->productsService->createProduct($request->validated());

        return response()->json($product, Response::HTTP_CREATED);
    }

    /**
     * Find the product
     *
     * @param $id
     * @return JsonResponse
     */
    public function find($id): JsonResponse
    {
        $product = $this->productsService->getProduct($id);

        return response()->json($product);
    }

    /**
     * Get products
     *
     * @return mixed
     */
    public function getProducts(): mixed
    {
        return Product::paginate();
    }

    /**
     * Update the product
     *
     * @param UpdateProductRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request, $id): JsonResponse
    {
        $response = $this->productsService->updateProduct($id, $request->validated());

        return $response instanceof JsonResponse
            ? $response
            : response()->json($response, Response::HTTP_NO_CONTENT);
    }

    /**
     * Delete the product
     *
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        $deleted = $this->productsService->deleteProduct($id);

        return $deleted
            ? response()->json(null, Response::HTTP_NO_CONTENT)
            : response()->json(['message' => 'Product not found.'], Response::HTTP_NOT_FOUND);
    }
}
