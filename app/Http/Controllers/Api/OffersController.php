<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\food;
use App\foods;
use App\chef;
/*
|--------------------------------------------------------------------------
| OffersController
|--------------------------------------------------------------------------
| this api will get all chef offers
|
*/
/**
  ____   __  __              
 / __ \ / _|/ _|             
| |  | | |_| |_ ___ _ __ ___ 
| |  | |  _|  _/ _ \ '__/ __|
| |__| | | | ||  __/ |  \__ \
 \____/|_| |_| \___|_|  |___/
                             
*/
class OffersController extends Controller
{
/**
* array of rules 
* @var array
*/
private $rules = [
    'apiToken'=>'required|exists:chefs,apiToken',
];
/**
* array of Message 
* @var array  
*/
private $messages = [
    'apiToken.required'=>'400',
    'apiToken.exists'  =>'400',
];

public function offers(Request $request){

    try{
        $validator = \Validator::make($request->all(), $this->rules, $this->messages);
        if($validator->fails()) {
            return response()->json(['status'=>(int)$validator->errors()->first()]);
        }
        //chef
        $chef=chef::where('apiToken',$request->apiToken)->first();

        //Offers
        $food=foods::where('chef_id',$chef->id)->where('is_discount',1)->get();
        //check id food is empty
        if($food->isEmpty()){
            return response()->json(['status' =>204]);
        }
        return response()->json(['status' =>200,'offers'=>food::collection($food)]);

        }catch(\Exception $e) {
        return response()->json(['status' =>404,'message'=>$e->getMessage()]);
        }
    }// end funcrion

}
