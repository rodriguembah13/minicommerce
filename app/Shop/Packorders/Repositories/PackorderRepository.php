<?php

namespace App\Shop\Packorders\Repositories;

use App\Shop\Packorders\Packorder;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\Packorders\Repositories\Interfaces\PackorderRepositoryInterface;

class PackorderRepository extends BaseRepository implements PackorderRepositoryInterface
{
	/**
     * PackorderRepository constructor.
     * 
     * @param Packorder $dummy
     */
    public function __construct(Packorder $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the Packorders
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listPackorders(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create Packorder
     *
     * @param array $params
     *
     * @return Packorder
     * @throws InvalidArgumentException
     */
    public function createPackorder(array $params) : Packorder
    {
        try {
        	return Packorder::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return Packorder
     */
    public function updatePackorder(array $params) : Packorder
    {
        $dummy = $this->findPackorderById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return Packorder
     * @throws ModelNotFoundException
     */
    public function findPackorderById(int $id) : Packorder
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getMessage());
        }
    }
    /**
     * @param int $id
     *
     * @return Packorder
     * @throws ModelNotFoundException
     */
    public function findPackorderByCustomer(int $id) : Packorder
    {
        try {
            return $this->model->where('id', $this->model->id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e->getMessage());
        }
    }

    /**
     * Delete a dummy
     *
     * @return bool
     */
    public function deletePackorder() : bool
    {
        return $this->model->delete();
    }
}