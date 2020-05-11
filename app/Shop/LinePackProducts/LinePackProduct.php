<?php

namespace App\Shop\LinePackProducts;

use App\Shop\Packs\Pack;
use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class LinePackProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'pack_id',
        'product_id',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
}
