<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class chef extends Authenticatable
{
    use Notifiable;
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
