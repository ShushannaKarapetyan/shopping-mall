<?php
declare(strict_types=1);

namespace App\Repositories;

interface ProductsRepositoryInterface
{
    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
