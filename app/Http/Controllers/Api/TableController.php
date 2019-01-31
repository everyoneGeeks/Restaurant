<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Table;
use App\tables;
use App\chef;

/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
| this api will get all Gategories and foods
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
class TableController extends Controller
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

public function Tables(Request $request){

    try{
        $validator = \Validator::make($request->all(), $this->rules, $this->messages);
        if($validator->fails()) {
            return response()->json(['status'=>(int)$validator->errors()->first()]);
        }
        $chef=chef::where('apiToken',$request->apiToken)->first();

        $table=tables::where('chef_id',$chef->id)->get();
        //check if Table is Empty
        if($table->isEmpty()){
            return response()->json(['status' =>204]);
        }
        
        return response()->json(['status' =>200,'tables'=>Table::collection($table)]);

        }catch(\Exception $e) {
        return response()->json(['status' =>404,'message'=>$e->getMessage()]);
        }
    }// end funcrion
}
