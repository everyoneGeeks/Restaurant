<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories_chef extends Model
{
public $table="categories_chefs";

/*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/ 
public function category(){
    return $this->belongsTo('App\categories');
}
}
