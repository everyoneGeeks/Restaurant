<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\food;
use App\foods;
use App\chef;
/*
|--------------------------------------------------------------------------
| foodsController
|--------------------------------------------------------------------------
| this api will get all chef food
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
class foodsController extends Controller
{
/**
* array of rules 
* @var array
*/
private $rules = [
    'apiToken'=>'required|exists:chefs,apiToken',
    "categoryId"=>'required|exists:categories,id'
];
/**
* array of Message 
* @var array  
*/
private $messages = [
    'apiToken.required'=>'400',
    'apiToken.exists'  =>'400',
    'categoryId.required'=>'400',
    'categoryId.exists'  =>'400',
];

public function food(Request $request){

    try{
        $validator = \Validator::make($request->all(), $this->rules, $this->messages);
        if($validator->fails()) {
            return response()->json(['status'=>(int)$validator->errors()->first()]);
        }
        //Chef
        $chef=chef::where('apiToken',$request->apiToken)->first();

        //Food
        $food=foods::where('chef_id',$chef->id)->where('category_id',$request->categoryId)->get();
        //check id food is empty
        if($food->isEmpty()){
            return response()->json(['status' =>204]);
        }
        return response()->json(['status' =>200,'food'=>food::collection($food)]);

        }catch(\Exception $e) {
        return response()->json(['status' =>404,'message'=>$e->getMessage()]);
        }
    }// end funcrion
}
