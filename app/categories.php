<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public $table="categories";


/*
|--------------------------------------------------------------------------
| RELATIONS
|--------------------------------------------------------------------------
*/ 
public function food(){
    return $this->hasMany('App\foods','category_id');
}

}
