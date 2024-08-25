<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductsRepository implements ProductsRepositoryInterface
{
    /**
     * @var Product
     */
    protected Product $model;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * Find the product
     *
     * @param $id
     * @return Product|JsonResponse
     */
    public function find($id): Product|JsonResponse
    {
        $product = $this->model->with('category')->find($id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found.',
            ], Response::HTTP_NOT_FOUND);
        }

        return $product;
    }

    /**
     * Create a product
     *
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product
    {
        return $this->model->create($data);
    }

    /**
     * Update the product
     *
     * @param $id
     * @param array $data
     * @return Product|JsonResponse
     */
    public function update($id, array $data): Product|JsonResponse
    {
        $product = $this->find($id);

        if ($product instanceof JsonResponse) {
            return $product;
        }

        $product->fill($data);
        $product->save();

        return $product;
    }

    /**
     * Delete the product
     *
     * @param $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $product = $this->find($id);

        if ($product instanceof JsonResponse) {
            return false;
        }

        return $product->delete();
    }
}
