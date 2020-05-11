<?php

namespace App\Shop\PakageProduits;

use Illuminate\Database\Eloquent\Model;

class PakageProduit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'slug',
    ];
}
