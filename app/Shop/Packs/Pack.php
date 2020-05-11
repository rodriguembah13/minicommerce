<?php

namespace App\Shop\Packs;

use App\Shop\LinePackProducts\LinePackProduct;
use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'price','description','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    public function linePacks(){
        return $this->hasMany(LinePackProduct::class);
    }
}
