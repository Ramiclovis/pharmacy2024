<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    
    public function index()
    {
        return view('admin.index');
    } 

    public function login(Request $request)
    {      
        return view('admin.auth.login');
    } 


    public function auth(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('/admin');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');

    }

    
    
}
