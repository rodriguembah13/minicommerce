<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Blogtag extends Model
{
   
protected $fillable = ['tag'];

   public function posts()
   {
   return $this->belongsToMany(Blogpost::class);
   
   }
}
