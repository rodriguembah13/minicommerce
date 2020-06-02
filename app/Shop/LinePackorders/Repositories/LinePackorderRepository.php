<?php

namespace App\Shop\LinePackorders\Repositories;

use App\Shop\LinePackorders\LinePackorder;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\LinePackorders\Repositories\Interfaces\LinePackorderRepositoryInterface;

class LinePackorderRepository extends BaseRepository implements LinePackorderRepositoryInterface
{
	/**
     * LinePackorderRepository constructor.
     * 
     * @param LinePackorder $dummy
     */
    public function __construct(LinePackorder $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the LinePackorders
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listLinePackorders(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create LinePackorder
     *
     * @param array $params
     *
     * @return LinePackorder
     * @throws InvalidArgumentException
     */
    public function createLinePackorder(array $params) : LinePackorder
    {
        try {
        	return LinePackorder::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return LinePackorder
     */
    public function updateLinePackorder(array $params) : LinePackorder
    {
        $dummy = $this->findLinePackorderById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return LinePackorder
     * @throws ModelNotFoundException
     */
    public function findLinePackorderById(int $id) : LinePackorder
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
    public function deleteLinePackorder() : bool
    {
        return $this->model->delete();
    }
}