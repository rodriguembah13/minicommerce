<?php

namespace App\Shop\CsvDatas\Repositories;

use App\Shop\CsvDatas\CsvData;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\CsvDatas\Repositories\Interfaces\CsvDataRepositoryInterface;

class CsvDataRepository extends BaseRepository implements CsvDataRepositoryInterface
{
	/**
     * CsvDataRepository constructor.
     * 
     * @param CsvData $dummy
     */
    public function __construct(CsvData $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the CsvDatas
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listCsvDatas(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create CsvData
     *
     * @param array $params
     *
     * @return CsvData
     * @throws InvalidArgumentException
     */
    public function createCsvData(array $params) : CsvData
    {
        try {
        	return CsvData::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return CsvData
     */
    public function updateCsvData(array $params) : CsvData
    {
        $dummy = $this->findCsvDataById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return CsvData
     * @throws ModelNotFoundException
     */
    public function findCsvDataById(int $id) : CsvData
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getMessage());
        }
    }

    /**
     * Delete a dummy
     *
     * @return bool
     */
    public function deleteCsvData() : bool
    {
        return $this->model->delete();
    }
}