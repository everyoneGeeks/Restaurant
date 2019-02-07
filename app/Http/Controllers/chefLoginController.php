<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chefLoginController extends Controller
{
/**
 * @return Loginform view to chef 
 */
public function showLoginForm()
{
    return view('chef.auth.login');
}

/**
 * @param Request   Illuminate\Http\Request
 * @return redirect To Home if chef email & password is True 
 */
public function login(Request $request)
{
    if (Auth::guard('chef')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(route('tables'));
    }else{
        return back()->with("status", "email or password is not correct");

    
    }
}

}
