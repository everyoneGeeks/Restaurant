<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\chef;
use Hash;                                                                           
/*
|--------------------------------------------------------------------------
| loginController
|--------------------------------------------------------------------------
| this api will used To login chef in App
|
*/

/*   
               _    
| |           (_)      
| | ___   __ _ _ _ __  
| |/ _ \ / _` | | '_ \ 
| | (_) | (_| | | | | |
|_|\___/ \__, |_|_| |_|
          __/ |        
         |___/             
*/

class loginController extends Controller
{  
/**
* array of rules 
* @var array
*/
private $rules = [
    'email'=>'required|email|exists:chefs,email',
    'password'=>'required'
];
/**
* array of Message 
* @var array  
*/
private $messages = [
    'email.required'=>'400',
    'email.email'   =>'400',
    'email.exists'  =>'400',
    'password.required'=>'400'
];

public function login(Request $request){

    try{
        $validator = \Validator::make($request->all(), $this->rules, $this->messages);
        if($validator->fails()) {
            return response()->json(['status'=>(int)$validator->errors()->first()]);
        }
        
        $chef=chef::where('email',$request->email)->first();
        //check Password 
        if (!Hash::check($request->password, $chef->password)) {
            return response()->json(['status' =>401]);
        }
        //check if chef  is Active
        if($chef->is_active == 0){
            return response()->json(['status' =>402]);
        }
        //return Object chef 
        $chef=chef::where('id',$chef->id)->select('id','apiToken','name','email','logo','color')->first();
        return response()->json(['status' =>200,'chef'=>$chef]);

        }catch(\Exception $e) {
        return response()->json(['status' =>404,'message'=>$e->getMessage()]);
        }
    }// end funcrion

}
