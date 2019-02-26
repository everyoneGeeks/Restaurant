<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tables;
use Auth;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| TablesController
|--------------------------------------------------------------------------
| control chef Tables Crud
|
*/
/**
 _______    _     _      
|__   __|  | |   | |     
   | | __ _| |__ | | ___ 
   | |/ _` | '_ \| |/ _ \
   | | (_| | |_) | |  __/
   |_|\__,_|_.__/|_|\___|
 */

class TablesController extends Controller
{
/**
 * get all Chef Tables in App
 * @param Request   Illuminate\Http\Request
 * @return redirect To Tables view 
 */
public function table(Request $request)
{
   $tables=tables::where('chef_id',\Auth::guard('chef')->user()->id)->get();
    return view('chef.Tables.index',compact('tables'));
}


/**
 * add New chef table in App
 * @return redirect to Tables add Form 
 */
public function create_table()
{
    return view('chef.Tables.create');
}
/**
 * add New chef table  in App
 * @param Request   Illuminate\Http\Request
 * @return create new table in Databases
 */
public function save_table(Request $request)
{
    $rules = [
        "number"   =>"required",  
        ];  

    $this->validate($request,$rules);
        $table=tables::insert(['created_at'=>Carbon::now(),'chef_id'=>auth()->guard('chef')->user()->id,'number'=>$request->number]);
        return redirect()->route('tables')->with('message',"تم الاضافة بنجاح ");
}

/**
 * edit chef table number in App
 * @param id   id Table
 * @return redirect to update form Tables 
 */
public function edit_table($id)
{
    $tables=tables::where('id',$id)->first();
    return view('chef.Tables.edit',compact('tables'));
}

/**
 * update chef table in App
 * @param id   id Table
 * @param Request Illuminate\Http\Request
 * @return redirect to Tables if update true
 */
public function update_table(Request $request,$id)
{
    $rules = [
        "number"   =>"required",  
        ];  

    $this->validate($request,$rules);
    $table=tables::where('id',$id)->update(['number'=>$request->number]);
    return back()->with('message',"تم التعديل  بنجاح ");
}

/**
 * delete chef table in App
 * @param id   id Table
 * @return redirect to Tables if delete true
 */
public function delete_table($id)
{
    $table=tables::where('id',$id)->delete();
    return back()->with('message',"تم الحذف بنجاح ");
}

}
