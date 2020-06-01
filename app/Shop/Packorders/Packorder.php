<?php

namespace App\Shop\Packorders;

use App\Shop\Customers\Customer;
use App\Shop\LinePackorders\LinePackorder;
use App\Shop\Packs\Pack;
use Illuminate\Database\Eloquent\Model;

class Packorder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_expiration',
        'customer_id',
        'pack_id',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }
    public function linePackorders(){
        return $this->hasMany(LinePackorder::class);
    }
}
