<?php

namespace App\Shop\PakageProduits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PakageProduit extends Model
{

    /**
     * @param string $term
     * @return Collection
     */
    public function searchPakageProduct(string $term) : Collection
    {
        return self::search($term)->get();
    }
}
