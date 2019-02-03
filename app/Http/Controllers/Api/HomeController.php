<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\home;
use App\chef;
/*
|--------------------------------------------------------------------------
| HomeController
|--------------------------------------------------------------------------
| this api will get all Gategories and foods
|
*/
/*   
 _    _                      
| |  | |                     
| |__| | ___  _ __ ___   ___ 
|  __  |/ _ \| '_ ` _ \ / _ \
| |  | | (_) | | | | | |  __/
|_|  |_|\___/|_| |_| |_|\___|   
            
*/

class HomeController extends Controller
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

public function Home(Request $request){

    try{
        $validator = \Validator::make($request->all(), $this->rules, $this->messages);
        if($validator->fails()) {
            return response()->json(['status'=>(int)$validator->errors()->first()]);
        }

        $categories=chef::where('apiToken',$request->apiToken)
        ->with(['category'=>function($q){
            $q->with('food');
        }])->get();

        if($categories->isEmpty()){
            return response()->json(['status' =>204]);
        }
        $bind='';
        foreach($categories as $category){
            
            $bind=$category->category;

        }
       
        //return Array of Object categories
        return response()->json(['status' =>200,'categories'=>new home( $bind)]);

        }catch(\Exception $e) {
        return response()->json(['status' =>404,'message'=>$e->getMessage()]);
        }
    }// end funcrion

}

