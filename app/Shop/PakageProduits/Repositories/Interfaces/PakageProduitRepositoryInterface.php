<?php

namespace App\Shop\PakageProduits\Repositories\Interfaces;

use App\Shop\PakageProduits\PakageProduit;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface PakageProduitRepositoryInterface extends BaseRepositoryInterface
{
    public function listPakageProduits(string $order = 'id', string $sort = 'desc', $except = [], array $columns = ['*']) : Collection;

    public function createPakageProduit(array $params) : PakageProduit;

    public function updatePakageProduit(array $params) : PakageProduit;

    public function findPakageProduitById(int $id) : PakageProduit;
    
    public function deletePakageProduit() : bool;
    public function searchPakageProduct(string $text) : Collection;
}
