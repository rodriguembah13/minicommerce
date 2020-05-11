<?php

namespace App\Shop\Packs\Repositories\Interfaces;

use App\Shop\Packs\Pack;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface PackRepositoryInterface extends BaseRepositoryInterface
{
    public function listPacks(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createPack(array $params) : Pack;

    public function updatePack(array $params) : Pack;
    public function updatePricePack(array $params) : Pack;
    public function findPackById(int $id) : Pack;
    
    public function deletePack() : bool;
}
