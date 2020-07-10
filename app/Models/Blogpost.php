<?php

namespace App\Models;

use App\Shop\Employees\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogpost extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'title', 'body', 'category_id', 'featured', 'slug', 'employee_id'
    ];

    public function getFeaturedAttribute($featured)
    {

        return asset($featured);
    }

    protected $dates = ['deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Blogcategories::class);

    }

    public function tags()
    {
        return $this->belongsToMany(Blogtag::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
