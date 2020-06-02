<?php

namespace App\Shop\Packorders\Repositories\Interfaces;

use App\Shop\Packorders\Packorder;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface PackorderRepositoryInterface extends BaseRepositoryInterface
{
    public function listPackorders(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createPackorder(array $params) : Packorder;

    public function updatePackorder(array $params) : Packorder;

    public function findPackorderById(int $id) : Packorder;
    public function findPackorderByCustomer(int $id):Collection;
    
    public function deletePackorder() : bool;
}
