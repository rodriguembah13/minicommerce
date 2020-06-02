<?php

namespace App\Shop\LinePackorders;

use App\Shop\Packorders\Packorder;
use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class LinePackorder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'quantity_restant',
        'quantity_use',
        'packorder_id',
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
    public function packorder()
    {
        return $this->belongsTo(Packorder::class);
    }
}
