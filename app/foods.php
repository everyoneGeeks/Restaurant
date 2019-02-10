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
}
