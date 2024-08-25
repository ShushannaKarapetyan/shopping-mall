<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductsRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ProductsService
{
    /**
     * @param ProductsRepositoryInterface $repository
     */
    public function __construct(protected ProductsRepositoryInterface $repository)
    {
    }

    /**
     * Find the product
     *
     * @param $id
     */
    public function getProduct($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a product
     *
     * @param array $data
     * @return Product
     */
    public function createProduct(array $data): Product
    {
        return $this->repository->create($data);
    }

    /**
     * Update the product
     *
     * @param $id
     * @param array $data
     * @return JsonResponse|Product
     */
    public function updateProduct($id, array $data): JsonResponse|Product
    {
        $product = $this->repository->find($id);

        if ($product instanceof JsonResponse) {
            return $product;
        }

        $updatedProduct = $this->repository->update($id, $data);

        return response()->json($updatedProduct);
    }

    /**
     * Delete the product
     *
     * @param $id
     * @return JsonResponse|bool
     */
    public function deleteProduct($id): JsonResponse|bool
    {
        return $this->repository->delete($id);
    }
}
