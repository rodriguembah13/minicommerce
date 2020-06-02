<?php

namespace App\Shop\LinePackorders\Repositories\Interfaces;

use App\Shop\LinePackorders\LinePackorder;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface LinePackorderRepositoryInterface extends BaseRepositoryInterface
{
    public function listLinePackorders(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createLinePackorder(array $params) : LinePackorder;

    public function updateLinePackorder(array $params) : LinePackorder;

    public function findLinePackorderById(int $id) : LinePackorder;
    
    public function deleteLinePackorder() : bool;
}
