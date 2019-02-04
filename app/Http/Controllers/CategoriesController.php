<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\categories_chef;
/*
|--------------------------------------------------------------------------
| CategoriesController
|--------------------------------------------------------------------------
| controll to mange chef category
|
*/
/**
           _                              
          | |                             
  ___ __ _| |_ ___  __ _  ___  _ __ _   _ 
 / __/ _` | __/ _ \/ _` |/ _ \| '__| | | |
| (_| (_| | ||  __/ (_| | (_) | |  | |_| |
 \___\__,_|\__\___|\__, |\___/|_|   \__, |
                    __/ |            __/ |
                   |___/            |___/ 

 */
class CategoriesController extends Controller
{
/**
 * get all Chef Categories in App
 * @param Request   Illuminate\Http\Request
 * @return redirect To category view 
 */
public function Categories(Request $request)
{
   $Categories=categories_chef::with('category')->where('chef_id',\Auth::user()->id)->get();
    return view('chef.Categories.index',compact('Categories'));
}

/**
 * add New chef table in App
 * @return redirect to Tables add Form 
 */
public function create_category()

{
    $Categories=categories::get();
    return view('chef.Categories.create',compact('Categories'));
}

/**
 * add New chef category  in App
 * @param Request   Illuminate\Http\Request
 * @return create new table in Databases
 */
public function save_category(Request $request)
{
    $rules = [
        "category"   =>"required|exists:categories,id",  
        ];  

    $this->validate($request,$rules);
        $categories=categories_chef::insert(['chef_id'=>auth()->user()->id,'category_id'=>$request->category]);
        return redirect()->route('categories')->with('message',"تم الاضافة بنجاح ");
}

/**
 * edit chef category in App
 * @param id   id Table
 * @return redirect to update form Tables 
 */
public function edit_category($id)
{
    $Categories=categories_chef::where('id',$id)->first();
    $categories=categories::get();
    return view('chef.Categories.edit',compact('Categories','categories'));
}

/**
 * update chef category in App
 * @param id   id Table
 * @param Request Illuminate\Http\Request
 * @return redirect to Tables if update true
 */
public function update_category(Request $request,$id)
{
    $rules = [
        "category"   =>"required|exists:categories,id",  
        ];  

    $this->validate($request,$rules);
    $categories=categories_chef::where('id',$id)->update(['category_id'=>$request->category]);

    return back()->with('message',"تم التعديل  بنجاح ");
}

/**
 * delete chef category in App
 * @param id   id Table
 * @return redirect to Tables if delete true
 */
public function delete_category($id)
{
    $table=categories_chef::where('id',$id)->delete();
    return back()->with('message',"تم الحذف بنجاح ");
}

}
