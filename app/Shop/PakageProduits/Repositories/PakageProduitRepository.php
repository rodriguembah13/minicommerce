<?php

namespace App\Shop\PakageProduits\Repositories;

use App\Shop\PakageProduits\PakageProduit;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Shop\PakageProduits\Repositories\Interfaces\PakageProduitRepositoryInterface;

class PakageProduitRepository extends BaseRepository implements PakageProduitRepositoryInterface
{
	/**
     * PakageProduitRepository constructor.
     * 
     * @param PakageProduit $dummy
     */
    public function __construct(PakageProduit $dummy)
    {
        parent::__construct($dummy);
        $this->model = $dummy;
    }

    /**
     * List all the PakageProduits
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listPakageProduits(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create PakageProduit
     *
     * @param array $params
     *
     * @return PakageProduit
     * @throws InvalidArgumentException
     */
    public function createPakageProduit(array $params) : PakageProduit
    {
        try {
        	return PakageProduit::create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the dummy
     *
     * @param array $params
     * @return PakageProduit
     */
    public function updatePakageProduit(array $params) : PakageProduit
    {
        $dummy = $this->findPakageProduitById($this->model->id);
        $dummy->update($params);
        return $dummy;
    }

    /**
     * @param int $id
     * 
     * @return PakageProduit
     * @throws ModelNotFoundException
     */
    public function findPakageProduitById(int $id) : PakageProduit
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
    public function deletePakageProduit() : bool
    {
        return $this->model->delete();
    }
}