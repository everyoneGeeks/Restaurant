<?php

namespace App\Http\Controllers;

use App\foods;
use App\categories;
use App\categories_chef;
use App\Kitchen;
use Carbon\Carbon;
use App\food_content;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| foodsController
|--------------------------------------------------------------------------
|  controller mange food sectionbb
|
*/

/**
  __                _ 
 / _|              | |
| |_ ___   ___   __| |
|  _/ _ \ / _ \ / _` |
| || (_) | (_) | (_| |
|_| \___/ \___/ \__,_|                    
*/

class FoodsController extends Controller
{
/**
 * get all Chef food in App
 * @param Request   Illuminate\Http\Request
 * @return redirect To food view 
 */
public function foods(Request $request)
{
   $foods=foods::with('category')->where('chef_id',\Auth::guard('chef')->user()->id)->get();
    return view('chef.Foods.index',compact('foods'));
}

/**
 * get Chef food info App
 * @param Request   Illuminate\Http\Request
 * @return redirect To food view 
 */
public function info_food(Request $request,$id)
{
   $foods=foods::where('id',$id)->with('category')->with('content')->where('chef_id',\Auth::guard('chef')->user()->id)->first();

    return view('chef.Foods.info',compact('foods'));
}

/**
 * add New foods in App
 * @return redirect to foods add Form 
 */
public function create_food()
{
    $foods=foods::get();
    $Categories=categories_chef::with('category')->where('chef_id',auth()->guard('chef')->user()->id)->get();

    return view('chef.Foods.create',compact('foods','Categories'));
}

/**
 * add New chef foods  in App
 * @param Request   Illuminate\Http\Request
 * @return create new foods in Databases
 */
public function save_food(Request $request)
{
    $rules = [
        "category"   =>"required|exists:categories,id",  
        'name'       =>"required",
        "image"      =>"required",
        "description" =>'required',
        "price"       =>'required',
        "discount"    =>"required"
        ];  

    $this->validate($request,$rules);
    if($request->discount > 0 ){
        $is_discount=1;
    }else{
        $is_discount=0;
    }
            $image = $request->image;
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('foods/');
            $image->move($destinationPath, $name);

    $categories=foods::insert(['name'=>$request->name,'image'=>env('APP_URL').'/'."foods/".$name,
        'description'=>$request->description,'price'=>$request->price,
        'category_id'=>$request->category,'chef_id'=>auth()->guard('chef')->user()->id,'discount'=>$request->discount,'is_discount'=>$is_discount]);

        return redirect()->route('foods')->with('message',"تم الاضافة بنجاح ");
}

/**
 * edit chef category in App
 * @param id   id Table
 * @return redirect to update form Tables 
 */
public function edit_food($id)
{
    $foods=foods::where('id',$id)->first();
    $Categories=categories::get();
    return view('chef.Foods.edit',compact('foods','Categories'));
}

/**
 * update chef category in App
 * @param id   id Table
 * @param Request Illuminate\Http\Request
 * @return redirect to Tables if update true
 */
public function update_food(Request $request,$id)
{
    $rules = [
        "category"   =>"required|exists:categories,id",  
        'name'       =>"required",
        "description" =>'required',
        "price"       =>'required',
        "discount"    =>"required"
        ];  
        if($request->discount > 0 ){
            $is_discount=1;
        }else{
            $is_discount=0;
        }

        if($request->has('image')){
            $image = $request->image;
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('foods/');
            $image->move($destinationPath, $name);
            $fullImageUrl=env('APP_URL').'/'."foods/".$name;
        }else{
            $fullImageUrl=foods::where('id',$id)->first()->image;
        }

    $this->validate($request,$rules);

    $categories=foods::where('id',$id)->update([
    'name'=>$request->name,'image'=>$fullImageUrl,
    'description'=>$request->description,'price'=>$request->price,
    'category_id'=>$request->category,'chef_id'=>auth()->guard('chef')->user()->id,
    'discount'=>$request->discount,'is_discount'=>$is_discount]);


    return back()->with('message',"تم التعديل  بنجاح ");
}

/**
 * delete chef category in App
 * @param id   id foods
 * @return redirect to Tables if delete true
 */
public function delete_food($id)
{
    $foods=foods::where('id',$id)->delete();
    return back()->with('message',"تم الحذف بنجاح ");
}

/**
* form Food content
* @param Request Illuminate\Http\Request
* @param id  id food
*/
public function form_Food_content(){
    return view('chef.kitchen.create');    

}

/**
* show all Food content
* @param Request Illuminate\Http\Request
* @param id  id food
*/
public function show_Food_content(){
$Kitchen=Kitchen::where('chef_id',auth()->guard('chef')->user()->id)->get();    
return view('chef.kitchen.index',compact('Kitchen'));
}


/**
* add Food content
* @param Request Illuminate\Http\Request
* @param id  id food
*/
public function add_Food_content(Request $request){
    $rules = [
        "name"   =>"required",
        "amount"    =>"required",

        ];  
        $this->validate($request,$rules); 
        $Kitchen=Kitchen::insert(['name'=>$request->name,
        'amount'=>$request->amount,
        'chef_id'=>auth()->guard('chef')->user()->id,'created_at'=>Carbon::now()]) ;
        return back()->with('message',"تم الاضافة  بنجاح ");       

}

/**
 * edit Food content
 * @param Request Illuminate\Http\Request
 * @param id  id food
 */
public function edit_Food_content(Request $request,$id){
    $rules = [
        "name"   =>"required",
        "amount"    =>"required",

        ];  
        $this->validate($request,$rules); 
        $Kitchen=Kitchen::where('id',$id)->update(['name'=>$request->name,
        'amount'=>$request->amount]) ;

        return back()->with('message',"تم التعديل  بنجاح ");       

}

/**
 * form edit Food content
 * @param Request Illuminate\Http\Request
 * @param id  id food
 */
public function form_edit_Food_content($id){
    $Kitchen=Kitchen::where('id',$id)->first(); 
    return view('chef.kitchen.edit',compact('Kitchen'));    

}

/**
 * edit Food content
 * @param Request Illuminate\Http\Request
 * @param id  id food
 */
public function delete_Food_content($id){

        $Kitchen=Kitchen::where('id',$id)->delete();

        return back()->with('message',"تم الحذف  بنجاح ");       

}

/**
 * delete kitchen food content
 * @param Request Illuminate\Http\Request
 * @param id  id food
 */
public function delete_kitchen_food(Request $request,$id){
    $food_content=food_content::where('id',$id)->delete();

    return back()->with('message',"تم الحذف  بنجاح ");     
}


/**
 * add_form_kitchen_food
 * @param Request Illuminate\Http\Request
 * @param id  id food
 */
public function add_form_kitchen_food($id){
    $Kitchen=Kitchen::get();
$id=$id;
    return view('chef.kitchen.addContent',compact('Kitchen','id'));     
}



/**
 * add_kitchen_food 
 * @param Request Illuminate\Http\Request
 * @param id  id food
 */
public function add_kitchen_food(Request $request,$id){
    $rules = [
        "name"   =>"required|exists:Kitchen,id",
        "amount"    =>"required",
        ];  
        
        $this->validate($request,$rules); 
        $Kitchen=food_content::where('id',$id)->insert([
        'kitchen_id'=>$request->name,
        'amount'=>$request->amount,
        'food_id'=>$id,
        'created_at'=>Carbon::now()
        ]);

        return back()->with('message',"تم الاضافة  بنجاح ");       

}


}
