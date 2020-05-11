<?php

namespace App\Shop\LinePackProducts\Repositories;

use App\Shop\LinePackProducts\LinePackProduct;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\LinePackProducts\Repositories\Interfaces\LinePackProductRepositoryInterface;

class LinePackProductRepository extends BaseRepository implements LinePackProductRepositoryInterface
{
	/**
     * LinePackProductRepository constructor.
     * 
     * @param LinePackProduct $dummy
     */
    public function __construct(LinePackProduct $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the LinePackProducts
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listLinePackProducts(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create LinePackProduct
     *
     * @param array $params
     *
     * @return LinePackProduct
     * @throws InvalidArgumentException
     */
    public function createLinePackProduct(array $params) : LinePackProduct
    {
        try {
        	return LinePackProduct::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return LinePackProduct
     */
    public function updateLinePackProduct(array $params) : LinePackProduct
    {
        $dummy = $this->findLinePackProductById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return LinePackProduct
     * @throws ModelNotFoundException
     */
    public function findLinePackProductById(int $id) : LinePackProduct
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
    public function deleteLinePackProduct() : bool
    {
        return $this->model->delete();
    }
}