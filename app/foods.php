<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foods extends Model
{
/*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/ 
public function category(){
    return $this->belongsTo('App\categories');
}
public function content(){
    return $this->belongsToMany('App\Kitchen','food_ingredients','food_id','kitchen_id')->withPivot('amount');
}
}
