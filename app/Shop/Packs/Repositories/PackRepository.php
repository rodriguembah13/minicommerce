<?php

namespace App\Shop\Packs\Repositories;

use App\Shop\Packs\Pack;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\Packs\Repositories\Interfaces\PackRepositoryInterface;

class PackRepository extends BaseRepository implements PackRepositoryInterface
{
	/**
     * PackRepository constructor.
     * 
     * @param Pack $dummy
     */
    public function __construct(Pack $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the Packs
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listPacks(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create Pack
     *
     * @param array $params
     *
     * @return Pack
     * @throws InvalidArgumentException
     */
    public function createPack(array $params) : Pack
    {
        try {
        	return Pack::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return Pack
     */
    public function updatePack(array $params) : Pack
    {
        $dummy = $this->findPackById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return Pack
     * @throws ModelNotFoundException
     */
    public function findPackById(int $id) : Pack
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
    public function deletePack() : bool
    {
        return $this->model->delete();
    }

    public function updatePricePack(array $params): Pack
    {
        $id=$params['id'];
        $dummy = $this->findPackById($id);
        $options=[];
        $options['price'] = $params['price'];
        $dummy->update($options);
        return $dummy;
    }
}