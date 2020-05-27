<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jsdecena\Baserepo\Models\User;

class Blogpost extends Model
{
    use SoftDeletes;
   
       protected $fillable =[

    	             'title','body','category_id','featured','slug','user_id'


                   ];

    public function getFeaturedAttribute($featured)
    {

          return asset($featured);
    }

    protected $dates = ['deleted_at'];


    public function category()
    {

       return $this->belongsTo(Blogcategories::class);

    }
    public function tags()
    {

      return $this->belongsToMany(Blogtag::class);
    }
 public function user()
 {
  return $this->belongsTo(User::class);
 }



}
