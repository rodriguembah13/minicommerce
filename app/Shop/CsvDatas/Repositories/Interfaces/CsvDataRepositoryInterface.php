<?php

namespace App\Shop\CsvDatas\Repositories\Interfaces;

use App\Shop\CsvDatas\CsvData;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface CsvDataRepositoryInterface extends BaseRepositoryInterface
{
    public function listCsvDatas(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    public function createCsvData(array $params) : CsvData;

    public function updateCsvData(array $params) : CsvData;

    public function findCsvDataById(int $id) : CsvData;
    
    public function deleteCsvData() : bool;
}
