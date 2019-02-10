<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\chef;

class AdminLoginController extends Controller
{

/**
 * @return editForm view to Chef 
 */
public function edit()
{
            
    $User = chef::find(Auth::guard('chef')->user()->id);
    return view('auth.edit', compact('User'));

    // return new UserResource(User::find($id));
}


    /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request)
{

    $request->validate([
        "name"      =>"required|max:20",
        "email"     =>"required|max:100",
        "password"     =>"max:20",
        ]  );


        $User = chef::where('id',Auth::guard('chef')->user()->id)->first();
        $User->name=$request->name;
        $User->email=$request->email;
        if($request->password){$User->password=\Hash::make($request->password);}
        $User->save();

    return redirect()->back()->with('sendMessageSucc','تم الحفظ بنجاح ');  
}

}
