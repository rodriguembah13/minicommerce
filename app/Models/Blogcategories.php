<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogcategories extends Model
{
    

   public function posts()
   {


      return $this->hasMany(Blogpost::class);


   }


}
