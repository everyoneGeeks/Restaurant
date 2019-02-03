<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chef extends Model
{
    public $table="chefs";

/*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/ 
public function category(){
    return $this->belongsToMany('App\categories','categories_chefs','chef_id','category_id');
}
}
