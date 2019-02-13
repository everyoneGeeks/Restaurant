<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChefController extends Controller
{


/**
 * get all Chef Tables in App
 * @param Request   Illuminate\Http\Request
 * @return redirect To Tables view 
 */
public function table(Request $request)
{
   $tables=Table::where('chef_id',Auth::guard('chef')->user()->id)->get();
    return viwe('chef.dashboard.index',compact($tables));
}

/**
 * add New chef table in App
 * @param Request   Illuminate\Http\Request
 * @return redirect to Tables if add true
 */
public function show_add_table(Request $request)
{
    $rules = [
        "number"   =>"required",  
        ];  

    $this->validate($request,$rules);

    return viwe('chef.dashboard.index',compact($tables));
}
/**
 * add New chef table  in App
 * @param Request   Illuminate\Http\Request
 * @return create new data in Databases
 */
public function add_table(Request $request)
{
    $rules = [
        "number"   =>"required",  
        ];  

    $this->validate($request,$rules);

    return viwe('chef.dashboard.index',compact($tables));
}


/**
 * update chef table in App
 * @param id   id Table
 * @return redirect to Tables if update true
 */
public function update_table(Request $request)
{
    $rules = [
        "number"   =>"required",  
        ];  

    $this->validate($request,$rules);

    return viwe('chef.dashboard.index',compact($tables));
}

/**
 * update chef table in App
 * @param id   id Table
 * @return redirect to Tables if delete true
 */
public function delete_table(Request $request)
{
    return viwe('chef.dashboard.index',compact($tables));
}



}
