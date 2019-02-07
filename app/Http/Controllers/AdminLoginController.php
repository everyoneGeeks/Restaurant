<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    protected $redirectTo = '/user/table/list';

/**
 * @return Loginform view to chef 
 */
public function showLoginForm()
{
    return view('auth.login');
}

/**
 * @param Request   Illuminate\Http\Request
 * @return redirect To Home if chef email & password is True 
 */
public function login(Request $request)
{
    // dd($request->email);
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended('tables');
    }else{
        return back()->with("status", "email or password is not correct");
    }
}
}
