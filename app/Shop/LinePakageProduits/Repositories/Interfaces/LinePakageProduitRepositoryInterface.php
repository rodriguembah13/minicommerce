<?php

namespace App\Shop\LinePakageProduits\Repositories\Interfaces;

use App\Shop\LinePakageProduits\LinePakageProduit;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface LinePakageProduitRepositoryInterface extends BaseRepositoryInterface
{
    public function listLinePakageProduits(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createLinePakageProduit(array $params) : LinePakageProduit;

    public function updateLinePakageProduit(array $params) : LinePakageProduit;

    public function findLinePakageProduitById(int $id) : LinePakageProduit;
    
    public function deleteLinePakageProduit() : bool;
}
