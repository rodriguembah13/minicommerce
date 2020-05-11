<?php

namespace App\Shop\LinePackProducts\Repositories\Interfaces;

use App\Shop\LinePackProducts\LinePackProduct;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface LinePackProductRepositoryInterface extends BaseRepositoryInterface
{
    public function listLinePackProducts(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createLinePackProduct(array $params) : LinePackProduct;

    public function updateLinePackProduct(array $params) : LinePackProduct;

    public function findLinePackProductById(int $id) : LinePackProduct;
    
    public function deleteLinePackProduct() : bool;
}
