<?php

namespace App\Shop\LinePakageProduits\Repositories;

use App\Shop\LinePakageProduits\LinePakageProduit;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\LinePakageProduits\Repositories\Interfaces\LinePakageProduitRepositoryInterface;

class LinePakageProduitRepository extends BaseRepository implements LinePakageProduitRepositoryInterface
{
	/**
     * LinePakageProduitRepository constructor.
     * 
     * @param LinePakageProduit $dummy
     */
    public function __construct(LinePakageProduit $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the LinePakageProduits
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listLinePakageProduits(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create LinePakageProduit
     *
     * @param array $params
     *
     * @return LinePakageProduit
     * @throws InvalidArgumentException
     */
    public function createLinePakageProduit(array $params) : LinePakageProduit
    {
        try {
        	return LinePakageProduit::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return LinePakageProduit
     */
    public function updateLinePakageProduit(array $params) : LinePakageProduit
    {
        $dummy = $this->findLinePakageProduitById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return LinePakageProduit
     * @throws ModelNotFoundException
     */
    public function findLinePakageProduitById(int $id) : LinePakageProduit
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
    public function deleteLinePakageProduit() : bool
    {
        return $this->model->delete();
    }
}